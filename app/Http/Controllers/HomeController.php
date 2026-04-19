<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $books = Book::all();
        $newBooks = Book::where('status', 'active')->latest()->limit(4)->get();
        $banners = Banner::where('is_active', 1)->latest()->limit(4)->get();
        return view("home.index", compact("categories", "books", 'newBooks', 'banners'));
    }

    public function bookDetail(Book $book) {
        $relatedBooks = Book::where('category_id', $book->category_id)->latest()->limit(10)->get();
        return view('home.book-detail', compact('book', 'relatedBooks'));
    }  
}
