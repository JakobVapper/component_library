<div class="bg-white border-b border-gray-200 mb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-12">
            <div class="flex">
                <div class="flex space-x-6">
                    <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }} py-3 px-1 text-sm font-medium">
                        {{ __('Posts') }}
                    </a>
                    <a href="{{ route('admin.elements.index') }}" class="{{ request()->routeIs('admin.elements.*') ? 'border-b-2 border-indigo-500 text-gray-900' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }} py-3 px-1 text-sm font-medium">
                        {{ __('Elements') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>