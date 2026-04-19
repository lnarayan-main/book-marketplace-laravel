@extends('layouts.admin')

@section('title', 'Edit Seller: ' . $seller->name)

@section('content')
<div class="max-w-xl bg-white p-8 rounded-lg shadow-sm border border-slate-200">
    <form action="{{ route('admin.sellers.update', $seller) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $seller->name) }}" class="mt-1 block w-full border rounded-md p-2 focus:ring-indigo-500 border-slate-300">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $seller->email) }}" class="mt-1 block w-full border rounded-md p-2 focus:ring-indigo-500 border-slate-300">
            </div>

            <div class="pt-4 border-t">
                <p class="text-xs text-slate-500 mb-4 font-bold uppercase">Reset Password (Optional)</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="password" name="password" placeholder="New Password" class="border rounded-md p-2 text-sm border-slate-300">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="border rounded-md p-2 text-sm border-slate-300">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 font-bold shadow-sm">
                    Update Profile
                </button>
                <a href="{{ route('admin.sellers.index') }}" class="text-slate-600 hover:text-slate-900 text-sm">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection