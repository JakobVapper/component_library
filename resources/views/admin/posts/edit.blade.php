<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Edit Component') }}
            </h2>
            <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 transition-colors font-medium">
                Back to Components
            </a>
        </div>
    </x-slot>

    @if(View::exists('components.admin-nav'))
        <x-admin-nav />
    @endif

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 bg-green-900/50 border-l-4 border-green-500 p-4 rounded-lg text-white">
                    <div class="flex">
                        <svg class="h-5 w-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl border border-gray-800">
                <div class="p-6 text-white">
                    <div class="mb-6">
                        <div class="flex justify-between items-center bg-gray-800/50 p-4 rounded-lg border border-gray-700">
                            <div>
                                <p class="text-sm text-gray-300">Status: 
                                    @if($post->published_at)
                                        <span class="text-green-400">Published</span> on {{ $post->published_at->format('M d, Y') }}
                                    @else
                                        <span class="text-yellow-400">Draft</span>
                                    @endif
                                </p>
                                <p class="text-sm text-gray-300 mt-1">
                                    <span class="text-white">{{ $post->elements->count() }}</span> elements, 
                                    <span class="text-green-400">{{ $post->elements->where('status', 'approved')->count() }}</span> approved,
                                    <span class="text-yellow-400">{{ $post->elements->where('status', 'pending')->count() }}</span> pending
                                </p>
                            </div>
                            <a href="{{ route('blog.show', $post->slug) }}" class="px-3 py-1 bg-gray-800 text-white rounded hover:bg-gray-700 transition-colors text-sm flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View Component
                            </a>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-300 mb-1 required">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white" value="{{ old('title', $post->title) }}">
                            @error('title')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="excerpt" class="block text-sm font-medium text-gray-300 mb-1">Excerpt</label>
                            <textarea name="excerpt" id="excerpt" rows="2" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white">{{ old('excerpt', $post->excerpt) }}</textarea>
                            @error('excerpt')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="featured_image" class="block text-sm font-medium text-gray-300 mb-1">Featured Image URL</label>
                            <input type="text" name="featured_image" id="featured_image" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white" value="{{ old('featured_image', $post->featured_image) }}">
                            @error('featured_image')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            
                            @if($post->featured_image)
                                <div class="mt-3 relative">
                                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="h-32 object-cover rounded-lg border border-gray-700">
                                </div>
                            @endif
                        </div>
                        
                        <div class="flex items-center mb-6">
                            <input type="checkbox" name="publish" id="publish" class="rounded bg-gray-700 border-gray-600 text-white focus:ring-white" {{ old('publish', $post->published_at) ? 'checked' : '' }}>
                            <label for="publish" class="ml-2 block text-sm text-gray-300">Published</label>
                        </div>
                        
                        <div class="flex justify-between items-center mt-10 pt-6 border-t border-gray-800">
                            <div class="text-sm text-gray-400">
                                <span class="text-red-500">*</span> Required fields
                            </div>
                            <div class="flex space-x-3">
                                <button type="submit" class="px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 transition-colors font-medium">
                                    Update Component
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>