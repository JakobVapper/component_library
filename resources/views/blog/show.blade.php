<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl mb-6 border border-gray-800">
                <div class="p-8">
                    <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white mb-8 inline-flex items-center group transition-all duration-200">
                        <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Dashboard
                    </a>
                    
                    <div class="mt-8">
                        @if($post->featured_image)
                            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-80 object-cover rounded-xl mb-8 shadow-lg">
                        @endif
                        
                        <div class="prose max-w-none text-white">
                            <h1 class="text-4xl font-bold mb-6 text-white">{{ $post->title }}</h1>
                            
                            @if($post->published_at)
                                <p class="text-gray-400 mb-6 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $post->published_at->format('F j, Y') }}
                                </p>
                            @endif
                            
                            @if($post->excerpt)
                                <div class="bg-gray-800/50 p-6 rounded-xl mb-8 border-l-4 border-white">
                                    <p class="italic text-gray-300">{{ $post->excerpt }}</p>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Elements Section -->
                        <div class="mt-16 pt-10 border-t border-gray-800">
                            <div class="flex justify-between items-center mb-8">
                                <h3 class="text-2xl font-semibold text-white flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                    </svg>
                                    Component Elements
                                </h3>
                                @auth
                                    <a href="{{ route('elements.create', ['post' => $post->slug]) }}" 
                                       class="group inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-sm text-black uppercase tracking-wider hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900 transition-all duration-200">
                                        <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Add New Element
                                    </a>
                                @endauth
                            </div>
                            
                            <!-- Filter Section -->
                            <div class="mb-8 backdrop-blur-sm bg-gray-800/30 p-4 rounded-xl border border-gray-700">
                                <div class="flex flex-wrap items-center gap-3">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="filter-name" class="pl-10 py-2 text-sm bg-gray-900 border-gray-700 rounded-lg focus:ring-white focus:border-white text-white" placeholder="Filter by name">
                                    </div>

                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="filter-author" class="pl-10 py-2 text-sm bg-gray-900 border-gray-700 rounded-lg focus:ring-white focus:border-white text-white" placeholder="Filter by author">
                                    </div>

                                    <select id="filter-sort" class="text-sm bg-gray-900 border-gray-700 rounded-lg focus:ring-white focus:border-white text-white">
                                        <option value="newest">Newest First</option>
                                        <option value="oldest">Oldest First</option>
                                        <option value="name-asc">Name (A-Z)</option>
                                        <option value="name-desc">Name (Z-A)</option>
                                    </select>

                                    <button id="reset-filters" class="text-xs text-gray-300 hover:text-white flex items-center transition-colors">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        Reset
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Elements List -->
                            <div class="space-y-8" id="elements-list">
                                @forelse($post->elements()->where('status', 'approved')->get() as $element)
                                    <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-xl shadow-md element-item border border-gray-700 hover:border-gray-600 transition-all duration-300"
                                        id="element-{{ $element->id }}"
                                        data-name="{{ strtolower($element->name) }}"
                                        data-author="{{ strtolower($element->user->name) }}"
                                        data-date="{{ $element->created_at->timestamp }}">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-medium text-xl text-white">{{ $element->name }}</h4>
                                                <p class="text-sm text-gray-400 mt-1">
                                                    Added by <span class="text-gray-300">{{ $element->user->name }}</span> on <span class="text-gray-300">{{ $element->created_at->format('M j, Y') }}</span>
                                                </p>
                                            </div>
                                            
                                            @auth
                                                @if(auth()->id() === $element->user_id || auth()->user()->is_admin)
                                                    <div class="flex space-x-3">
                                                        <a href="{{ route('elements.edit', $element) }}" class="text-gray-400 hover:text-white transition-colors">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                        </a>
                                                        <form method="POST" action="{{ route('elements.destroy', $element) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this element?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-gray-400 hover:text-white transition-colors">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                        
                                        <div class="mt-6">
                                            <div class="element-description mb-6 text-gray-300 leading-relaxed">{{ $element->content }}</div>
                                            
                                            <div class="bg-gray-900/70 p-6 rounded-xl mb-6 border border-gray-700">
                                                <h5 class="text-sm font-medium mb-3 text-white flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    Preview
                                                </h5>
                                                <div class="p-4 bg-white rounded-lg">
                                                    <iframe src="{{ route('elements.preview', $element) }}" class="w-full" id="preview-frame-{{ $element->id }}" onload="resizeIframe(this)" style="border: none;"></iframe>
                                                </div>
                                            </div>
                                            
                                            <div class="bg-gray-900/70 p-6 rounded-xl border border-gray-700">
                                                <div class="flex justify-between items-center mb-3">
                                                    <button 
                                                        onclick="toggleCode('code-container-{{ $element->id }}')" 
                                                        class="text-xs bg-gray-800 hover:bg-gray-700 text-white py-2 px-4 rounded-lg flex items-center transition-colors"
                                                    >
                                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                                        </svg>
                                                        <span id="toggle-text-{{ $element->id }}">Show code</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="toggle-icon-{{ $element->id }}">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                        </svg>
                                                    </button>
                                                    <button 
                                                        onclick="copyElementCode(this, '{{ $element->id }}')" 
                                                        class="text-xs bg-white hover:bg-gray-200 text-black py-2 px-4 rounded-lg flex items-center transition-colors"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                        </svg>
                                                        Copy Code
                                                    </button>
                                                </div>
                                                <div id="code-container-{{ $element->id }}" class="hidden">
                                                    <pre class="bg-gray-950 text-gray-100 rounded-lg overflow-x-auto p-4 text-sm border border-gray-800"><code id="element-code-{{ $element->id }}" data-code="{{ htmlspecialchars($element->code) }}" class="language-html"></code></pre>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="flex flex-col items-center justify-center py-12 text-center bg-gray-800/30 rounded-xl border border-dashed border-gray-700">
                                        <svg class="w-16 h-16 text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                        </svg>
                                        <p class="text-gray-400 italic">No approved elements available yet.</p>
                                        @auth
                                            <a href="{{ route('elements.create', ['post' => $post->slug]) }}" class="mt-4 text-white hover:text-gray-200 underline transition-colors">
                                                Be the first to add one
                                            </a>
                                        @endauth
                                    </div>
                                @endforelse
                                
                                @auth
                                    <div class="user-elements-status mt-10">
                                        @if(auth()->user()->elements()->where('post_id', $post->id)->where('status', 'pending')->count() > 0)
                                            <div class="mt-6 bg-gray-800/50 border-l-4 border-yellow-500 p-4 rounded-lg">
                                                <p class="text-white flex items-start">
                                                    <svg class="inline-block w-5 h-5 mr-2 flex-shrink-0 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                                    </svg>
                                                    You have <span class="font-semibold">{{ auth()->user()->elements()->where('post_id', $post->id)->where('status', 'pending')->count() }}</span> 
                                                    pending element(s) awaiting admin approval.
                                                </p>
                                            </div>
                                        @endif
                                        
                                        @if(auth()->user()->elements()->where('post_id', $post->id)->where('status', 'rejected')->count() > 0)
                                            <div class="mt-3 bg-gray-800/50 border-l-4 border-red-500 p-4 rounded-lg">
                                                <p class="text-white flex items-start">
                                                    <svg class="inline-block w-5 h-5 mr-2 flex-shrink-0 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                                    </svg>
                                                    You have <span class="font-semibold">{{ auth()->user()->elements()->where('post_id', $post->id)->where('status', 'rejected')->count() }}</span> 
                                                    rejected element(s). Please review and resubmit your elements.
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                @endauth
                            </div>
                            
                            @guest
                                <div class="mt-8 flex items-center justify-center p-8 bg-gray-800/30 rounded-xl border border-dashed border-gray-700">
                                    <div class="text-center">
                                        <svg class="w-12 h-12 text-gray-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                        <p class="text-gray-400">Please <a href="{{ route('login') }}" class="text-white hover:text-gray-200 underline transition-colors">log in</a> to add elements.</p>
                                    </div>
                                </div>
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
            // Add a small delay to ensure content is fully loaded
            setTimeout(() => {
                iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
            }, 100);
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
            } else {
                container.classList.add('hidden');
                toggleText.textContent = 'Show code';
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
    @endpush
</x-app-layout>