<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Welcome, {{ Auth::user()->name }}!</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Department Card -->
                <div class="bg-blue-50 rounded-lg p-6 border border-blue-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Department</h3>
                            <p class="text-gray-600">{{ Auth::user()->department }}</p>
                        </div>
                    </div>
                </div>

                <!-- Role Card -->
                <div class="bg-green-50 rounded-lg p-6 border border-green-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Role</h3>
                            <p class="text-gray-600">{{ ucfirst(Auth::user()->role) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="bg-purple-50 rounded-lg p-6 border border-purple-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Quick Actions</h3>
                            <div class="mt-2 space-y-2">
                                <a href="{{ route('notices.index') }}" class="text-purple-600 hover:text-purple-800 block">View Notices</a>
                                @if(Auth::user()->isAdmin())
                                    <a href="{{ route('notices.create') }}" class="text-purple-600 hover:text-purple-800 block">Post New Notice</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Notices Section -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Notices</h3>
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul class="divide-y divide-gray-200">
                        @forelse($recentNotices as $notice)
                            <li>
                                <a href="{{ route('notices.show', $notice) }}" class="block hover:bg-gray-50">
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-blue-600 truncate">
                                                    {{ $notice->title }}
                                                </p>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ Str::limit($notice->message, 100) }}
                                                </p>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    {{ $notice->department }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-between">
                                            <div class="sm:flex">
                                                <p class="flex items-center text-sm text-gray-500">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    {{ $notice->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="px-4 py-4 sm:px-6">
                                <p class="text-gray-500 text-center">No notices available.</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
