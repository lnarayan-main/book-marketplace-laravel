@extends('layouts.admin')

@section('title', 'Global Book Inventory')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-slate-200">
    <div class="p-6 border-b flex justify-between items-center">
        <h3 class="text-lg font-bold text-slate-800">Global Inventory</h3>
        <a href="{{ route('admin.books.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm flex items-center gap-2">
            <i class="fa fa-plus"></i> Add Book
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-600 text-xs uppercase">
                <tr>
                    <th class="p-4">Cover</th>
                    <th class="p-4">Title / Author</th>
                    <th class="p-4">Seller</th>
                    <th class="p-4">Price/Stock</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y text-sm">
                @foreach($books as $book)
                <tr class="hover:bg-slate-50">
                    <td class="p-4">
                        <img src="{{ $book->cover_image ? asset('storage/'.$book->cover_image) : 'https://via.placeholder.com/40x60' }}" class="w-10 h-14 object-cover rounded shadow-sm border">
                    </td>
                    <td class="p-4">
                        <div class="font-bold text-slate-800">{{ $book->title }}</div>
                        <div class="text-xs text-slate-500">By {{ $book->author }}</div>
                    </td>
                    <td class="p-4">
                        <span class="text-xs font-medium text-indigo-600 bg-indigo-50 px-2 py-1 rounded">{{ $book->user->name }}</span>
                    </td>
                    <td class="p-4">
                        <div class="font-bold">${{ $book->price }}</div>
                        <div class="text-xs {{ $book->stock > 0 ? 'text-green-600' : 'text-red-600' }}">Qty: {{ $book->stock }}</div>
                    </td>
                    <td class="p-4">
                        <span class="px-2 py-1 rounded-full text-xs font-bold 
                            {{ $book->status == 'active' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $book->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $book->status == 'rejected' ? 'bg-red-100 text-red-700' : '' }}
                            {{ $book->status == 'out_of_stock' ? 'bg-gray-100 text-gray-700' : '' }}">
                            {{ strtoupper($book->status) }}
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.books.edit', $book) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Move to trash?')" class="text-red-500 hover:text-red-700"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection