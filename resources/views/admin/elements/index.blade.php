<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Manage Elements') }}
            </h2>
            <a href="{{ route('admin.elements.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition-all duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add Element
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Elements List
                        </h3>
                        <div class="flex space-x-3">
                            <span class="text-sm text-gray-400">Filter:</span>
                            <a href="{{ route('admin.elements.index') }}" class="text-sm px-2 py-1 rounded-full {{ !request('status') ? 'bg-gray-800 text-white border border-gray-700' : 'text-gray-400 hover:text-white' }}">All</a>
                            <a href="{{ route('admin.elements.index', ['status' => 'pending']) }}" class="text-sm px-2 py-1 rounded-full {{ request('status') == 'pending' ? 'bg-yellow-900 text-yellow-200 border border-yellow-800' : 'text-gray-400 hover:text-white' }}">Pending</a>
                            <a href="{{ route('admin.elements.index', ['status' => 'approved']) }}" class="text-sm px-2 py-1 rounded-full {{ request('status') == 'approved' ? 'bg-green-900 text-green-200 border border-green-800' : 'text-gray-400 hover:text-white' }}">Approved</a>
                            <a href="{{ route('admin.elements.index', ['status' => 'rejected']) }}" class="text-sm px-2 py-1 rounded-full {{ request('status') == 'rejected' ? 'bg-red-900 text-red-200 border border-red-800' : 'text-gray-400 hover:text-white' }}">Rejected</a>
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-800">
                        <thead class="bg-gray-900 bg-opacity-40">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Element</th>
                                <th scope="col" class="px-6 py-3.5 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Component</th>
                                <th scope="col" class="px-6 py-3.5 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Created By</th>
                                <th scope="col" class="px-6 py-3.5 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3.5 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3.5 text-right text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800 bg-black bg-opacity-20">
                            @forelse ($elements as $element)
                                <tr class="hover:bg-gray-900 hover:bg-opacity-30 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-white">{{ $element->name }}</div>
                                        <div class="text-xs text-gray-500 mt-1 truncate max-w-xs">{{ Str::limit($element->content, 40) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('blog.show', $element->post->slug) }}" class="text-gray-300 hover:text-white flex items-center">
                                            <svg class="w-3.5 h-3.5 mr-1.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $element->post->title }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-7 w-7 rounded-full bg-gray-800 border border-gray-700 flex items-center justify-center text-gray-300 mr-2">
                                                {{ substr($element->user->name, 0, 1) }}
                                            </div>
                                            <span class="text-gray-300">{{ $element->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($element->status === 'pending')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200 border border-yellow-800">
                                                Pending
                                            </span>
                                        @elseif($element->status === 'approved')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200 border border-green-800">
                                                Approved
                                            </span>
                                        @else
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200 border border-red-800">
                                                Rejected
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        <div class="flex flex-col">
                                            <span title="Created">{{ $element->created_at->format('M d, Y') }}</span>
                                            <span class="text-xs text-gray-500 mt-1" title="Last Updated">
                                                {{ $element->updated_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                        @if($element->status === 'pending')
                                            <a href="{{ route('admin.elements.review', $element) }}" 
                                               class="inline-flex items-center px-2.5 py-1.5 bg-blue-900 border border-blue-700 rounded text-xs text-blue-200 hover:bg-blue-800 transition-colors">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Review
                                            </a>
                                            <form action="{{ route('admin.elements.approve', $element) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-2.5 py-1.5 bg-green-900 border border-green-700 rounded text-xs text-green-200 hover:bg-green-800 transition-colors">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.elements.reject', $element) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-2.5 py-1.5 bg-red-900 border border-red-700 rounded text-xs text-red-200 hover:bg-red-800 transition-colors">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    Reject
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('admin.elements.review', $element) }}" 
                                               class="inline-flex items-center px-2.5 py-1.5 bg-gray-900 border border-gray-700 rounded text-xs text-gray-300 hover:text-white hover:border-gray-600 transition-colors">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                View
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.elements.edit', $element) }}" 
                                           class="inline-flex items-center px-2.5 py-1.5 bg-gray-900 border border-gray-700 rounded text-xs text-gray-300 hover:text-white hover:border-gray-600 transition-colors">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.elements.destroy', $element) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Are you sure you want to delete this element?')" 
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
                                    <td colspan="6" class="px-6 py-10 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-800 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                            </svg>
                                            <p class="text-gray-500 font-medium">No elements found</p>
                                            <a href="{{ route('admin.elements.create') }}" class="mt-4 px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 inline-flex items-center text-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Create your first element
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(isset($elements) && method_exists($elements, 'links') && $elements->total() > 0)
                    <div class="p-6 border-t border-gray-800">
                        {{ $elements->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterStatus = document.getElementById('filter-status');
            const filterPost = document.getElementById('filter-post');
            const sortBy = document.getElementById('sort-by');
            const elementRows = document.querySelectorAll('.element-row');
            const tableBody = document.getElementById('elements-table-body');
            const noResults = document.getElementById('no-results');
            const groupTabs = document.querySelectorAll('.group-tab');
            const clearAllFiltersBtn = document.getElementById('clear-all-filters');
            
            let currentGroup = 'all';
            
            // Initialize filters
            filterStatus.addEventListener('change', applyFilters);
            filterPost.addEventListener('change', applyFilters);
            sortBy.addEventListener('change', applyFilters);
            
            // Clear all filters
            clearAllFiltersBtn.addEventListener('click', function() {
                filterStatus.value = 'all';
                filterPost.value = 'all';
                sortBy.value = 'date-desc';
                
                // Reset tabs
                groupTabs.forEach(t => {
                    t.classList.remove('border-white', 'text-white', 'active');
                    t.classList.add('border-transparent', 'text-gray-400');
                });
                
                // Set first tab as active
                groupTabs[0].classList.remove('border-transparent', 'text-gray-400');
                groupTabs[0].classList.add('border-white', 'text-white', 'active');
                
                currentGroup = 'all';
                
                applyFilters();
            });
            
            // Initialize group tabs
            groupTabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Update active tab
                    groupTabs.forEach(t => {
                        t.classList.remove('border-white', 'text-white', 'active');
                        t.classList.add('border-transparent', 'text-gray-400');
                    });
                    
                    this.classList.remove('border-transparent', 'text-gray-400');
                    this.classList.add('border-white', 'text-white', 'active');
                    
                    // Update current group
                    currentGroup = this.dataset.group;
                    
                    // Update filter if needed
                    if (currentGroup !== 'all') {
                        filterStatus.value = currentGroup;
                    } else {
                        filterStatus.value = 'all';
                    }
                    
                    applyFilters();
                });
            });
            
            function applyFilters() {
                const statusFilter = filterStatus.value;
                const postFilter = filterPost.value;
                const sort = sortBy.value;
                
                // Filter elements
                let visibleElements = [];
                
                elementRows.forEach(row => {
                    const status = row.dataset.status;
                    const postId = row.dataset.postId;
                    
                    const statusMatch = statusFilter === 'all' || status === statusFilter;
                    const postMatch = postFilter === 'all' || postId === postFilter;
                    
                    if (statusMatch && postMatch) {
                        row.classList.remove('hidden');
                        visibleElements.push(row);
                    } else {
                        row.classList.add('hidden');
                    }
                });
                
                // Sort elements
                visibleElements.sort((a, b) => {
                    switch(sort) {
                        case 'date-desc':
                            return parseInt(b.dataset.date) - parseInt(a.dataset.date);
                        case 'date-asc':
                            return parseInt(a.dataset.date) - parseInt(b.dataset.date);
                        case 'name-asc':
                            return a.dataset.name.localeCompare(b.dataset.name);
                        case 'name-desc':
                            return b.dataset.name.localeCompare(a.dataset.name);
                        case 'post-asc':
                            return a.querySelector('td:nth-child(2)').textContent.trim()
                                .localeCompare(b.querySelector('td:nth-child(2)').textContent.trim());
                        default:
                            return 0;
                    }
                });
                
                // Reorder elements in the DOM
                visibleElements.forEach(element => {
                    tableBody.appendChild(element);
                });
                
                // Show/hide no results message
                if (visibleElements.length === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }
            
            // Initial filter application
            applyFilters();
        });
    </script>
    @endpush
</x-app-layout>