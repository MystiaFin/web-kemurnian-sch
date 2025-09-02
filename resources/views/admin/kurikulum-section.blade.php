@extends('layouts.admin')

@section('content')
<div>
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Kurikulum Management</h1>
            <p class="text-gray-600 mt-2">Manage curriculum content for the education system</p>
        </div>
        <!-- New Curriculum Button -->
        <a href="{{ route('admin.new-kurikulum') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center space-x-2 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>New Curriculum</span>
        </a>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <!-- Kurikulum Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($kurikulum as $item)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <!-- Card Content -->
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 truncate pr-2">
                        {{ $item->title }}
                    </h3>
                    <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                        #{{ $item->id }}
                    </span>
                </div>
                
                <div class="mb-4">
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ Str::limit(strip_tags($item->body), 30, '...') }}
                    </p>
                </div>
                
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <div class="text-xs text-gray-500">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('admin.edit-kurikulum', $item->id) }}" 
                           class="text-blue-600 hover:text-blue-800 hover:bg-blue-50 p-2 rounded-full transition-colors duration-200"
                           title="Edit Curriculum">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>
                        
                        <!-- Delete Button -->
                        <form action="{{ route('admin.kurikulum.destroy', $item->id) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this curriculum?')" 
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800 hover:bg-red-50 p-2 rounded-full transition-colors duration-200"
                                    title="Delete Curriculum">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="col-span-full">
            <div class="bg-gray-50 rounded-lg p-12 text-center">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No curriculum yet</h3>
                <p class="text-gray-600 mb-6">Get started by creating your first curriculum content</p>
                <a href="{{ route('admin.new-kurikulum') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 inline-flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Create First Curriculum</span>
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection