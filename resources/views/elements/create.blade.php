<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Element to "{{ $post->title }}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-600 hover:underline mb-6 inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Post
                    </a>
                    
                    <div class="mt-6">
                        <h3 class="text-lg font-medium mb-6">Element Details</h3>
                        
                        <form method="POST" action="{{ route('elements.store') }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Element Name</label>
                                <input type="text" name="name" id="name" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" value="{{ old('name') }}" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="content" id="content" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="code" class="block text-sm font-medium text-gray-700 mb-1">HTML/Tailwind Code</label>
                                <textarea name="code" id="code" rows="8" class="font-mono shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" required>{{ old('code') }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Paste your HTML and Tailwind CSS component code here</p>
                                @error('code')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Create Element
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>