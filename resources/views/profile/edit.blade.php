<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- User created elements section - moved up before the delete account section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('My Elements') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Components you have contributed to the library.") }}
                    </p>

                    <div class="mt-6">
                        @if($user->elements->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($user->elements as $element)
                                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3 class="text-md font-medium">{{ $element->name }}</h3>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    <a href="{{ route('blog.show', $element->post->slug) }}" class="text-blue-600 hover:underline">
                                                        {{ $element->post->title }}
                                                    </a>
                                                </p>
                                            </div>
                                            <div>
                                                @if($element->status === 'approved')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Approved
                                                    </span>
                                                @elseif($element->status === 'pending')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        Pending
                                                    </span>
                                                @else
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Rejected
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <p class="text-sm text-gray-600 mt-2">{{ Str::limit($element->content, 100) }}</p>
                                        
                                        <div class="mt-3 flex space-x-2">
                                            <a href="{{ route('elements.edit', $element) }}" class="text-xs bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded">
                                                Edit
                                            </a>
                                            
                                            <a href="{{ route('blog.show', $element->post->slug) }}#element-{{ $element->id }}" class="text-xs bg-gray-600 hover:bg-gray-700 text-white py-1 px-3 rounded">
                                                View
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 italic">You haven't created any elements yet.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>