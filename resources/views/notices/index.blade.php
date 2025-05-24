<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Department Filter -->
                    <div class="mb-6">
                        <form method="GET" action="{{ route('notices.index') }}" class="flex gap-4">
                            <select name="department" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">All Departments</option>
                                @foreach(['Computer Science', 'Information Technology', 'Electronics', 'Electrical', 'Mechanical', 'Civil'] as $dept)
                                    <option value="{{ $dept }}" {{ request('department') == $dept ? 'selected' : '' }}>
                                        {{ $dept }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Filter
                            </button>
                        </form>
                    </div>

                    <!-- Notices List -->
                    <div class="space-y-6">
                        @forelse($notices as $notice)
                            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $notice->title }}</h3>
                                        <p class="mt-2 text-sm text-gray-600">{{ $notice->message }}</p>
                                        <div class="mt-4 flex items-center text-sm text-gray-500">
                                            <span class="mr-4">Department: {{ $notice->department }}</span>
                                            <span>Posted by: {{ $notice->user->name }}</span>
                                        </div>
                                        @if($notice->file_path)
                                            <div class="mt-4">
                                                <a href="{{ Storage::url($notice->file_path) }}" 
                                                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700"
                                                   target="_blank">
                                                    Download Attachment
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $notice->created_at->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500 py-8">
                                No notices found.
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $notices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 