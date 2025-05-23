<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'University Digital Notice Board') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-blue-800 border-b border-blue-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold">
                                {{ config('app.name', 'University Digital Notice Board') }}
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-white text-white' : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300' }} text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                Dashboard
                            </a>
                            
                            <a href="{{ route('notices.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('notices.*') ? 'border-white text-white' : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300' }} text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                Notices
                            </a>

                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('notices.create') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('notices.create') ? 'border-white text-white' : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300' }} text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                    Post Notice
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="ml-3 relative">
                            <div class="flex items-center">
                                <span class="text-gray-300 mr-4">{{ Auth::user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-gray-300 hover:text-white text-sm font-medium">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 focus:text-white transition duration-150 ease-in-out" aria-controls="mobile-menu" aria-expanded="false">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="sm:hidden" id="mobile-menu">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('dashboard') ? 'border-white text-white bg-blue-700' : 'border-transparent text-gray-300 hover:text-white hover:bg-blue-700 hover:border-gray-300' }} text-base font-medium focus:outline-none focus:text-white focus:bg-blue-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Dashboard
                    </a>
                    
                    <a href="{{ route('notices.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('notices.*') ? 'border-white text-white bg-blue-700' : 'border-transparent text-gray-300 hover:text-white hover:bg-blue-700 hover:border-gray-300' }} text-base font-medium focus:outline-none focus:text-white focus:bg-blue-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Notices
                    </a>

                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('notices.create') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('notices.create') ? 'border-white text-white bg-blue-700' : 'border-transparent text-gray-300 hover:text-white hover:bg-blue-700 hover:border-gray-300' }} text-base font-medium focus:outline-none focus:text-white focus:bg-blue-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Post Notice
                        </a>
                    @endif
                </div>

                <div class="pt-4 pb-1 border-t border-blue-700">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-300">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-blue-700 focus:outline-none focus:text-white focus:bg-blue-700 transition duration-150 ease-in-out">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.querySelector('[aria-controls="mobile-menu"]');
            const menu = document.getElementById('mobile-menu');
            
            button.addEventListener('click', function() {
                const expanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', !expanded);
                menu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html> 