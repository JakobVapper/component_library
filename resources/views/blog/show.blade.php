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
                                @forelse($post->elements()->where('status', 'approved')->get() as $element)
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
                                                <div class="flex justify-between items-center mb-2">
                                                    <h5 class="text-sm font-medium">Code:</h5>
                                                    <button 
                                                        onclick="copyElementCode(this, '{{ $element->id }}')" 
                                                        class="text-xs bg-blue-600 hover:bg-blue-700 text-white py-1 px-2 rounded flex items-center"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                        </svg>
                                                        Copy
                                                    </button>
                                                </div>
                                                <pre class="bg-gray-800 text-green-100 rounded-md overflow-x-auto p-4 text-sm"><code id="element-code-{{ $element->id }}" data-code="{{ htmlspecialchars($element->code) }}"></code></pre>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500 italic">No approved elements available yet.</p>
                                @endforelse
                                
                                @auth
                                    <div class="user-elements-status mt-8">
                                        @if(auth()->user()->elements()->where('post_id', $post->id)->where('status', 'pending')->count() > 0)
                                            <div class="mt-6 bg-yellow-50 border border-yellow-200 p-4 rounded-md">
                                                <p class="text-yellow-800">
                                                    <svg class="inline-block w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                                    </svg>
                                                    You have {{ auth()->user()->elements()->where('post_id', $post->id)->where('status', 'pending')->count() }} 
                                                    pending element(s) awaiting admin approval.
                                                </p>
                                            </div>
                                        @endif
                                        
                                        @if(auth()->user()->elements()->where('post_id', $post->id)->where('status', 'rejected')->count() > 0)
                                            <div class="mt-3 bg-red-50 border border-red-200 p-4 rounded-md">
                                                <p class="text-red-800">
                                                    <svg class="inline-block w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                                    </svg>
                                                    You have {{ auth()->user()->elements()->where('post_id', $post->id)->where('status', 'rejected')->count() }} 
                                                    rejected element(s). Please review and resubmit your elements.
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                @endauth
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
   
    @push('scripts')
    <script>
        // Initialize all code elements on page load
        document.addEventListener('DOMContentLoaded', function() {
            const codeElements = document.querySelectorAll('[data-code]');
            codeElements.forEach(element => {
                // Create a temporary div to decode HTML entities
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = element.getAttribute('data-code');
                // Set the decoded text content
                element.textContent = tempDiv.textContent;
            });
        });

        function copyElementCode(button, elementId) {
            const codeElement = document.getElementById('element-code-' + elementId);
            const textArea = document.createElement('textarea');
            textArea.value = codeElement.textContent;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            
            const originalText = button.innerHTML;
            button.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Copied!
            `;
            button.classList.remove('bg-blue-600', 'hover:bg-blue-700');
            button.classList.add('bg-green-600', 'hover:bg-green-700');
            
            // Reset button after 2 seconds
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-600', 'hover:bg-green-700');
                button.classList.add('bg-blue-600', 'hover:bg-blue-700');
            }, 2000);
        }
    </script>
    @endpush
</x-app-layout>