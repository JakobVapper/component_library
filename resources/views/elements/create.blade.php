<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Create Element') }}
            </h2>
            <span class="text-sm text-gray-400">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                {{ $post->title }}
            </span>
        </div>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Back Navigation -->
            <div class="mb-6 flex items-center">
                <a href="{{ route('blog.show', $post->slug) }}" class="text-gray-300 hover:text-white inline-flex items-center group transition-colors bg-gray-900 px-3 py-1.5 rounded-lg border border-gray-800">
                    <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Component
                </a>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Form Section -->
                <div class="lg:col-span-2">
                    <div class="bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800">
                        <div class="p-6 border-b border-gray-800">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-white rounded-md text-black">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Add Element to "{{ $post->title }}"</h3>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <form method="POST" action="{{ route('elements.store') }}" id="elementForm">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-white mb-1">Element Name</label>
                                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md bg-gray-900 border-gray-700 text-white focus:border-gray-400 focus:ring-gray-400" value="{{ old('name') }}" required>
                                    @error('name')
                                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="content" class="block text-sm font-medium text-white mb-1">
                                        Description
                                        <span class="text-gray-400 text-xs ml-1">(Markdown supported)</span>
                                    </label>
                                    <textarea name="content" id="content" rows="3" class="mt-1 block w-full rounded-md bg-gray-900 border-gray-700 text-white focus:border-gray-400 focus:ring-gray-400" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="mb-6">
                                    <label for="code" class="block text-sm font-medium text-white mb-1">HTML/Tailwind Code</label>
                                    <div class="relative">
                                        <textarea name="code" id="code" rows="12" class="font-mono mt-1 block w-full rounded-md bg-gray-900 border-gray-700 text-white focus:border-gray-400 focus:ring-gray-400 text-sm" required>{{ old('code') }}</textarea>
                                        <button type="button" id="formatCodeBtn" class="absolute top-2 right-2 text-xs bg-gray-800 text-gray-300 px-2 py-1 rounded-md hover:bg-gray-700 transition-colors">
                                            Format Code
                                        </button>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Paste your HTML and Tailwind CSS component code here
                                    </p>
                                    @error('code')
                                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none transition duration-150 ease-in-out">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                        </svg>
                                        Create Element
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Preview Section -->
                <div class="lg:col-span-1">
                    <div class="sticky top-6">
                        <div class="bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800">
                            <div class="p-4 border-b border-gray-800 flex justify-between items-center">
                                <h3 class="font-medium text-white flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Live Preview
                                </h3>
                                <span class="text-xs py-1 px-2 bg-gray-900 rounded-full text-gray-400 border border-gray-800">Responsive</span>
                            </div>
                            
                            <div class="p-4">
                                <div class="bg-white rounded-lg overflow-hidden relative">
                                    <iframe id="preview-frame" class="w-full transition-height border-0" style="min-height: 200px;"></iframe>
                                    <div id="preview-placeholder" class="absolute inset-0 flex items-center justify-center bg-gray-100">
                                        <div class="text-center text-gray-500">
                                            <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            <p class="mt-1">Enter HTML code to see preview</p>
                                        </div>
                                    </div>
                                    <div id="loading-overlay" class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center transition-opacity duration-300 opacity-0 pointer-events-none">
                                        <div class="text-white">Updating preview...</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Guidelines Section -->
                        <div class="mt-6 bg-gradient-to-br from-black to-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800">
                            <div class="p-4 border-b border-gray-800">
                                <h3 class="font-medium text-white flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Submission Guidelines
                                </h3>
                            </div>
                            
                            <div class="p-4 text-sm">
                                <ul class="text-gray-400 space-y-2 list-disc ml-5">
                                    <li>Use self-contained Tailwind CSS components</li>
                                    <li>Format code properly for readability</li>
                                    <li>Provide clear, descriptive explanations</li>
                                    <li>Elements require approval before publishing</li>
                                </ul>
                                
                                <div class="mt-4 bg-gray-900 p-3 rounded-lg border border-gray-800">
                                    <p class="text-gray-300 text-xs flex items-start">
                                        <svg class="w-4 h-4 mr-1.5 flex-shrink-0 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                        Elements require approval before appearing publicly. Check your profile page for submission status.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const codeTextarea = document.getElementById('code');
        const previewFrame = document.getElementById('preview-frame');
        const previewPlaceholder = document.getElementById('preview-placeholder');
        const loadingOverlay = document.getElementById('loading-overlay');
        const formatCodeBtn = document.getElementById('formatCodeBtn');
        let debounceTimer;
        
        const updatePreview = () => {
            const code = codeTextarea.value.trim();
            
            if (!code) {
                previewPlaceholder.style.display = 'flex';
                return;
            }
            
            previewPlaceholder.style.display = 'none';
            loadingOverlay.style.opacity = '1';
            loadingOverlay.style.pointerEvents = 'auto';
            
            // Create preview HTML document - using concatenation instead of template literals
            const previewDoc = 
                '<!DOCTYPE html>' +
                '<html>' +
                '<head>' +
                '    <meta charset="utf-8">' +
                '    <meta name="viewport" content="width=device-width, initial-scale=1">' +
                '    <script src="https://cdn.tailwindcss.com"><\/script>' +
                '    <style>' +
                '        body {' +
                '            margin: 0;' +
                '            padding: 0;' +
                '            overflow-x: hidden;' +
                '        }' +
                '        .preview-container {' +
                '            padding: 1rem;' +
                '            min-height: 100px;' +
                '            display: flex;' +
                '            justify-content: center;' +
                '            align-items: center;' +
                '            width: 100%;' +
                '            height: calc(100% - 2rem);' +
                '        }' +
                '        .preview-container > * {' +
                '            max-width: 100%;' +
                '        }' +
                '    </style>' +
                '</head>' +
                '<body>' +
                '    <div class="preview-container">' + code + '</div>' +
                '    <script>' +
                '        function reportHeight() {' +
                '            const height = document.body.scrollHeight;' +
                '            window.parent.postMessage({ height: height }, "*");' +
                '        }' +
                '        window.addEventListener("load", function() {' +
                '            reportHeight();' +
                '            setTimeout(reportHeight, 100);' +
                '            setTimeout(reportHeight, 500);' +
                '        });' +
                '        const observer = new MutationObserver(reportHeight);' +
                '        observer.observe(document.body, {' +
                '            childList: true,' +
                '            subtree: true,' +
                '            attributes: true' +
                '        });' +
                '        window.addEventListener("resize", reportHeight);' +
                '    <\/script>' +
                '</body>' +
                '</html>';
            
            // Set the iframe content
            const blob = new Blob([previewDoc], { type: 'text/html' });
            const blobURL = URL.createObjectURL(blob);
            previewFrame.src = blobURL;
            
            // Listen for height updates
            window.addEventListener('message', function(event) {
                if (event.data && event.data.height) {
                    previewFrame.style.height = (event.data.height + 24) + 'px';
                }
            });
            
            // Hide loading overlay when iframe is loaded
            previewFrame.onload = function() {
                setTimeout(() => {
                    loadingOverlay.style.opacity = '0';
                    loadingOverlay.style.pointerEvents = 'none';
                }, 300);
            };
        };
        
        // Format code function
        formatCodeBtn.addEventListener('click', function() {
            try {
                // Simple HTML formatting
                let code = codeTextarea.value;
                
                // Replace multiple spaces with a single space
                code = code.replace(/\s+/g, ' ');
                
                // Add newlines after closing tags
                code = code.replace(/(<\/[^>]+>)/g, '$1\n');
                
                // Add newlines after opening tags
                code = code.replace(/(<[^\/][^>]*>)/g, '\n$1');
                
                // Remove extra newlines
                code = code.replace(/\n\s*\n/g, '\n');
                
                // Trim
                code = code.trim();
                
                codeTextarea.value = code;
                updatePreview();
            } catch (e) {
                console.error('Error formatting code:', e);
            }
        });
        
        // Listen to code changes for live preview
        codeTextarea.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            
            // Debounce to avoid too frequent updates
            debounceTimer = setTimeout(() => {
                updatePreview();
            }, 800);
        });
        
        // Initialize if there's initial code
        if (codeTextarea.value.trim()) {
            updatePreview();
        }
    });
</script>

<style>
    .transition-height {
        transition: height 0.3s ease-out;
    }
    
    @keyframes spin {
        to {transform: rotate(360deg);}
    }
    
    .animate-spin {
        animation: spin 1.5s linear infinite;
    }
    
    .sticky {
        position: sticky;
    }
</style>
@endpush
</x-app-layout>