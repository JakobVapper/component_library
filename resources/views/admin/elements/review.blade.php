<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Review Element') }}
            </h2>
            <a href="{{ route('admin.elements.index') }}" class="px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 transition-colors font-medium">
                Back to Elements
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl mb-6 border border-gray-800">
                <div class="p-6 text-white">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="text-2xl font-medium text-white">
                                {{ $element->name }}
                                @if($element->status === 'pending')
                                    <span class="ml-2 px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200">
                                        Pending
                                    </span>
                                @elseif($element->status === 'approved')
                                    <span class="ml-2 px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200">
                                        Approved
                                    </span>
                                @else
                                    <span class="ml-2 px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200">
                                        Rejected
                                    </span>
                                @endif
                            </h3>
                            <div class="mt-1 text-gray-400">
                                Submitted by <span class="text-gray-300">{{ $element->user->name }}</span> 
                                on <span class="text-gray-300">{{ $element->created_at->format('F j, Y \a\t g:i a') }}</span>
                                for <a href="{{ route('blog.show', $element->post->slug) }}" class="text-blue-400 hover:text-blue-300 transition-colors">{{ $element->post->title }}</a>
                            </div>
                        </div>
                        
                        <div class="space-x-2">
                            @if($element->status === 'pending')
                                <form action="{{ route('admin.elements.approve', $element) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-4 py-2 bg-green-900 text-green-200 rounded-md hover:bg-green-800 transition-colors font-medium">
                                        Approve
                                    </button>
                                </form>
                                <form action="{{ route('admin.elements.reject', $element) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-4 py-2 bg-red-900 text-red-200 rounded-md hover:bg-red-800 transition-colors font-medium">
                                        Reject
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route('admin.elements.edit', $element) }}" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 transition-colors font-medium">
                                Edit
                            </a>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
                        <div class="space-y-6">
                            <div class="bg-gray-800/50 p-6 rounded-xl border border-gray-700">
                                <h4 class="text-lg font-medium text-white mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Description
                                </h4>
                                <div class="text-gray-300 leading-relaxed">
                                    {{ $element->content }}
                                </div>
                            </div>
                            
                            <div class="bg-gray-800/50 p-6 rounded-xl border border-gray-700">
                                <h4 class="text-lg font-medium text-white mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                    Code
                                </h4>
                                <pre class="bg-gray-950 text-gray-100 rounded-lg overflow-x-auto p-4 text-sm border border-gray-800"><code class="language-html">{{ $element->code }}</code></pre>
                                
                                <button
                                    onclick="copyCode(this)" 
                                    class="mt-3 text-xs bg-white hover:bg-gray-200 text-black py-2 px-4 rounded-lg flex items-center transition-colors"
                                    data-code="{{ htmlspecialchars($element->code) }}"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    Copy Code
                                </button>
                            </div>
                        </div>
                        
                        <div class="bg-gray-800/50 p-6 rounded-xl border border-gray-700">
                            <h4 class="text-lg font-medium text-white mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Preview
                            </h4>
                            <div class="p-4 bg-white rounded-lg">
                                <iframe src="{{ route('elements.preview', $element) }}" class="w-full h-64 border-none" id="preview-frame"></iframe>
                            </div>
                        </div>
                    </div>
                    
                    @if($element->status === 'rejected')
                        <div class="mt-8 bg-red-900/50 border-l-4 border-red-500 p-4 rounded-lg text-white">
                            <h4 class="font-medium text-white mb-1 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                Rejection Reason
                            </h4>
                            <p>{{ $element->rejection_reason ?? 'No specific reason was provided.' }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        function copyCode(button) {
            // Create a temporary div to decode HTML entities
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = button.getAttribute('data-code');
            const codeText = tempDiv.textContent;
            
            const textArea = document.createElement('textarea');
            textArea.value = codeText;
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
        
        // Resize iframe to fit content
        const previewFrame = document.getElementById('preview-frame');
        previewFrame.onload = function() {
            // Add a small delay to ensure content is fully loaded
            setTimeout(() => {
                previewFrame.style.height = previewFrame.contentWindow.document.body.scrollHeight + 'px';
            }, 100);
        };
    </script>
    @endpush
</x-app-layout>