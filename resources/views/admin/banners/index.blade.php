@extends('layouts.admin')

@section('title', 'Manage Banners')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-slate-200">
    <div class="p-6 border-b flex justify-between items-center">
        <h3 class="text-lg font-bold text-slate-800">Homepage Banners</h3>
        <a href="{{ route('admin.banners.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm font-bold shadow hover:bg-indigo-700 transition">
            <i class="fa fa-plus mr-1"></i> Add Banner
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-600 text-xs uppercase">
                <tr>
                    <th class="p-4">Preview</th>
                    <th class="p-4">Title</th>
                    <th class="p-4">Link</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y text-sm">
                @foreach($banners as $banner)
                <tr class="hover:bg-slate-50">
                    <td class="p-4">
                        <img src="{{ asset('storage/' . $banner->image) }}" class="w-24 h-12 object-cover rounded border shadow-sm">
                    </td>
                    <td class="p-4 font-medium text-slate-800">{{ $banner->title }}</td>
                    <td class="p-4 text-slate-500 truncate max-w-xs">{{ $banner->link ?? 'N/A' }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 rounded-full text-[10px] font-bold {{ $banner->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $banner->is_active ? 'ACTIVE' : 'INACTIVE' }}
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.banners.edit', $banner) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this banner?')" class="text-red-500 hover:text-red-700"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection