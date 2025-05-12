<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Create New Component') }}
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
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl border border-gray-800">
                <div class="p-6 text-white">
                    <form action="{{ route('admin.posts.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-300 mb-1 required">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white" value="{{ old('title') }}">
                            @error('title')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-400">Example: "Button Component" or "Card Component"</p>
                        </div>
                        
                        <div class="mb-6">
                            <label for="excerpt" class="block text-sm font-medium text-gray-300 mb-1">Excerpt</label>
                            <textarea name="excerpt" id="excerpt" rows="2" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-400">A short description of this component type (optional)</p>
                        </div>
                        
                        <div class="mb-6">
                            <label for="featured_image" class="block text-sm font-medium text-gray-300 mb-1">Featured Image URL</label>
                            <input type="text" name="featured_image" id="featured_image" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white" value="{{ old('featured_image') }}">
                            @error('featured_image')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-400">Full URL to an image representing this component type (optional)</p>
                        </div>
                        
                        <div class="flex items-center mb-6">
                            <input type="checkbox" name="publish" id="publish" class="rounded bg-gray-700 border-gray-600 text-white focus:ring-white" {{ old('publish') ? 'checked' : '' }}>
                            <label for="publish" class="ml-2 block text-sm text-gray-300">Publish immediately</label>
                        </div>
                        
                        <div class="flex justify-between items-center mt-10 pt-6 border-t border-gray-800">
                            <div class="text-sm text-gray-400">
                                <span class="text-red-500">*</span> Required fields
                            </div>
                            <button type="submit" class="px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 transition-colors font-medium">
                                Create Component
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>