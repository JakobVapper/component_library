<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Manage Elements') }}
            </h2>
            <a href="{{ route('admin.elements.create') }}" class="px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 transition-colors font-medium">
                Create Element
            </a>
        </div>
    </x-slot>

    @if(View::exists('components.admin-nav'))
        <x-admin-nav />
    @endif

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 bg-green-900/50 border-l-4 border-green-500 p-4 rounded-lg text-white">
                    <div class="flex">
                        <svg class="h-5 w-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            
            <!-- Filter and organization controls -->
            <div class="mb-6 bg-gray-900 p-5 rounded-xl shadow-sm border border-gray-800">
                <h3 class="text-white text-lg font-medium mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filter Elements
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="filter-status" class="block text-sm font-medium text-gray-300 mb-1">Filter by Status</label>
                        <select id="filter-status" class="block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            <option value="all">All Statuses</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div>
                        <label for="filter-post" class="block text-sm font-medium text-gray-300 mb-1">Filter by Component</label>
                        <select id="filter-post" class="block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            <option value="all">All Components</option>
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="sort-by" class="block text-sm font-medium text-gray-300 mb-1">Sort By</label>
                        <select id="sort-by" class="block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            <option value="date-desc">Newest First</option>
                            <option value="date-asc">Oldest First</option>
                            <option value="name-asc">Element Name (A-Z)</option>
                            <option value="name-desc">Element Name (Z-A)</option>
                            <option value="post-asc">Component Type (A-Z)</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Elements grouping tabs -->
            <div class="mb-4 border-b border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="mr-2">
                        <a href="#" data-group="all" class="group-tab inline-block p-4 border-b-2 rounded-t-lg active border-white text-white">All Elements</a>
                    </li>
                    <li class="mr-2">
                        <a href="#" data-group="pending" class="group-tab inline-block p-4 border-b-2 border-transparent rounded-t-lg text-gray-400 hover:text-white hover:border-gray-500">Pending 
                            <span class="bg-yellow-900 text-yellow-200 text-xs font-medium rounded-full px-2.5 py-0.5 ml-1">{{ $pendingCount }}</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" data-group="approved" class="group-tab inline-block p-4 border-b-2 border-transparent rounded-t-lg text-gray-400 hover:text-white hover:border-gray-500">Approved</a>
                    </li>
                    <li>
                        <a href="#" data-group="rejected" class="group-tab inline-block p-4 border-b-2 border-transparent rounded-t-lg text-gray-400 hover:text-white hover:border-gray-500">Rejected</a>
                    </li>
                </ul>
            </div>
            
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl border border-gray-800">
                <div class="p-6 text-white">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Component</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Created By</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-900 divide-y divide-gray-800" id="elements-table-body">
                                @forelse ($elements as $element)
                                    <tr class="element-row hover:bg-gray-800/50 transition-colors" 
                                        data-status="{{ $element->status }}" 
                                        data-post-id="{{ $element->post_id }}"
                                        data-name="{{ strtolower($element->name) }}"
                                        data-date="{{ $element->created_at->timestamp }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $element->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('blog.show', $element->post->slug) }}" class="text-blue-400 hover:text-blue-300 transition-colors">
                                                {{ $element->post->title }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $element->user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($element->status === 'pending')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200">
                                                    Pending
                                                </span>
                                            @elseif($element->status === 'approved')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200">
                                                    Approved
                                                </span>
                                            @else
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200">
                                                    Rejected
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $element->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            @if($element->status === 'pending')
                                                <a href="{{ route('admin.elements.review', $element) }}" class="text-blue-400 hover:text-blue-300 transition-colors mr-2">Review</a>
                                                <form action="{{ route('admin.elements.approve', $element) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-green-400 hover:text-green-300 transition-colors mr-2">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.elements.reject', $element) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-red-400 hover:text-red-300 transition-colors mr-2">Reject</button>
                                                </form>
                                            @else
                                                <a href="{{ route('admin.elements.review', $element) }}" class="text-blue-400 hover:text-blue-300 transition-colors mr-2">View</a>
                                            @endif
                                            <a href="{{ route('admin.elements.edit', $element) }}" class="text-gray-300 hover:text-white transition-colors mr-2">Edit</a>
                                            <form action="{{ route('admin.elements.destroy', $element) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" onclick="return confirm('Are you sure you want to delete this element?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                                </svg>
                                                <p class="italic">No elements found</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div id="no-results" class="px-6 py-10 text-center text-gray-400 hidden">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-12 h-12 text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            <p class="italic">No elements match the selected filters</p>
                            <button id="clear-all-filters" class="mt-4 text-white hover:text-gray-200 underline transition-colors">Clear all filters</button>
                        </div>
                    </div>
                    @if(isset($elements) && method_exists($elements, 'links'))
                        <div class="mt-6">
                            {{ $elements->links() }}
                        </div>
                    @endif
                </div>
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