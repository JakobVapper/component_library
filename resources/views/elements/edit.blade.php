<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Element') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl border border-gray-800">
                <div class="p-6">
                    <div class="mb-6">
                        <a href="{{ route('blog.show', $element->post->slug) }}" class="text-gray-300 hover:text-white inline-flex items-center group transition-all duration-200">
                            <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to {{ $element->post->title }}
                        </a>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-white mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Element
                        </h3>
                        
                        @if($errors->any())
                            <div class="mb-6 bg-red-900/50 border-l-4 border-red-500 p-4 rounded-lg text-white">
                                <div class="flex">
                                    <svg class="h-5 w-5 text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        
                        <form action="{{ route('elements.update', $element) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-6">
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Element Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $element->name) }}" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white">
                                <p class="mt-1 text-sm text-gray-400">A short, descriptive name for your component element.</p>
                            </div>
                            
                            <div class="mb-6">
                                <label for="content" class="block text-sm font-medium text-gray-300 mb-1">Description</label>
                                <textarea name="content" id="content" rows="3" class="mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white">{{ old('content', $element->content) }}</textarea>
                                <p class="mt-1 text-sm text-gray-400">Explain what this element does and how to use it.</p>
                            </div>
                            
                            <div class="mb-6">
                                <label for="code" class="block text-sm font-medium text-gray-300 mb-1">HTML Code</label>
                                <textarea name="code" id="code" rows="10" class="font-mono mt-1 block w-full rounded-lg border-gray-700 bg-gray-800 text-white shadow-sm focus:border-white focus:ring-white">{{ old('code', $element->code) }}</textarea>
                                <p class="mt-1 text-sm text-gray-400">The actual HTML code for your component element.</p>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="group inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-medium text-sm text-black uppercase tracking-wider hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12"></path>
                                    </svg>
                                    Update Element
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        const codeEditor = document.getElementById('code');
        
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