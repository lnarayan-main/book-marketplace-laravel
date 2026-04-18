@extends('layouts.admin')

@section('title', 'System Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-sm p-6 border-b-4 border-indigo-500">
        <div class="flex items-center">
            <div class="p-3 bg-indigo-100 rounded-full text-indigo-600 mr-4">
                <i class="fa fa-users text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium uppercase">Total Sellers</p>
                <h3 class="text-2xl font-bold">42</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6 border-b-4 border-green-500">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-full text-green-600 mr-4">
                <i class="fa fa-book text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium uppercase">Total Books</p>
                <h3 class="text-2xl font-bold">1,204</h3>
            </div>
        </div>
    </div>

    </div>

<div class="bg-white rounded-lg shadow-sm p-6">
    <h4 class="text-lg font-bold mb-4 text-gray-700">Recent Activity</h4>
    <p class="text-gray-500 text-sm">System logs and recent registrations will appear here.</p>
</div>
@endsection