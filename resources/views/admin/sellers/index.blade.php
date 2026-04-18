@extends('layouts.admin')

@section('title', 'Manage Sellers')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="p-6 border-b flex justify-between items-center">
        <h3 class="text-lg font-bold text-slate-800">Seller Directory</h3>
        <a href="{{ route('admin.sellers.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm transition">
            <i class="fa fa-user-plus mr-2"></i> Register New Seller
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-600 text-xs uppercase font-semibold">
                <tr>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Total Books</th>
                    <th class="p-4">Joined</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y text-sm text-slate-700">
                @foreach($sellers as $seller)
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-4 font-medium">{{ $seller->name }}</td>
                    <td class="p-4">{{ $seller->email }}</td>
                    <td class="p-4">
                        <span class="bg-indigo-100 text-indigo-700 px-2 py-1 rounded-full text-xs">
                            {{ $seller->books_count ?? $seller->books()->count() }} Books
                        </span>
                    </td>
                    <td class="p-4 text-slate-500">{{ $seller->created_at->format('M d, Y') }}</td>
                    <td class="p-4 text-right space-x-3">
                        <a href="{{ route('admin.sellers.edit', $seller) }}" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.sellers.destroy', $seller) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Remove this seller?')" class="text-red-500 hover:text-red-700">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection