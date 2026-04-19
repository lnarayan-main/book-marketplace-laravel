@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
    <div class="max-w-2xl bg-white rounded-lg shadow-sm p-8">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="name"
                    class="mt-1 block w-full border rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="3" class="mt-1 block w-full border rounded-md p-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" class="mt-1 block w-full text-sm text-gray-500">
            </div>

            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_active" id="is_active" checked
                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                <label for="is_active" class="ml-2 text-sm text-gray-700">Active (Visible on Store)</label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">Save
                    Category</button>
                <a href="{{ route('admin.categories.index') }}"
                    class="bg-gray-100 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-200">Cancel</a>
            </div>
        </form>
    </div>
@endsection