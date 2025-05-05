<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline mb-6 inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Dashboard
                    </a>
                    
                    <div class="mt-6">
                        @if($post->featured_image)
                            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-lg mb-6">
                        @endif
                        
                        <div class="prose max-w-none">
                            <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                            
                            @if($post->published_at)
                                <p class="text-gray-500 mb-6">Published: {{ $post->published_at->format('F j, Y') }}</p>
                            @endif
                            
                            <div class="mt-6">
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>