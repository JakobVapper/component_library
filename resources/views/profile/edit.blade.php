<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-800">
                <div class="max-w-xl">
                    <div class="flex items-center mb-4">
                        <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <h2 class="text-lg font-medium text-white">
                            {{ __('Profile Information') }}
                        </h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-400">
                        {{ __("Update your account's profile information and email address.") }}
                    </p>

                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-800">
                <div class="max-w-xl">
                    <div class="flex items-center mb-4">
                        <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                        <h2 class="text-lg font-medium text-white">
                            {{ __('Update Password') }}
                        </h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-400">
                        {{ __('Ensure your account is using a long, random password to stay secure.') }}
                    </p>

                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- User created elements section -->
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-800">
                <div>
                    <div class="flex items-center mb-4">
                        <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                        <h2 class="text-lg font-medium text-white">
                            {{ __('My Elements') }}
                        </h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-400">
                        {{ __("Components you have contributed to the library.") }}
                    </p>

                    <div class="mt-6">
                        @if($user->elements->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($user->elements as $element)
                                    <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3 class="text-md font-medium text-white">{{ $element->name }}</h3>
                                                <p class="text-xs text-gray-400 mt-1">
                                                    <a href="{{ route('blog.show', $element->post->slug) }}" class="text-gray-300 hover:text-white transition-colors">
                                                        {{ $element->post->title }}
                                                    </a>
                                                </p>
                                            </div>
                                            <div>
                                                @if($element->status === 'approved')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200">
                                                        Approved
                                                    </span>
                                                @elseif($element->status === 'pending')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200">
                                                        Pending
                                                    </span>
                                                @else
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200">
                                                        Rejected
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <p class="text-sm text-gray-300 mt-2">{{ Str::limit($element->content, 100) }}</p>
                                        
                                        <div class="mt-3 flex space-x-2">
                                            <a href="{{ route('elements.edit', $element) }}" class="text-xs bg-gray-700 hover:bg-gray-600 text-white py-1 px-3 rounded-lg transition-colors">
                                                Edit
                                            </a>
                                            
                                            <a href="{{ route('blog.show', $element->post->slug) }}#element-{{ $element->id }}" class="text-xs bg-gray-700 hover:bg-gray-600 text-white py-1 px-3 rounded-lg transition-colors">
                                                View
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="flex flex-col items-center justify-center py-8 text-center bg-gray-800/30 rounded-xl border border-dashed border-gray-700">
                                <svg class="w-12 h-12 text-gray-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                                <p class="text-gray-400 italic">You haven't created any elements yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-800">
                <div class="max-w-xl">
                    <div class="flex items-center mb-4">
                        <svg class="w-5 h-5 mr-2 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <h2 class="text-lg font-medium text-white">
                            {{ __('Delete Account') }}
                        </h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-400">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
                    </p>

                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>