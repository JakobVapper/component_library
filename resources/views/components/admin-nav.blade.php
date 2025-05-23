<div class="bg-black border-b border-gray-800 mb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-12">
            <div class="flex">
                <div class="flex space-x-6">
                    <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'border-b-2 border-white text-white' : 'text-gray-400 hover:text-white hover:border-gray-600' }} py-3 px-1 text-sm font-medium">
                        {{ __('Posts') }}
                    </a>
                    <a href="{{ route('admin.elements.index') }}" class="{{ request()->routeIs('admin.elements.*') ? 'border-b-2 border-white text-white' : 'text-gray-400 hover:text-white hover:border-gray-600' }} py-3 px-1 text-sm font-medium">
                        {{ __('Elements') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>