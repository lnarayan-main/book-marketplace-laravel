@extends('layouts.admin')

@section('title', 'Register New Seller')

@section('content')
<div class="max-w-xl">
    <a href="{{ route('admin.sellers.index') }}" class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-900 mb-4 transition">
        <i class="fa fa-arrow-left mr-2"></i> Back to Seller List
    </a>

    <div class="bg-white p-8 rounded-lg shadow-sm border border-slate-200">
        <div class="mb-6">
            <h3 class="text-xl font-bold text-slate-800">Account Credentials</h3>
            <p class="text-sm text-slate-500">Provide the details to create a new seller account. They will be able to log in immediately after registration.</p>
        </div>

        <form action="{{ route('admin.sellers.store') }}" method="POST">
            @csrf

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                        class="w-full border rounded-md p-2.5 focus:ring-2 focus:ring-indigo-500 border-slate-300 outline-none transition" 
                        placeholder="e.g. John Doe" required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                        class="w-full border rounded-md p-2.5 focus:ring-2 focus:ring-indigo-500 border-slate-300 outline-none transition" 
                        placeholder="seller@example.com" required>
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                        <input type="password" name="password" 
                            class="w-full border rounded-md p-2.5 focus:ring-2 focus:ring-indigo-500 border-slate-300 outline-none transition" 
                            required>
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Confirm Password</label>
                        <input type="password" name="password_confirmation" 
                            class="w-full border rounded-md p-2.5 focus:ring-2 focus:ring-indigo-500 border-slate-300 outline-none transition" 
                            required>
                    </div>
                </div>

                <div class="bg-indigo-50 border-l-4 border-indigo-400 p-4 mt-2">
                    <p class="text-xs text-indigo-700">
                        <i class="fa fa-info-circle mr-1"></i> 
                        The new account will be created with the <strong>Seller Role (1)</strong> and will be automatically marked as verified.
                    </p>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                    <button type="submit" class="bg-indigo-600 text-white px-8 py-2.5 rounded-md hover:bg-indigo-700 font-bold shadow-md transition transform active:scale-95">
                        Create Seller Account
                    </button>
                    <a href="{{ route('admin.sellers.index') }}" class="text-slate-600 hover:text-slate-900 text-sm font-medium">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection