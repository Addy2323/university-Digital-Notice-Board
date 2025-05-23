<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md flex flex-col">
            <div class="h-16 flex items-center justify-center border-b">
                <span class="text-xl font-bold text-blue-700">{{ config('app.name', 'Dashboard') }}</span>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-50 {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700' }}">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('notices.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50 {{ request()->routeIs('notices.*') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700' }}">
                    <span>Notices</span>
                </a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('notices.create') }}" class="block px-4 py-2 rounded hover:bg-blue-50 {{ request()->routeIs('notices.create') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700' }}">
                        <span>Post Notice</span>
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-blue-50 text-gray-700">
                        <span>Admin Panel</span>
                    </a>
                @endif
                @if(auth()->user()->role === 'student')
                    <a href="#" class="block px-4 py-2 rounded hover:bg-blue-50 text-gray-700">
                        <span>My Notices</span>
                    </a>
                @endif
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 rounded hover:bg-blue-50 {{ request()->routeIs('profile.edit') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700' }}">
                    <span>Profile</span>
                </a>
            </nav>
            <form method="POST" action="{{ route('logout') }}" class="px-4 pb-6">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded bg-red-50 text-red-700 hover:bg-red-100 font-semibold">Logout</button>
            </form>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen">
            <!-- Topbar -->
            <header class="h-16 bg-white shadow flex items-center px-6 justify-between">
                <div>
                    <span class="text-lg font-semibold text-gray-800">@yield('title', 'Dashboard')</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                    <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">{{ ucfirst(Auth::user()->role) }}</span>
                </div>
            </header>
            <!-- Page Content -->
            <main class="flex-1 p-8">
                @if (session('status'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('status') }}</span>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html> 