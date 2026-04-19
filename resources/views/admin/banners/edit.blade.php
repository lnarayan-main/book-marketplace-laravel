@extends('layouts.admin')

@section('title', 'Edit Banner: ' . $banner->name)

@section('content')
<div class="max-w-3xl bg-white p-8 rounded-lg shadow-sm border border-slate-200">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold text-slate-800">Edit Banner: {{ $banner->title }}</h3>
        <a href="{{ route('admin.banners.index') }}" class="text-sm text-indigo-600 hover:underline">
            <i class="fa fa-arrow-left"></i> Back to Banners
        </a>
    </div>

    <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-slate-700">Banner Title</label>
                <input type="text" name="title" value="{{ old('title', $banner->title) }}" 
                    class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none" required>
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Redirect Link (URL)</label>
                <input type="url" name="link" value="{{ old('link', $banner->link) }}" 
                    class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none" 
                    placeholder="https://example.com/collection">
            </div>

            <div class="p-4 bg-slate-50 rounded-lg border border-dashed border-slate-300">
                <label class="block text-sm font-bold text-slate-700 mb-3">Banner Image</label>
                <div class="flex flex-col md:flex-row items-start gap-6">
                    @if($banner->image)
                        <div class="shrink-0">
                            <p class="text-[10px] font-bold text-slate-400 mb-1 uppercase">Currently Active</p>
                            <img src="{{ asset('storage/' . $banner->image) }}" class="w-48 h-24 object-cover rounded shadow-sm border bg-white">
                        </div>
                    @endif
                    <div class="grow">
                        <input type="file" name="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <p class="mt-2 text-xs text-slate-400 italic">Leave blank if you don't want to change the image. (Recommended size: 1920x600px)</p>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700">Short Description</label>
                <textarea name="description" rows="3" 
                    class="w-full border border-slate-300 rounded p-2.5 mt-1 focus:ring-2 focus:ring-indigo-500 outline-none">{{ old('description', $banner->description) }}</textarea>
            </div>

            <div class="flex items-center p-4 bg-indigo-50 rounded-md">
                <input type="checkbox" name="is_active" id="is_active" {{ $banner->is_active ? 'checked' : '' }} 
                    class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 cursor-pointer">
                <label for="is_active" class="ml-3 text-sm font-bold text-indigo-900 cursor-pointer">
                    Visible on Homepage
                </label>
                <p class="ml-auto text-[10px] text-indigo-400 italic font-medium hidden md:block">Turn off to hide from customers</p>
            </div>

            <div class="pt-6 border-t flex items-center gap-4">
                <button type="submit" class="bg-indigo-600 text-white px-10 py-3 rounded-md font-bold hover:bg-indigo-700 transition shadow-lg active:scale-95">
                    Update Banner
                </button>
                <a href="{{ route('admin.banners.index') }}" class="text-slate-500 hover:text-slate-800 font-medium">
                    Cancel Changes
                </a>
            </div>
        </div>
    </form>
</div>
@endsection