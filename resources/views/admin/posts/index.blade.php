<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Manage Components') }}
            </h2>
            <a href="{{ route('admin.posts.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition-all duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Create Component
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 bg-gradient-to-r from-green-900 to-green-800 p-4 rounded-xl text-green-200 border border-green-700 shadow-lg flex items-center">
                    <svg class="w-5 h-5 mr-3 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            
            <div class="bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800 transition-all duration-300 hover:shadow-xl">
                <div class="p-6 border-b border-gray-800">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            Components List
                        </h3>
                        <span class="text-gray-400 text-sm">{{ $posts->total() }} total</span>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-800">
                        <thead class="bg-gray-900 bg-opacity-40">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Component</th>
                                <th scope="col" class="px-6 py-3.5 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3.5 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Elements</th>
                                <th scope="col" class="px-6 py-3.5 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3.5 text-right text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800 bg-black bg-opacity-20">
                            @forelse ($posts as $post)
                                <tr class="hover:bg-gray-900 hover:bg-opacity-30 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if ($post->featured_image)
                                                <div class="flex-shrink-0 h-10 w-10 mr-3">
                                                    <img class="h-10 w-10 rounded-md object-cover border border-gray-800" 
                                                         src="{{ $post->featured_image }}" 
                                                         alt="{{ $post->title }}">
                                                </div>
                                            @else
                                                <div class="flex-shrink-0 h-10 w-10 rounded-md bg-gray-900 flex items-center justify-center mr-3 border border-gray-800">
                                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="text-sm font-medium text-white">
                                                    {{ $post->title }}
                                                </div>
                                                @if($post->slug)
                                                    <div class="text-xs text-gray-500 mt-1">
                                                        {{ $post->slug }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($post->published_at)
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200 border border-green-800">
                                                Published
                                            </span>
                                        @else
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-900 text-gray-300 border border-gray-800">
                                                Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="bg-blue-900 text-blue-200 text-xs font-semibold px-2.5 py-1 rounded-full border border-blue-800">
                                                {{ $post->elements()->count() }}
                                            </span>
                                            <span class="text-xs text-gray-500 ml-2">elements</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        <div class="flex flex-col">
                                            <span title="Created at">{{ $post->created_at->format('M d, Y') }}</span>
                                            @if ($post->published_at)
                                                <span class="text-xs text-gray-500 mt-1" title="Published at">
                                                    Published: {{ $post->published_at->format('M d, Y') }}
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                        <a href="{{ route('blog.show', $post) }}" 
                                           class="inline-flex items-center px-2.5 py-1.5 bg-gray-900 border border-gray-700 rounded text-xs text-gray-300 hover:text-white hover:border-gray-600 transition-colors">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            View
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post) }}" 
                                           class="inline-flex items-center px-2.5 py-1.5 bg-gray-900 border border-gray-700 rounded text-xs text-gray-300 hover:text-white hover:border-gray-600 transition-colors">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Are you sure you want to delete this component? All associated elements will also be removed.')" 
                                                    class="inline-flex items-center px-2.5 py-1.5 bg-gray-900 border border-red-500 rounded text-xs text-red-300 hover:text-red-600 hover:border-red-600 transition-colors">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-800 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                            </svg>
                                            <p class="text-gray-500 font-medium">No components found</p>
                                            <a href="{{ route('admin.posts.create') }}" class="mt-4 px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 inline-flex items-center text-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Create your first component
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(isset($posts) && method_exists($posts, 'links') && $posts->total() > 0)
                    <div class="p-6 border-t border-gray-800">
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>