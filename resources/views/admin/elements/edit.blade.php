<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Edit Element') }}
            </h2>
            <a href="{{ route('admin.elements.index') }}" class="px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 transition-colors font-medium">
                Back to Elements
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
            
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl border border-gray-800">
                <div class="p-6 text-white">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Element Details
                        </h3>
                        <div class="flex justify-between items-center bg-gray-800/50 p-4 rounded-lg border border-gray-700">
                            <div>
                                <p class="text-sm text-gray-300">Created by: <span class="text-white">{{ $element->user->name }}</span></p>
                                <p class="text-sm text-gray-300 mt-1">Created on: <span class="text-white">{{ $element->created_at->format('M d, Y') }}</span></p>
                            </div>
                            
                            <div>
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
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.elements.update', $element) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label for="post_id" class="block text-sm font-medium text-gray-300 mb-1 required">Select Component</label>
                            <select name="post_id" id="post_id" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white">
                                <option value="">Select a component...</option>
                                @foreach($posts as $post)
                                    <option value="{{ $post->id }}" {{ (old('post_id', $element->post_id) == $post->id) ? 'selected' : '' }}>
                                        {{ $post->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('post_id')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-1 required">Element Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white" value="{{ old('name', $element->name) }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-400">A short, descriptive name for the component element.</p>
                        </div>
                        
                        <div class="mb-6">
                            <label for="content" class="block text-sm font-medium text-gray-300 mb-1 required">Description</label>
                            <textarea name="content" id="content" rows="3" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white">{{ old('content', $element->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-400">Explain what this element does and how to use it.</p>
                        </div>
                        
                        <div class="mb-6">
                            <label for="code" class="block text-sm font-medium text-gray-300 mb-1 required">HTML/Tailwind Code</label>
                            <div class="relative rounded-lg">
                                <div class="absolute top-0 right-0 px-3 py-2 flex space-x-2">
                                    <button type="button" id="format-code" class="text-xs bg-gray-800 hover:bg-gray-700 text-white py-1 px-3 rounded-lg transition-colors">
                                        Format Code
                                    </button>
                                </div>
                                <textarea name="code" id="code" rows="10" class="font-mono mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white pl-4 pr-4 py-4">{{ old('code', $element->code) }}</textarea>
                            </div>
                            @error('code')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-400">The actual HTML and Tailwind CSS component code.</p>
                        </div>
                        
                        <div class="mb-6">
                            <label for="status" class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white">
                                <option value="pending" {{ (old('status', $element->status) == 'pending') ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ (old('status', $element->status) == 'approved') ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ (old('status', $element->status) == 'rejected') ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <p class="mt-1 text-sm text-gray-400">Changing the status here will override the normal approval workflow.</p>
                        </div>
                        
                        <div class="flex justify-between items-center mt-10 pt-6 border-t border-gray-800">
                            <div class="text-sm text-gray-400">
                                <span class="text-red-500">*</span> Required fields
                            </div>
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.elements.review', $element) }}" class="px-4 py-2 border border-gray-700 text-gray-300 rounded-md hover:bg-gray-800 transition-colors">
                                    Preview
                                </a>
                                <button type="submit" class="px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 transition-colors">
                                    Update Element
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const codeEditor = document.getElementById('code');
        const formatButton = document.getElementById('format-code');
        
        // Add tab support
        codeEditor.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                e.preventDefault();
                
                // Get cursor position
                const start = this.selectionStart;
                const end = this.selectionEnd;
                
                // Insert tab at cursor position
                this.value = this.value.substring(0, start) + '    ' + this.value.substring(end);
                
                // Set cursor position after tab
                this.selectionStart = this.selectionEnd = start + 4;
            }
        });
        
        // Format HTML code
        formatButton.addEventListener('click', function() {
            try {
                // Simple HTML formatter
                const formatHTML = function(html) {
                    let formatted = '';
                    let indent = '';
                    
                    // Split on tags
                    html.trim().replace(/>\s*</g, '>\n<').split('\n').forEach(function(line) {
                        if (line.match(/^<\/\w/)) {
                            // If this line is closing tag, reduce indent first
                            indent = indent.substring(2);
                        }
                        
                        // Add line with indent
                        formatted += indent + line + '\n';
                        
                        // If this line is opening tag (and not self-closing), increase indent
                        if (line.match(/^<\w[^>]*[^\/]>$/)) {
                            indent += '  ';
                        }
                    });
                    
                    return formatted.trim();
                };
                
                codeEditor.value = formatHTML(codeEditor.value);
            } catch (e) {
                console.error('Error formatting HTML:', e);
                // If error, leave as is
            }
        });
        
        // Auto resize the textarea based on content
        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }
        
        // Initialize auto resize
        autoResize(codeEditor);
        codeEditor.addEventListener('input', function() {
            autoResize(this);
        });
    </script>
    @endpush
</x-app-layout>