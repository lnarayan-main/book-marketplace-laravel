@extends('layouts.admin')

@section('title', 'Edit Book: ' . $book->title)

@section('content')
    <div class="max-w-4xl bg-white p-8 rounded-lg shadow-sm border border-slate-200">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-slate-800">Edit Book: {{ $book->title }}</h3>
            <a href="{{ route('admin.books.index') }}" class="text-sm text-indigo-600 hover:underline">
                <i class="fa fa-arrow-left"></i> Back to Inventory
            </a>
        </div>

        <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700">Book Title</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}"
                        class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700">Author</label>
                    <input type="text" name="author" value="{{ old('author', $book->author) }}"
                        class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>
                    @error('author') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700">Category</label>
                    <select name="category_id"
                        class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700">Assigned Seller</label>
                    <select name="user_id" class="w-full border border-slate-300 rounded p-2.5 mt-1 bg-slate-50">
                        @foreach($sellers as $seller)
                            <option value="{{ $seller->id }}" {{ $book->user_id == $seller->id ? 'selected' : '' }}>
                                {{ $seller->name }} ({{ $seller->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700">Listing Status</label>
                    <select name="status"
                        class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none">
                        <option value="active" {{ $book->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="pending" {{ $book->status == 'pending' ? 'selected' : '' }}>Pending Review</option>
                        <option value="rejected" {{ $book->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="out_of_stock" {{ $book->status == 'out_of_stock' ? 'selected' : '' }}>Out of Stock
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700">Price ($)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $book->price) }}"
                        class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700">Stock Quantity</label>
                    <input type="number" name="stock" value="{{ old('stock', $book->stock) }}"
                        class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none"
                        required>{{ old('description', $book->description) }}</textarea>
                </div>

                <div class="md:col-span-2 p-4 bg-slate-50 rounded-lg border border-dashed border-slate-300">
                    <label class="block text-sm font-bold text-slate-700 mb-3">Book Cover Image</label>
                    <div class="flex items-start gap-6">
                        @if($book->cover_image)
                            <div class="shrink-0">
                                <img src="{{ asset('storage/' . $book->cover_image) }}"
                                    class="w-24 h-32 object-cover rounded shadow border bg-white">
                                <p class="text-[10px] text-center text-slate-400 mt-1 uppercase font-bold">Current</p>
                            </div>
                        @endif
                        <div class="grow">
                            <input type="file" name="cover_image"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-2 text-xs text-slate-400">Upload a new cover to replace the current one. Max size
                                2MB.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-slate-100 flex items-center gap-4">
                <button type="submit"
                    class="bg-indigo-600 text-white px-10 py-3 rounded-md font-bold hover:bg-indigo-700 transition shadow-md active:scale-95">
                    Update Marketplace Listing
                </button>
                <a href="{{ route('admin.books.index') }}" class="text-slate-500 hover:text-slate-800 font-medium">Cancel
                    Changes</a>
            </div>
        </form>
    </div>
@endsection