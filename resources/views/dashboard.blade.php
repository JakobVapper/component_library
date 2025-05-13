<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black border border-gray-800 overflow-hidden shadow-sm sm:rounded-xl mb-6">
                <div class="p-6 text-white">
                    <div class="flex items-center space-x-3 mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                        <h3 class="text-xl font-bold">{{ __("Welcome to the Component Library") }}</h3>
                    </div>
                    <p class="text-gray-400">Browse our collection of Tailwind components or contribute your own custom elements.</p>
                </div>
            </div>

            <div class="bg-black border border-gray-800 overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-xl font-semibold text-white">Component Library</h2>
                        
                        @if(Auth::user() && Auth::user()->is_admin)
                            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Component
                            </a>
                        @endif
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($posts as $post)
                            <div class="bg-black rounded-xl border border-gray-800 shadow-md hover:shadow-lg transition-shadow group overflow-hidden">
                                @if($post->featured_image)
                                    <div class="h-48 w-full overflow-hidden bg-black">
                                        <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-200" src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                                    </div>
                                @else
                                    <div class="h-48 w-full overflow-hidden bg-gradient-to-br from-black to-gray-900 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                        </svg>
                                    </div>
                                @endif
                                
                                <div class="p-5">
                                    <div class="mb-3 flex justify-between items-center">
                                        <h5 class="text-lg font-bold text-white">{{ $post->title }}</h5>
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
                                        <a href="{{ route('blog.show', $post) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-black bg-white rounded-lg border border-transparent hover:bg-gray-200 focus:outline-none transition duration-150 ease-in-out">
                                            View details
                                            <svg class="w-3.5 h-3.5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                        
                                        @if(Auth::user() && Auth::user()->is_admin)
                                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-gray-400 hover:text-white transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                    
                                    @if($post->published_at)
                                        <div class="mt-4 pt-3 border-t border-gray-800 text-xs text-gray-500">
                                            Updated {{ $post->updated_at->format('M j, Y') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full bg-black border border-gray-800 rounded-xl p-10 text-center">
                                <svg class="w-12 h-12 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                                <p class="text-gray-400 italic">No components available yet.</p>
                                
                                @if(Auth::user() && Auth::user()->is_admin)
                                    <div class="mt-4">
                                        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition duration-150 ease-in-out">
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
            
            @if(Auth::user() && Auth::user()->elements->count() > 0)
                <div class="mt-6 bg-black border border-gray-800 overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-white mb-4">My Contributions</h2>
                        
                        <div class="space-y-4">
                            @foreach(Auth::user()->elements->sortByDesc('created_at')->take(3) as $element)
                                <div class="bg-black rounded-lg p-4 border border-gray-800 flex justify-between items-center">
                                    <div>
                                        <h3 class="text-white font-medium">{{ $element->name }}</h3>
                                        <p class="text-xs text-gray-400 mt-1">
                                            <a href="{{ route('blog.show', $element->post->slug) }}" class="text-gray-300 hover:text-white">
                                                {{ $element->post->title }}
                                            </a>
                                            <span class="mx-1">•</span>
                                            <span>{{ $element->created_at->format('M j, Y') }}</span>
                                        </p>
                                    </div>
                                    <div>
                                        @if($element->status === 'approved')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200">
                                                Approved
                                            </span>
                                        @elseif($element->status === 'pending')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200">
                                                Pending
                                            </span>
                                        @else
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200">
                                                Rejected
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            
                            <div class="text-center pt-4">
                                <a href="{{ route('profile.edit') }}" class="text-gray-300 hover:text-white text-sm underline">
                                    View all my contributions
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>