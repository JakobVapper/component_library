<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Create Element') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl border border-gray-800">
                <div class="p-6">
                    <div class="mb-6">
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-gray-300 hover:text-white inline-flex items-center group transition-all duration-200">
                            <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to {{ $post->title }}
                        </a>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-white mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add New Element to {{ $post->title }}
                        </h3>
                        
                        @if($errors->any())
                            <div class="mb-6 bg-red-900/50 border-l-4 border-red-500 p-4 rounded-lg text-white">
                                <div class="flex">
                                    <svg class="h-5 w-5 text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        
                        <form action="{{ route('elements.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            
                            <div class="mb-6">
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Element Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <p class="mt-1 text-sm text-gray-400">A short, descriptive name for your component element.</p>
                            </div>
                            
                            <div class="mb-6">
                                <label for="content" class="block text-sm font-medium text-gray-300 mb-1">Description</label>
                                <textarea name="content" id="content" rows="3" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('content') }}</textarea>
                                <p class="mt-1 text-sm text-gray-400">Explain what this element does and how to use it.</p>
                            </div>
                            
                            <div class="mb-6">
                                <label for="code" class="block text-sm font-medium text-gray-300 mb-1">HTML Code</label>
                                <textarea name="code" id="code" rows="8" class="font-mono mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('code') }}</textarea>
                                <p class="mt-1 text-sm text-gray-400">The actual HTML code for your component element.</p>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="group inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-sm text-black uppercase tracking-wider hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
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