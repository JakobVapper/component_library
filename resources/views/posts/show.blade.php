<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $post->title }}
            </h2>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($post->featured_image)
                        <img class="w-full h-64 object-cover rounded-lg mb-6" src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                    @endif
                    
                    <div class="prose lg:prose-xl max-w-none">
                        {!! $post->content !!}
                    </div>
                    
                    <div class="mt-6 text-sm text-gray-500">
                        Published: {{ $post->published_at->format('F j, Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>