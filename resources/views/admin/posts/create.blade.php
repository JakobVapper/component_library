<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Create New Component') }}
            </h2>
            <a href="{{ route('admin.posts.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-gray-700 rounded-md font-medium text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none transition-all duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                </svg>
                Back to Components
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800 transition-all duration-300 hover:shadow-xl">
                <div class="p-6 border-b border-gray-800">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white rounded-md text-black">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Create New Component</h3>
                    </div>
                </div>
                
                <div class="p-6">
                    <form action="{{ route('admin.posts.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-white mb-1">
                                Component Title
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   class="mt-1 block w-full rounded-md bg-gray-900 border-gray-700 text-white focus:border-gray-400 focus:ring-gray-400" 
                                   value="{{ old('title') }}" 
                                   placeholder="e.g. Button Component" 
                                   required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="excerpt" class="block text-sm font-medium text-white mb-1">
                                Description
                                <span class="text-gray-400 text-xs ml-1">(Optional)</span>
                            </label>
                            <textarea name="excerpt" 
                                      id="excerpt" 
                                      rows="3" 
                                      class="mt-1 block w-full rounded-md bg-gray-900 border-gray-700 text-white focus:border-gray-400 focus:ring-gray-400" 
                                      placeholder="A short description of what this component is about">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <p class="mt-1 text-sm text-red-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="featured_image" class="block text-sm font-medium text-white mb-1">
                                Featured Image URL
                                <span class="text-gray-400 text-xs ml-1">(Optional)</span>
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md bg-gray-800 text-gray-400 text-sm border border-r-0 border-gray-700">URL</span>
                                <input type="text" 
                                       name="featured_image" 
                                       id="featured_image" 
                                       class="flex-1 block w-full rounded-none rounded-r-md bg-gray-900 border-gray-700 text-white focus:border-gray-400 focus:ring-gray-400" 
                                       value="{{ old('featured_image') }}" 
                                       placeholder="https://example.com/image.jpg">
                            </div>
                            <p class="mt-1 text-xs text-gray-400 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Enter a valid URL for the featured image
                            </p>
                            @error('featured_image')
                                <p class="mt-1 text-sm text-red-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <div class="flex items-center">
                                <input type="checkbox" 
                                       name="publish" 
                                       id="publish" 
                                       class="rounded bg-gray-900 border-gray-700 text-blue-600 focus:ring-gray-400" 
                                       {{ old('publish') ? 'checked' : '' }}>
                                <label for="publish" class="ml-2 text-sm font-medium text-white">Publish immediately</label>
                            </div>
                            <p class="ml-6 mt-1 text-xs text-gray-400">
                                <svg class="w-3 h-3 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Uncheck to save as draft
                            </p>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition-all duration-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Create Component
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>