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
                            
                            @if($post->excerpt)
                                <div class="bg-gray-50 p-4 rounded-md mb-6">
                                    <p class="italic">{{ $post->excerpt }}</p>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Elements Section -->
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-semibold">Component Elements</h3>
                                @auth
                                    <a href="{{ route('elements.create', ['post' => $post->slug]) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Add New Element
                                    </a>
                                @endauth
                            </div>
                            
                            <!-- Elements List -->
                            <div class="space-y-6" id="elements-list">
                                @forelse($post->elements ?? [] as $element)
                                    <div class="bg-gray-50 p-4 rounded-lg shadow-sm" id="element-{{ $element->id }}">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-medium text-lg">{{ $element->name }}</h4>
                                                <p class="text-sm text-gray-600">Added by {{ $element->user->name }} on {{ $element->created_at->format('M j, Y') }}</p>
                                            </div>
                                            
                                            @auth
                                                @if(auth()->id() === $element->user_id || auth()->user()->is_admin)
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('elements.edit', $element) }}" class="text-blue-500 hover:text-blue-700">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                        </a>
                                                        <form method="POST" action="{{ route('elements.destroy', $element) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this element?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                        
                                        <div class="mt-4">
                                            <div class="element-description mb-4">{{ $element->content }}</div>
                                            
                                            <div class="bg-gray-100 p-4 rounded-lg mb-4">
                                                <h5 class="text-sm font-medium mb-2">Preview:</h5>
                                                <div class="p-4 bg-white border border-gray-200 rounded">
                                                    <iframe src="{{ route('elements.preview', $element) }}" class="w-full" style="height: 150px; border: none;"></iframe>
                                                </div>
                                            </div>
                                            
                                            <div class="bg-gray-100 p-4 rounded-lg">
                                                <h5 class="text-sm font-medium mb-2">Code:</h5>
                                                <pre class="bg-gray-800 text-green-100 rounded-md overflow-x-auto p-4 text-sm"><code>{{ htmlspecialchars($element->code) }}</code></pre>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500 italic">No elements have been added yet.</p>
                                @endforelse
                            </div>
                            
                            @guest
                                <p class="mt-6 text-gray-600 italic">Please <a href="{{ route('login') }}" class="text-blue-600 hover:underline">log in</a> to add elements.</p>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>