<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Dashboard') }}
            </h2>
            @if(Auth::user() && Auth::user()->is_admin)
                <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition ease-in-out duration-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Component
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card with Improved Visual -->
            <div class="bg-gradient-to-br from-black to-gray-900 border border-gray-800 overflow-hidden shadow-md rounded-xl mb-6 transition-all duration-300 hover:shadow-lg hover:border-gray-700">
                <div class="p-8 text-white">
                    <div class="flex items-center space-x-4 mb-5">
                        <div class="p-3 rounded-full bg-gradient-to-br from-gray-800 to-gray-900 border border-gray-700">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold leading-tight">{{ __("Welcome to the Component Library") }}</h3>
                            <p class="text-gray-400 mt-1">Browse our collection of Tailwind components or contribute your own custom elements.</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
                        <div class="bg-black bg-opacity-60 rounded-lg p-4 border border-gray-800 flex items-center transition-all duration-300 hover:border-gray-700">
                            <div class="mr-4 p-2 rounded-md bg-gray-800">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-medium">Components</h4>
                                <p class="text-xs text-gray-400">{{ App\Models\Post::count() }} total</p>
                            </div>
                        </div>
                        <div class="bg-black bg-opacity-60 rounded-lg p-4 border border-gray-800 flex items-center transition-all duration-300 hover:border-gray-700">
                            <div class="mr-4 p-2 rounded-md bg-gray-800">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-medium">Elements</h4>
                                <p class="text-xs text-gray-400">{{ App\Models\Element::where('status', 'approved')->count() }} approved</p>
                            </div>
                        </div>
                        <div class="bg-black bg-opacity-60 rounded-lg p-4 border border-gray-800 flex items-center transition-all duration-300 hover:border-gray-700">
                            <div class="mr-4 p-2 rounded-md bg-gray-800">
                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-medium">Contributors</h4>
                                <p class="text-xs text-gray-400">{{ App\Models\User::count() }} registered users</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Component Library Section -->
            <div class="bg-black border border-gray-800 overflow-hidden shadow-md rounded-xl mb-6 transition-all duration-300 hover:shadow-lg">
                <div class="border-b border-gray-800 p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-white">Component Library</h2>
                        
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-400 text-sm">{{ $posts->total() ?? count($posts) }} components</span>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($posts as $post)
                            <div class="bg-gradient-to-br from-black to-gray-900 rounded-xl border border-gray-800 shadow-md group overflow-hidden transition-all duration-300 hover:scale-[1.02] hover:shadow-xl hover:border-gray-700">
                                @if($post->featured_image)
                                    <div class="h-48 w-full overflow-hidden">
                                        <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                                    </div>
                                @else
                                    <div class="h-48 w-full overflow-hidden bg-gradient-to-br from-gray-900 to-black flex items-center justify-center group-hover:from-gray-800 transition-all duration-500">
                                        <svg class="w-16 h-16 text-gray-800 group-hover:text-gray-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                        </svg>
                                    </div>
                                @endif
                                
                                <div class="p-5">
                                    <div class="mb-3 flex justify-between items-center">
                                        <h5 class="text-lg font-bold text-white group-hover:text-gray-200 transition-colors">{{ $post->title }}</h5>
                                        <span class="bg-gray-900 text-white text-xs font-semibold px-2.5 py-1 rounded-full border border-gray-700">
                                            {{ $post->elements()->where('status', 'approved')->count() }}
                                            <span class="text-gray-400 text-xs">elements</span>
                                        </span>
                                    </div>
                                    
                                    @if($post->excerpt)
                                        <p class="mb-4 text-gray-400 text-sm overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                            {{ $post->excerpt }}
                                        </p>
                                    @endif
                                    
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('blog.show', $post) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-black bg-white rounded-lg border border-transparent hover:bg-gray-200 focus:outline-none transition-all duration-300">
                                            View details
                                            <svg class="w-3.5 h-3.5 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                        
                                        @if(Auth::user() && Auth::user()->is_admin)
                                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-gray-400 hover:text-white transition-colors p-2 rounded-full hover:bg-gray-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                    
                                    @if($post->published_at)
                                        <div class="mt-4 pt-3 border-t border-gray-800 text-xs text-gray-500">
                                            <span class="inline-flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Updated {{ $post->updated_at->format('M j, Y') }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full bg-gradient-to-br from-black to-gray-900 border border-gray-800 rounded-xl p-12 text-center">
                                <div class="p-4 rounded-full bg-gray-900 border border-gray-800 inline-flex mb-6">
                                    <svg class="w-12 h-12 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-white mb-2">No components available yet</h3>
                                <p class="text-gray-400 italic max-w-md mx-auto">The component library is empty. Add your first component to start building your collection.</p>
                                
                                @if(Auth::user() && Auth::user()->is_admin)
                                    <div class="mt-6">
                                        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-5 py-3 bg-white border border-transparent rounded-md font-medium text-sm text-black uppercase tracking-wider hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition-all duration-300">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Create First Component
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforelse
                    </div>
                    
                    @if(isset($posts) && method_exists($posts, 'links'))
                        <div class="mt-8">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- My Contributions Section with Improved Design -->
            @if(Auth::user() && Auth::user()->elements->count() > 0)
                <div class="mt-6 bg-black border border-gray-800 overflow-hidden shadow-md rounded-xl transition-all duration-300 hover:shadow-lg">
                    <div class="border-b border-gray-800 p-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-white">My Contributions</h2>
                            <span class="bg-gray-900 text-gray-300 text-xs font-medium px-2.5 py-1 rounded-full border border-gray-700">
                                {{ Auth::user()->elements->count() }} elements
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="space-y-4" id="contributions-container">
                            @foreach(Auth::user()->elements->sortByDesc('created_at')->take(3) as $element)
                                <div class="bg-gradient-to-r from-black to-gray-900 rounded-lg p-5 border border-gray-800 flex justify-between items-center gap-4 transition-all duration-300 hover:border-gray-700 hover:shadow-md">
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-3 mb-2">
                                            <h3 class="text-white font-medium text-base truncate">{{ $element->name }}</h3>
                                            @if($element->status === 'approved')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200 border border-green-800">
                                                    Approved
                                                </span>
                                            @elseif($element->status === 'pending')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200 border border-yellow-800">
                                                    Pending
                                                </span>
                                            @else
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200 border border-red-800">
                                                    Rejected
                                                </span>
                                            @endif
                                        </div>
                                        <div class="flex items-center text-xs text-gray-400">
                                            <a href="{{ route('blog.show', $element->post->slug) }}" class="text-gray-300 hover:text-white truncate">
                                                {{ $element->post->title }}
                                            </a>
                                            <span class="mx-1">•</span>
                                            <span class="flex items-center whitespace-nowrap">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                {{ $element->created_at->format('M j, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="shrink-0">
                                        <a href="{{ route('blog.show', $element->post->slug) }}#element-{{ $element->id }}" class="inline-flex items-center p-2 text-sm font-medium text-gray-300 hover:text-white bg-gray-900 rounded-lg border border-gray-800 hover:bg-gray-800 focus:outline-none transition-all duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            
                            <div class="hidden space-y-4" id="remaining-contributions">
                                @foreach(Auth::user()->elements->sortByDesc('created_at')->skip(3) as $element)
                                    <div class="bg-gradient-to-r from-black to-gray-900 rounded-lg p-5 border border-gray-800 flex justify-between items-center gap-4 transition-all duration-300 hover:border-gray-700 hover:shadow-md">
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-3 mb-2">
                                                <h3 class="text-white font-medium text-base truncate">{{ $element->name }}</h3>
                                                @if($element->status === 'approved')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200 border border-green-800">
                                                        Approved
                                                    </span>
                                                @elseif($element->status === 'pending')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200 border border-yellow-800">
                                                        Pending
                                                    </span>
                                                @else
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200 border border-red-800">
                                                        Rejected
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="flex items-center text-xs text-gray-400">
                                                <a href="{{ route('blog.show', $element->post->slug) }}" class="text-gray-300 hover:text-white truncate">
                                                    {{ $element->post->title }}
                                                </a>
                                                <span class="mx-1">•</span>
                                                <span class="flex items-center whitespace-nowrap">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    {{ $element->created_at->format('M j, Y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="shrink-0">
                                            <a href="{{ route('blog.show', $element->post->slug) }}#element-{{ $element->id }}" class="inline-flex items-center p-2 text-sm font-medium text-gray-300 hover:text-white bg-gray-900 rounded-lg border border-gray-800 hover:bg-gray-800 focus:outline-none transition-all duration-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            @if(Auth::user()->elements->count() > 3)
                                <div class="text-center pt-6">
                                    <button id="view-all-contributions" class="px-4 py-2 bg-gray-900 text-gray-300 hover:text-white border border-gray-800 rounded-lg hover:bg-gray-800 transition-all duration-300 inline-flex items-center space-x-2 text-sm">
                                        <span>View all my contributions</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <button id="hide-all-contributions" class="px-4 py-2 bg-gray-900 text-gray-300 hover:text-white border border-gray-800 rounded-lg hover:bg-gray-800 transition-all duration-300 hidden inline-flex items-center space-x-2 text-sm">
                                        <span>Show less</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const viewAllBtn = document.getElementById('view-all-contributions');
                        const hideAllBtn = document.getElementById('hide-all-contributions');
                        const remainingContributions = document.getElementById('remaining-contributions');
                        
                        if (viewAllBtn && hideAllBtn && remainingContributions) {
                            viewAllBtn.addEventListener('click', function() {
                                // Show remaining contributions with animation
                                remainingContributions.classList.remove('hidden');
                                remainingContributions.classList.add('animate-fadeIn');
                                
                                // Toggle buttons with animation
                                viewAllBtn.classList.add('animate-fadeOut');
                                setTimeout(() => {
                                    viewAllBtn.classList.add('hidden');
                                    hideAllBtn.classList.remove('hidden');
                                    hideAllBtn.classList.add('animate-fadeIn');
                                }, 200);
                            });
                            
                            hideAllBtn.addEventListener('click', function() {
                                // Hide with animation
                                remainingContributions.classList.add('animate-fadeOut');
                                hideAllBtn.classList.add('animate-fadeOut');
                                
                                setTimeout(() => {
                                    remainingContributions.classList.add('hidden');
                                    remainingContributions.classList.remove('animate-fadeOut');
                                    hideAllBtn.classList.add('hidden');
                                    hideAllBtn.classList.remove('animate-fadeOut');
                                    viewAllBtn.classList.remove('hidden');
                                    
                                    // Fix: Remove previous animation class first to ensure it re-animates
                                    viewAllBtn.classList.remove('animate-fadeOut');
                                    // Give the browser a moment to process the class removal
                                    setTimeout(() => {
                                        viewAllBtn.classList.add('animate-fadeIn');
                                    }, 10);
                                }, 200);
                                
                                // Smooth scroll back to contributions section
                                document.getElementById('contributions-container').scrollIntoView({
                                    behavior: 'smooth'
                                });
                            });
                        }
                    });
                </script>

                <style>
                    @keyframes fadeIn {
                        from { opacity: 0; transform: translateY(10px); }
                        to { opacity: 1; transform: translateY(0); }
                    }
                    
                    @keyframes fadeOut {
                        from { opacity: 1; transform: translateY(0); }
                        to { opacity: 0; transform: translateY(10px); }
                    }
                    
                    .animate-fadeIn {
                        animation: fadeIn 0.3s ease-out forwards;
                    }
                    
                    .animate-fadeOut {
                        animation: fadeOut 0.2s ease-in forwards;
                    }
                </style>
            @endif
        </div>
    </div>
</x-app-layout>