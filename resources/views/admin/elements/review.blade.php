<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Review Element') }}
            </h2>
            <a href="{{ route('admin.elements.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                Back to Elements
            </a>
        </div>
    </x-slot>

    @if(View::exists('components.admin-nav'))
        <x-admin-nav />
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between pb-4 border-b mb-4">
                        <div>
                            <h3 class="text-xl font-semibold">{{ $element->name }}</h3>
                            <div class="mt-1 text-sm text-gray-500">
                                <span>Submitted by: {{ $element->user->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $element->created_at->format('M j, Y, g:i a') }}</span>
                                @if($element->updated_at->gt($element->created_at))
                                    <span class="mx-2">•</span>
                                    <span class="font-medium text-amber-600">Updated: {{ $element->updated_at->format('M j, Y, g:i a') }}</span>
                                @endif
                            </div>
                        </div>
                        <div>
                            @if($element->status === 'pending')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @elseif($element->status === 'approved')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Approved
                                </span>
                            @else
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Rejected
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="text-lg font-medium mb-2">Description</h4>
                        <p class="text-gray-700">{{ $element->content }}</p>
                    </div>

                    <!-- Element Preview -->
                    <div class="mt-8">
                        <h4 class="text-lg font-medium mb-2">Preview</h4>
                        <div class="border rounded-md p-6 bg-gray-50">
                            <iframe src="{{ route('elements.preview', $element) }}" class="w-full" style="height: 200px; border: none;"></iframe>
                        </div>
                    </div>

                    <!-- Code Display -->
                    <div class="mt-8">
                        <h4 class="text-lg font-medium mb-2">Code</h4>
                        <div class="bg-gray-800 rounded-md overflow-hidden">
                            <pre class="p-4 overflow-x-auto text-sm text-green-100"><code>{{ htmlspecialchars($element->code) }}</code></pre>
                        </div>
                    </div>

                    <!-- Post Information -->
                    <div class="mt-8">
                        <h4 class="text-lg font-medium mb-2">Associated Post</h4>
                        <div class="bg-blue-50 p-4 rounded-md">
                            <p class="font-medium">{{ $element->post->title }}</p>
                            <a href="{{ route('blog.show', $element->post->slug) }}" target="_blank" class="text-blue-600 hover:underline text-sm mt-1 inline-flex items-center">
                                View Post
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Approval/Rejection Actions -->
                    @if($element->status === 'pending')
                        <div class="mt-10 flex justify-end space-x-4">
                            <form action="{{ route('admin.elements.reject', $element) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" onclick="return confirm('Are you sure you want to reject this element?')" 
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Reject
                                </button>
                            </form>
                            <form action="{{ route('admin.elements.approve', $element) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Approve
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>