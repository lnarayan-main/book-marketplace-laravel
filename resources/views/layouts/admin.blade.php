<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-slate-900 text-slate-300 flex-shrink-0 hidden md:flex flex-col">
            <a href="{{ route('admin.dashboard') }}" class="p-6 text-white text-2xl font-bold border-b border-slate-800">
                Book <span class="text-indigo-400">Admin</span>
            </a>
            
            <nav class="flex-1 mt-4 space-y-1 px-2">
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md hover:bg-slate-800 hover:text-white transition {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-white' : '' }}">
                    <i class="fa fa-home mr-3 w-5 text-center"></i> Dashboard
                </a>

                <a href="{{ route('admin.categories.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md hover:bg-slate-800 hover:text-white transition {{ request()->routeIs('admin.categories.*') ? 'bg-slate-800 text-white' : '' }}">
                    <i class="fa fa-list mr-3 w-5 text-center"></i> Categories
                </a>

                <a href="{{ route('admin.sellers.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md hover:bg-slate-800 hover:text-white transition">
                    <i class="fa fa-users mr-3 w-5 text-center"></i> Sellers
                </a>

                <a href="{{ route('admin.customers.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md hover:bg-slate-800 hover:text-white transition">
                    <i class="fa fa-users mr-3 w-5 text-center"></i> Customers
                </a>

                <a href="{{ route('admin.books.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md hover:bg-slate-800 hover:text-white transition">
                    <i class="fa fa-shopping-bag mr-3 w-5 text-center"></i> All Books
                </a>
            </nav>

            <div class="p-4 border-t border-slate-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="flex items-center w-full px-4 py-2 text-sm text-red-400 hover:bg-slate-800 rounded-md transition">
                        <i class="fa fa-sign-out mr-3"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white border-b h-16 flex items-center justify-between px-8 z-10">
                <h1 class="text-lg font-semibold text-gray-700">@yield('title', 'Admin Panel')</h1>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500 italic">Welcome, Admin</span>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=4f46e5&color=fff" class="w-8 h-8 rounded-full border" alt="Profile">
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif
                
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>