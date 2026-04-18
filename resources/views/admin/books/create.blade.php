@extends('layouts.admin')

@section('title', 'Add New Book (Admin)')

@section('content')
<div class="max-w-4xl bg-white p-8 rounded-lg shadow-sm border">
    <h3 class="text-xl font-bold mb-6">Inventory Entry</h3>
    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700">Book Title</label>
                <input type="text" name="title" class="w-full border rounded p-2.5 mt-1" placeholder="Enter book title" required>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-slate-700">Author Name</label>
                <input type="text" name="author" class="w-full border rounded p-2.5 mt-1" required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Category</label>
                <select name="category_id" class="w-full border rounded p-2.5 mt-1">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Assign to Seller</label>
                <select name="user_id" class="w-full border rounded p-2.5 mt-1">
                    @foreach($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700">Price ($)</label>
                    <input type="number" step="0.01" name="price" class="w-full border rounded p-2.5 mt-1" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700">Stock</label>
                    <input type="number" name="stock" class="w-full border rounded p-2.5 mt-1" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Listing Status</label>
                <select name="status" class="w-full border rounded p-2.5 mt-1">
                    <option value="pending">Pending Review</option>
                    <option value="active" selected>Active</option>
                    <option value="rejected">Rejected</option>
                    <option value="out_of_stock">Out of Stock</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Cover Image</label>
                <input type="file" name="cover_image" class="w-full mt-1 text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded p-2.5 mt-1" required></textarea>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t flex gap-4">
            <button type="submit" class="bg-indigo-600 text-white px-8 py-2.5 rounded font-bold hover:bg-indigo-700">Publish Book</button>
            <a href="{{ route('admin.books.index') }}" class="px-6 py-2.5 text-slate-600">Cancel</a>
        </div>
    </form>
</div>
@endsection