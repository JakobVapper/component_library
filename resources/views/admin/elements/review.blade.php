<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Review Element') }}
            </h2>
            <a href="{{ route('admin.elements.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-gray-700 rounded-md font-medium text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none transition-all duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                </svg>
                Back to Elements
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Element Details -->
                <div class="lg:col-span-2">
                    <div class="bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800 transition-all duration-300 hover:shadow-xl">
                        <div class="p-6 border-b border-gray-800">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-white">{{ $element->name }}</h3>
                                    <p class="text-sm text-gray-400 mt-1.5 flex items-center space-x-3">
                                        <span class="flex items-center">
                                            <svg class="w-3.5 h-3.5 mr-1.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                            </svg>
                                            <a href="{{ route('blog.show', $element->post->slug) }}" class="text-gray-300 hover:text-white">
                                                {{ $element->post->title }}
                                            </a>
                                        </span>
                                        <span class="text-gray-600">•</span>
                                        <span class="flex items-center">
                                            <svg class="w-3.5 h-3.5 mr-1.5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            {{ $element->user->name }}
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    @if($element->status === 'pending')
                                        <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200 border border-yellow-800">
                                            Pending Review
                                        </span>
                                    @elseif($element->status === 'approved')
                                        <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200 border border-green-800">
                                            Approved
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200 border border-red-800">
                                            Rejected
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6 space-y-8">
                            <!-- Description -->
                            <div>
                                <h4 class="text-lg font-medium text-white mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                    Description
                                </h4>
                                <div class="bg-black bg-opacity-40 rounded-lg p-4 border border-gray-800">
                                    <p class="text-gray-300">{{ $element->content }}</p>
                                </div>
                            </div>

                            <!-- Element Preview -->
                            <div>
                                <h4 class="text-lg font-medium text-white mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Preview
                                </h4>
                                <div class="rounded-lg overflow-hidden">
                                    <div class="bg-white p-6">
                                        <iframe src="{{ route('elements.preview', $element) }}" class="w-full rounded-lg" id="preview-frame" style="height: 300px; border: none;"></iframe>
                                    </div>
                                </div>
                            </div>

                            <!-- Code Display -->
                            <div>
                                <h4 class="text-lg font-medium text-white mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                    HTML/Tailwind Code
                                </h4>
                                <div class="rounded-lg overflow-hidden">
                                    <div class="flex justify-between items-center bg-gray-900 px-4 py-2 border-t border-l border-r border-gray-800 rounded-t-lg">
                                        <span class="text-gray-400 text-xs">Source Code</span>
                                        <button type="button" onclick="copyCode()" class="text-xs bg-gray-800 text-white px-2 py-1 rounded hover:bg-gray-700 transition-colors flex items-center">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                                            </svg>
                                            Copy
                                        </button>
                                    </div>
                                    <div class="bg-black border border-gray-800 rounded-b-lg">
                                        <pre id="element-code" class="language-html text-gray-300 p-4 overflow-x-auto text-sm font-mono">{{ $element->code }}</pre>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Admin Actions -->
                            <div class="pt-4 border-t border-gray-800 flex justify-between items-center">
                                <div class="flex space-x-3">
                                    <a href="{{ route('admin.elements.edit', $element) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-gray-700 rounded-md font-medium text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit Element
                                    </a>
                                    <a href="{{ route('blog.show', $element->post->slug) }}#element-{{ $element->id }}" 
                                       target="_blank" 
                                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-gray-700 text-white rounded-md hover:bg-gray-700">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                        View in Context
                                    </a>
                                </div>
                                
                                @if($element->status === 'pending')
                                    <div class="flex space-x-3">
                                        <form action="{{ route('admin.elements.reject', $element) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    onclick="return confirm('Are you sure you want to reject this element?')" 
                                                    class="inline-flex items-center px-4 py-2 bg-red-900 border border-red-800 rounded-md font-medium text-xs text-white uppercase tracking-widest hover:bg-red-800 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Reject
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.elements.approve', $element) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-4 py-2 bg-green-900 border border-green-800 rounded-md font-medium text-xs text-white uppercase tracking-widest hover:bg-green-800 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Approve
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Element Info & Details Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-6 space-y-6">
                        <!-- Element Meta Info -->
                        <div class="bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800 transition-all duration-300 hover:shadow-xl">
                            <div class="p-4 border-b border-gray-800">
                                <h3 class="font-medium text-white flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Element Information
                                </h3>
                            </div>
                            
                            <div class="p-4">
                                <dl class="space-y-4 text-sm">
                                    <div class="grid grid-cols-3 gap-4">
                                        <dt class="text-gray-500">Creator</dt>
                                        <dd class="text-white col-span-2 flex items-center">
                                            <div class="h-6 w-6 rounded-full bg-gray-800 border border-gray-700 flex items-center justify-center text-gray-400 mr-2 text-xs">
                                                {{ substr($element->user->name, 0, 1) }}
                                            </div>
                                            {{ $element->user->name }}
                                        </dd>
                                    </div>
                                    
                                    <div class="grid grid-cols-3 gap-4">
                                        <dt class="text-gray-500">Created</dt>
                                        <dd class="text-white col-span-2">{{ $element->created_at->format('M j, Y, g:i A') }}</dd>
                                    </div>
                                    
                                    <div class="grid grid-cols-3 gap-4">
                                        <dt class="text-gray-500">Updated</dt>
                                        <dd class="text-white col-span-2">{{ $element->updated_at->format('M j, Y, g:i A') }}</dd>
                                    </div>
                                    
                                    <div class="grid grid-cols-3 gap-4">
                                        <dt class="text-gray-500">Status</dt>
                                        <dd class="col-span-2">
                                            @if($element->status === 'approved')
                                                <span class="bg-green-900 text-green-200 px-2.5 py-1 rounded-full text-xs border border-green-800">
                                                    Approved
                                                </span>
                                            @elseif($element->status === 'pending')
                                                <span class="bg-yellow-900 text-yellow-200 px-2.5 py-1 rounded-full text-xs border border-yellow-800">
                                                    Pending Review
                                                </span>
                                            @else
                                                <span class="bg-red-900 text-red-200 px-2.5 py-1 rounded-full text-xs border border-red-800">
                                                    Rejected
                                                </span>
                                            @endif
                                        </dd>
                                    </div>
                                    
                                    <div class="grid grid-cols-3 gap-4">
                                        <dt class="text-gray-500">Component</dt>
                                        <dd class="text-white col-span-2">
                                            <a href="{{ route('blog.show', $element->post->slug) }}" class="text-blue-400 hover:text-blue-300">
                                                {{ $element->post->title }}
                                            </a>
                                        </dd>
                                    </div>
                                </dl>
                                
                                <!-- Delete Button -->
                                <form action="{{ route('admin.elements.destroy', $element) }}" method="POST" class="mt-6">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this element? This action cannot be undone.')" 
                                            class="w-full inline-flex justify-center items-center px-4 py-2 bg-red-900 border border-red-800 rounded-md font-medium text-xs text-red-200 uppercase tracking-widest hover:bg-red-800 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete Element
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        // Auto-resize iframe for preview
        document.addEventListener('DOMContentLoaded', function() {
            const iframe = document.getElementById('preview-frame');
            
            // Set minimum height
            iframe.style.height = '200px';
            
            // Add event listener for height messages from iframe content
            window.addEventListener('message', function(event) {
                if (event.data && event.data.height) {
                    iframe.style.height = (event.data.height + 40) + 'px';
                }
            });
            
            // Force refresh after loading
            iframe.addEventListener('load', function() {
                setTimeout(() => {
                    try {
                        const height = Math.max(
                            200,
                            iframe.contentWindow.document.body.scrollHeight
                        );
                        iframe.style.height = (height + 40) + 'px';
                    } catch(e) {
                        // Handle cross-origin errors
                        console.log('Could not access iframe content height');
                    }
                }, 100);
            });
        });

        // Copy code to clipboard function
        function copyCode() {
            const codeBlock = document.getElementById('element-code');
            const textArea = document.createElement('textarea');
            textArea.value = codeBlock.textContent;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            
            // Show copy feedback
            const copyButton = document.querySelector('button[onclick="copyCode()"]');
            const originalHTML = copyButton.innerHTML;
            copyButton.innerHTML = `
                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Copied!
            `;
            copyButton.classList.add('bg-green-700');
            
            setTimeout(() => {
                copyButton.innerHTML = originalHTML;
                copyButton.classList.remove('bg-green-700');
            }, 2000);
        }
    </script>
    @endpush
</x-app-layout>