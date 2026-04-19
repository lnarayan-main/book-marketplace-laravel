<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['user', 'category'])->latest()->paginate(15);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        $sellers = User::where('role', 1)->get(); // List of all sellers
        return view('admin.books.create', compact('categories', 'sellers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'status' => 'required|in:pending,active,rejected,out_of_stock',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . rand(1000, 9999);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('books', 'public');
        }

        Book::create($validated);

        return redirect()->route('admin.books.index')->with('success', 'Book listed successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::where('is_active', true)->get();
        $sellers = User::where('role', 1)->get(); // In case admin needs to reassign seller
        return view('admin.books.edit', compact('book', 'categories', 'sellers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'status' => 'required|in:pending,active,rejected,out_of_stock',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        // Update slug only if title changes
        if ($book->title !== $request->title) {
            $validated['slug'] = Str::slug($request->title) . '-' . rand(1000, 9999);
        }

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image)
                Storage::disk('public')->delete($book->cover_image);
            $validated['cover_image'] = $request->file('cover_image')->store('books', 'public');
        }

        $book->update($validated);

        return redirect()->route('admin.books.index')->with('success', 'Book details updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->cover_image)
            Storage::disk('public')->delete($book->cover_image);
        $book->delete();
        return back()->with('success', 'Book removed from marketplace.');
    }

    public function toggleStatus(Book $book)
    {
        // Quick toggle for approval
        $book->status = ($book->status === 'approved') ? 'pending' : 'approved';
        $book->save();

        return back()->with('success', 'Book status updated.');
    }
}
