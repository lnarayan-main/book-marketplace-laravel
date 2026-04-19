@extends('layouts.admin')

@section('title', 'Edit Category: ' . $category->name)

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-900 mb-4 transition">
        <i class="fa fa-arrow-left mr-2"></i> Back to List
    </a>

    <div class="bg-white rounded-lg shadow-sm p-8 border border-gray-100">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                    class="w-full border rounded-md p-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition" required>
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4" 
                    class="w-full border rounded-md p-3 focus:ring-2 focus:ring-indigo-500 outline-none transition">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category Image</label>
                
                @if($category->image)
                    <div class="mb-3">
                        <p class="text-xs text-gray-500 mb-1">Current Image:</p>
                        <img src="{{ asset('storage/' . $category->image) }}" alt="Current" class="w-32 h-32 object-cover rounded-md border p-1 bg-gray-50">
                    </div>
                @endif

                <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="text-xs text-gray-400 mt-2 italic">Leave blank to keep the current image.</p>
            </div>

            <div class="mb-8 p-4 bg-gray-50 rounded-md border border-gray-200">
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" {{ $category->is_active ? 'checked' : '' }} 
                        class="h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 cursor-pointer">
                    <label for="is_active" class="ml-3 text-sm font-medium text-gray-700 cursor-pointer">
                        Active Status
                    </label>
                </div>
                <p class="text-xs text-gray-500 ml-8 mt-1">If disabled, this category and its books will be hidden from the store.</p>
            </div>

            <div class="flex items-center gap-4 border-t pt-6">
                <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-md font-bold hover:bg-indigo-700 transition shadow-md">
                    Update Category
                </button>
                <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection