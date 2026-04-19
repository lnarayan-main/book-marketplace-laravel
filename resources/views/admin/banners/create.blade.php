@extends('layouts.admin')

@section('title', 'Create Banner')

@section('content')
<div class="max-w-3xl bg-white p-8 rounded-lg shadow-sm border">
    <h3 class="text-xl font-bold text-slate-800 mb-6">Create Promotional Banner</h3>
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-slate-700">Banner Title</label>
                <input type="text" name="title" class="w-full border rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="e.g. Summer Sale 2026" required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Redirect Link (URL)</label>
                <input type="url" name="link" class="w-full border rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="https://example.com/collection">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Banner Image</label>
                <input type="file" name="image" class="w-full mt-1 text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Short Description</label>
                <textarea name="description" rows="3" class="w-full border rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" checked class="w-4 h-4 text-indigo-600 border-gray-300 rounded">
                <label for="is_active" class="ml-2 text-sm font-medium text-slate-700">Display on Homepage</label>
            </div>

            <div class="pt-6 border-t flex gap-4">
                <button type="submit" class="bg-indigo-600 text-white px-8 py-2.5 rounded font-bold hover:bg-indigo-700 shadow-lg transition">Save Banner</button>
                <a href="{{ route('admin.banners.index') }}" class="px-6 py-2.5 text-slate-600 font-medium">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection