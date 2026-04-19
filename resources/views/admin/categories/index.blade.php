@extends('layouts.admin')

@section('title', 'Manage Categories')

@section('content')
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-6 border-b flex justify-between items-center">
            <h3 class="text-lg font-bold">Category List</h3>
            <a href="{{ route('admin.categories.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm">
                <i class="fa fa-plus mr-2"></i> Add New
            </a>
        </div>
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                <tr>
                    <th class="p-4">Image</th>
                    <th class="p-4">Name</th>
                    <th class="p-4">Slug</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y text-gray-700">
                @foreach($categories as $category)
                    <tr>
                        <td class="p-4">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/50' }}"
                                class="w-12 h-12 rounded object-cover">
                        </td>
                        <td class="p-4 font-medium">{{ $category->name }}</td>
                        <td class="p-4 text-gray-500">{{ $category->slug }}</td>
                        <td class="p-4">
                            <span
                                class="px-2 py-1 rounded-full text-xs {{ $category->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                                class="text-indigo-600 hover:text-indigo-900"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this category?')"
                                    class="text-red-500 hover:text-red-700"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">
            {{ $categories->links() }}
        </div>
    </div>
@endsection