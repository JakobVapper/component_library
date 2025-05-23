<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Edit Component') }}
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Form Section -->
                <div class="lg:col-span-2">
                    <div class="bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800 transition-all duration-300 hover:shadow-xl">
                        <div class="p-6 border-b border-gray-800">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-white rounded-md text-black">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Edit Component Details</h3>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <form action="{{ route('admin.posts.update', $post) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-6">
                                    <label for="title" class="block text-sm font-medium text-white mb-1">
                                        Component Title
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="title" 
                                           id="title" 
                                           class="mt-1 block w-full rounded-md bg-gray-900 border-gray-700 text-white focus:border-gray-400 focus:ring-gray-400" 
                                           value="{{ old('title', $post->title) }}" 
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
                                              class="mt-1 block w-full rounded-md bg-gray-900 border-gray-700 text-white focus:border-gray-400 focus:ring-gray-400">{{ old('excerpt', $post->excerpt) }}</textarea>
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
                                               value="{{ old('featured_image', $post->featured_image) }}">
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
                                               {{ old('publish', $post->published_at !== null) ? 'checked' : '' }}>
                                        <label for="publish" class="ml-2 text-sm font-medium text-white">Published</label>
                                        @if($post->published_at)
                                            <span class="ml-3 px-2 py-1 text-xs bg-green-900 text-green-200 rounded-full border border-green-700">
                                                Published on {{ $post->published_at->format('M d, Y') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition-all duration-300">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                        Update Component
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Component Info & Preview -->
                <div class="lg:col-span-1">
                    <div class="sticky top-6 space-y-6">
                        <!-- Component Preview -->
                        @if($post->featured_image)
                            <div class="bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800 transition-all duration-300 hover:shadow-xl">
                                <div class="p-4 border-b border-gray-800 flex justify-between items-center">
                                    <h3 class="font-medium text-white flex items-center">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Featured Image
                                    </h3>
                                </div>
                                
                                <div class="p-4">
                                    <div class="bg-gray-900 rounded-lg overflow-hidden relative border border-gray-800">
                                        <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Component Info -->
                        <div class="bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800 transition-all duration-300 hover:shadow-xl">
                            <div class="p-4 border-b border-gray-800">
                                <h3 class="font-medium text-white flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Component Information
                                </h3>
                            </div>
                            
                            <div class="p-4">
                                <dl class="space-y-4 text-sm">
                                    <div class="grid grid-cols-3 gap-4">
                                        <dt class="text-gray-500">URL Slug</dt>
                                        <dd class="text-white col-span-2 break-all">{{ $post->slug }}</dd>
                                    </div>
                                    
                                    <div class="grid grid-cols-3 gap-4">
                                        <dt class="text-gray-500">Created</dt>
                                        <dd class="text-white col-span-2">{{ $post->created_at->format('M j, Y, g:i A') }}</dd>
                                    </div>
                                    
                                    <div class="grid grid-cols-3 gap-4">
                                        <dt class="text-gray-500">Last Updated</dt>
                                        <dd class="text-white col-span-2">{{ $post->updated_at->format('M j, Y, g:i A') }}</dd>
                                    </div>
                                    
                                    <div class="grid grid-cols-3 gap-4">
                                        <dt class="text-gray-500">Elements</dt>
                                        <dd class="text-white col-span-2">
                                            <div class="flex space-x-2">
                                                <span class="bg-blue-900 text-blue-200 text-xs px-2 py-1 rounded-full border border-blue-800">
                                                    {{ $post->elements()->count() }} total
                                                </span>
                                                @if($post->elements()->where('status', 'approved')->count() > 0)
                                                    <span class="bg-green-900 text-green-200 text-xs px-2 py-1 rounded-full border border-green-800">
                                                        {{ $post->elements()->where('status', 'approved')->count() }} approved
                                                    </span>
                                                @endif
                                                @if($post->elements()->where('status', 'pending')->count() > 0)
                                                    <span class="bg-yellow-900 text-yellow-200 text-xs px-2 py-1 rounded-full border border-yellow-800">
                                                        {{ $post->elements()->where('status', 'pending')->count() }} pending
                                                    </span>
                                                @endif
                                            </div>
                                        </dd>
                                    </div>
                                </dl>
                                
                                <div class="mt-6 flex space-x-3">
                                    <a href="{{ route('blog.show', $post) }}" class="inline-flex items-center px-3 py-1.5 bg-gray-900 text-gray-300 hover:text-white border border-gray-800 rounded text-xs transition-colors duration-200 flex-1 justify-center">
                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View Component
                                    </a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this component? All associated elements will also be removed.')"
                                                class="inline-flex items-center px-3 py-1.5 bg-red-900 text-red-300 hover:bg-red-800 border border-red-800 rounded text-xs transition-colors duration-200 w-full justify-center">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>