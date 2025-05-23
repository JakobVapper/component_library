<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight truncate pr-4">
                {{ $post->title }}
            </h2>
            @if($post->published_at)
                <span class="text-gray-400 text-sm whitespace-nowrap hidden sm:block">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{ $post->published_at->format('F j, Y') }}
                </span>
            @endif
        </div>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Component Header -->
            <div class="bg-gradient-to-br from-black to-gray-900 border border-gray-800 overflow-hidden shadow-md rounded-xl mb-6 transition-all duration-300 hover:shadow-lg">
                <div class="p-6 text-white">
                    <div class="flex items-center mb-6">
                        <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white inline-flex items-center group transition-colors">
                            <div class="p-1.5 rounded-full bg-gray-900 border border-gray-800 mr-2">
                                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                            </div>
                            <span>Back to Components</span>
                        </a>
                    </div>
                    
                    <div class="mt-8">
                        @if($post->featured_image)
                            <div class="mb-6 rounded-xl overflow-hidden border border-gray-800 shadow-sm">
                                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-72 sm:h-96 object-cover">
                            </div>
                        @endif
                        
                        <div class="prose prose-invert max-w-none">
                            <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-white">{{ $post->title }}</h1>
                            
                            @if($post->published_at && !request()->routeIs('admin.*'))
                                <p class="text-gray-400 mb-6 sm:hidden">Published: {{ $post->published_at->format('F j, Y') }}</p>
                            @endif
                            
                            @if($post->excerpt)
                                <div class="bg-black bg-opacity-50 p-5 rounded-lg mb-6 border border-gray-800">
                                    <p class="italic text-gray-300">{{ $post->excerpt }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Elements Section -->
            <div class="bg-black border border-gray-800 overflow-hidden shadow-md rounded-xl">
                <div class="p-6 border-b border-gray-800">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Component Elements
                        </h3>
                        <div>
                            @auth
                                <a href="{{ route('elements.create', ['post' => $post->slug]) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-white text-black border border-transparent rounded-md font-medium text-xs uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition-all duration-300">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add Element
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                
                <!-- Elements List -->
                <div class="p-6">
                    <div class="space-y-8" id="elements-list">
                        @forelse($post->elements()->where('status', 'approved')->get() as $element)
                            <div class="bg-gradient-to-r from-black to-gray-900 rounded-xl shadow border border-gray-800 transition-all duration-300 hover:border-gray-700 hover:shadow-lg overflow-hidden" id="element-{{ $element->id }}">
                                <div class="p-5 border-b border-gray-800">
                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                                        <div class="mb-3 sm:mb-0">
                                            <h4 class="font-medium text-lg text-white">{{ $element->name }}</h4>
                                            <p class="text-sm text-gray-400 mt-1 flex items-center">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                                {{ $element->user->name }}
                                                <span class="mx-1.5">•</span>
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                {{ $element->created_at->format('M j, Y') }}
                                            </p>
                                        </div>
                                        
                                        @auth
                                            @if(auth()->id() === $element->user_id || auth()->user()->is_admin)
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('elements.edit', $element) }}" class="p-1.5 bg-gray-900 rounded-md text-gray-300 hover:text-white hover:bg-gray-800 transition-colors border border-gray-800">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </a>
                                                    <form method="POST" action="{{ route('elements.destroy', $element) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this element?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="p-1.5 bg-gray-900 rounded-md text-gray-300 hover:text-red-400 hover:bg-gray-800 transition-colors border border-gray-800">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                                
                                <div class="p-5">
                                    @if($element->content)
                                        <div class="element-description mb-5 text-gray-300 bg-black bg-opacity-40 p-4 rounded-lg border border-gray-800">
                                            {{ $element->content }}
                                        </div>
                                    @endif
                                    
                                    <div class="mb-5">
                                        <div class="flex items-center mb-3">
                                            <h5 class="text-sm font-medium text-gray-300">Preview</h5>
                                            <div class="ml-auto flex-shrink-0">
                                                <span class="text-xs py-1 px-2 bg-gray-900 rounded-full text-gray-400 border border-gray-800">Responsive</span>
                                            </div>
                                        </div>
                                        <div class="bg-white rounded-lg shadow-inner overflow-hidden">
                                            <iframe src="{{ route('elements.preview', $element) }}" class="w-full rounded-lg" id="preview-frame-{{ $element->id }}" onload="resizeIframe(this)" style="border: none; min-height:150px;"></iframe>
                                        </div>
                                    </div>
                                    
                                    <div class="bg-black rounded-lg border border-gray-800">
                                        <div class="flex justify-between items-center p-3 border-b border-gray-800">
                                            <button 
                                                onclick="toggleCode('code-container-{{ $element->id }}')" 
                                                class="text-xs bg-gray-900 hover:bg-gray-800 text-white py-1.5 px-3 rounded-md flex items-center transition-colors border border-gray-700"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                                </svg>
                                                <span id="toggle-text-{{ $element->id }}">View code</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="toggle-icon-{{ $element->id }}">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>
                                            <button 
                                                onclick="copyElementCode(this, '{{ $element->id }}')" 
                                                class="text-xs bg-white hover:bg-gray-200 text-black py-1.5 px-3 rounded-md flex items-center transition-colors"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                                Copy code
                                            </button>
                                        </div>
                                        <div id="code-container-{{ $element->id }}" class="hidden animate-fadeIn">
                                            <pre class="bg-gray-950 text-gray-100 rounded-b-lg overflow-x-auto p-4 text-sm border-t border-gray-800"><code id="element-code-{{ $element->id }}" data-code="{{ htmlspecialchars($element->code) }}" class="language-html"></code></pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="bg-gradient-to-br from-black to-gray-900 rounded-xl p-12 text-center border border-gray-800 animate-fadeIn">
                                <div class="p-4 rounded-full bg-gray-900 border border-gray-800 inline-flex mb-6">
                                    <svg class="w-12 h-12 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-white mb-2">No elements available yet</h3>
                                <p class="text-gray-400 italic mb-6">Be the first to add an element to this component!</p>
                                
                                @auth
                                    <a href="{{ route('elements.create', ['post' => $post->slug]) }}" 
                                       class="inline-flex items-center px-5 py-2.5 bg-white text-black border border-transparent rounded-md font-medium text-sm tracking-wider hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition-all duration-300">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Add First Element
                                    </a>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="inline-flex items-center px-5 py-2.5 bg-white text-black border border-transparent rounded-md font-medium text-sm tracking-wider hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition-all duration-300">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                        </svg>
                                        Login to Add Element
                                    </a>
                                @endguest
                            </div>
                        @endforelse
                    </div>
                    
                    @auth
                        <div class="user-elements-status mt-8 space-y-3">
                            @if(auth()->user()->elements()->where('post_id', $post->id)->where('status', 'pending')->count() > 0)
                                <div class="bg-yellow-950 border border-yellow-800 p-4 rounded-lg">
                                    <p class="text-yellow-300 flex items-center">
                                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                        You have {{ auth()->user()->elements()->where('post_id', $post->id)->where('status', 'pending')->count() }} 
                                        pending element(s) awaiting admin approval.
                                    </p>
                                </div>
                            @endif
                            
                            @if(auth()->user()->elements()->where('post_id', $post->id)->where('status', 'rejected')->count() > 0)
                                <div class="bg-red-950 border border-red-800 p-4 rounded-lg">
                                    <p class="text-red-300 flex items-center">
                                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                        You have {{ auth()->user()->elements()->where('post_id', $post->id)->where('status', 'rejected')->count() }} 
                                        rejected element(s). Please review and resubmit your elements.
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endauth
                    
                    @guest
                        <div class="mt-8 p-4 bg-gray-900 rounded-lg text-center border border-gray-800">
                            <p class="text-gray-400">
                                Please 
                                <a href="{{ route('login') }}" class="text-white hover:text-gray-300 underline">
                                    log in
                                </a> 
                                or 
                                <a href="{{ route('register') }}" class="text-white hover:text-gray-300 underline">
                                    register
                                </a> 
                                to add your own elements to this component.
                            </p>
                        </div>
                    @endguest
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
            
            // Initialize filtering functionality
            initializeFilters();
            
            // Add animation to elements when they come into view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                threshold: 0.1
            });
            
            document.querySelectorAll('.element-item').forEach(element => {
                element.classList.add('opacity-0', 'translate-y-4', 'transition-all', 'duration-500');
                observer.observe(element);
            });
        });

        function resizeIframe(iframe) {
            // Set minimum height and styling
            iframe.style.height = '150px';
            iframe.style.backgroundColor = 'white';
            
            // Add event listener for height messages
            window.addEventListener('message', function(event) {
                if (event.data && event.data.height && iframe.id === event.source.frameElement.id) {
                    iframe.style.height = (event.data.height) + 'px';
                }
            });
            
            // Force refresh after loading
            iframe.addEventListener('load', function() {
                setTimeout(() => {
                    try {
                        const height = Math.max(
                            150,
                            iframe.contentWindow.document.body.scrollHeight
                        );
                        iframe.style.height = height + 'px';
                    } catch(e) {
                        // Catch cross-origin errors
                        console.log('Could not access iframe content height');
                    }
                }, 100);
            });
        }

        function toggleCode(containerId) {
            const container = document.getElementById(containerId);
            const elementId = containerId.split('-').pop();
            const toggleText = document.getElementById('toggle-text-' + elementId);
            const toggleIcon = document.getElementById('toggle-icon-' + elementId);
            
            if (container.classList.contains('hidden')) {
                container.classList.remove('hidden');
                toggleText.textContent = 'Hide code';
                toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />';
                
                // Smooth scroll to show the code
                setTimeout(() => {
                    container.scrollIntoView({behavior: 'smooth', block: 'nearest'});
                }, 100);
            } else {
                container.classList.add('hidden');
                toggleText.textContent = 'View code';
                toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />';
            }
        }

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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Copied!
            `;
            button.classList.remove('bg-white', 'hover:bg-gray-200', 'text-black');
            button.classList.add('bg-green-500', 'hover:bg-green-600', 'text-white');
            
            // Reset button after 2 seconds
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-500', 'hover:bg-green-600', 'text-white');
                button.classList.add('bg-white', 'hover:bg-gray-200', 'text-black');
            }, 2000);
        }
        
        function initializeFilters() {
            const filterName = document.getElementById('filter-name');
            const filterAuthor = document.getElementById('filter-author');
            const filterSort = document.getElementById('filter-sort');
            const resetFiltersBtn = document.getElementById('reset-filters');
            const elementItems = document.querySelectorAll('.element-item');
            
            // Apply filters on input changes
            filterName.addEventListener('input', applyFilters);
            filterAuthor.addEventListener('input', applyFilters);
            filterSort.addEventListener('change', applyFilters);
            
            // Reset filters
            resetFiltersBtn.addEventListener('click', function() {
                filterName.value = '';
                filterAuthor.value = '';
                filterSort.value = 'newest';
                applyFilters();
            });
            
            function applyFilters() {
                const nameFilter = filterName.value.toLowerCase();
                const authorFilter = filterAuthor.value.toLowerCase();
                const sortBy = filterSort.value;
                
                // First filter elements
                let visibleElements = [];
                
                elementItems.forEach(element => {
                    const name = element.dataset.name;
                    const author = element.dataset.author;
                    
                    const nameMatch = name.includes(nameFilter);
                    const authorMatch = author.includes(authorFilter);
                    
                    if (nameMatch && authorMatch) {
                        element.classList.remove('hidden');
                        visibleElements.push(element);
                    } else {
                        element.classList.add('hidden');
                    }
                });
                
                // Then sort visible elements
                const parentElement = document.getElementById('elements-list');
                
                // Sort elements based on selected criteria
                visibleElements.sort((a, b) => {
                    switch(sortBy) {
                        case 'newest':
                            return parseInt(b.dataset.date) - parseInt(a.dataset.date);
                        case 'oldest':
                            return parseInt(a.dataset.date) - parseInt(b.dataset.date);
                        case 'name-asc':
                            return a.dataset.name.localeCompare(b.dataset.name);
                        case 'name-desc':
                            return b.dataset.name.localeCompare(a.dataset.name);
                        default:
                            return 0;
                    }
                });
                
                // Reorder elements in the DOM
                visibleElements.forEach(element => {
                    parentElement.appendChild(element);
                });
                
                // Show message if no elements match filters
                const noElementsMessage = document.getElementById('no-elements-message');
                
                if (visibleElements.length === 0) {
                    if (!noElementsMessage) {
                        const message = document.createElement('div');
                        message.id = 'no-elements-message';
                        message.className = 'flex flex-col items-center justify-center py-12 text-center bg-gray-800/30 rounded-xl border border-dashed border-gray-700';
                        message.innerHTML = `
                            <svg class="w-12 h-12 text-gray-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 14l2-2m0 0l2 2m-2-2v4"></path>
                            </svg>
                            <p class="text-gray-400 italic">No elements match your filters.</p>
                            <button id="clear-filters" class="mt-4 text-white hover:text-gray-200 underline transition-colors">Clear filters</button>
                        `;
                        parentElement.appendChild(message);
                        
                        document.getElementById('clear-filters').addEventListener('click', function() {
                            filterName.value = '';
                            filterAuthor.value = '';
                            filterSort.value = 'newest';
                            applyFilters();
                        });
                    }
                } else if (noElementsMessage) {
                    noElementsMessage.remove();
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
    @endpush
</x-app-layout>