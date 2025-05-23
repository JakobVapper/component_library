<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Profile') }}
            </h2>
            <div class="text-sm text-gray-400">
                Member since {{ Auth::user()->created_at->format('F Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- User Summary Card -->
            <div class="bg-gradient-to-br from-gray-900 to-black border border-gray-800 shadow-lg rounded-xl overflow-hidden">
                <div class="p-8 sm:p-10">
                    <div class="flex flex-col md:flex-row md:justify-between gap-6">
                        <!-- Left side: User info -->
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                            <!-- User Avatar -->
                            <div class="p-4 rounded-full bg-gradient-to-br from-gray-800 to-black border border-gray-700 flex-shrink-0">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            
                            <!-- User Name and Email -->
                            <div class="text-center md:text-left">
                                <h2 class="text-2xl font-bold text-white mb-1">{{ $user->name }}</h2>
                                <p class="text-gray-400">{{ $user->email }}</p>
                            </div>
                        </div>
                        
                        <!-- Right side: Stats -->
                        <div class="flex flex-wrap justify-center md:justify-end gap-4 mt-2 md:mt-0">
                            <div class="bg-black bg-opacity-50 rounded-lg px-4 py-3 border border-gray-800">
                                <span class="text-xs text-gray-400">Contributions</span>
                                <p class="text-xl font-bold text-white">{{ $user->elements->count() }}</p>
                            </div>
                            <div class="bg-black bg-opacity-50 rounded-lg px-4 py-3 border border-gray-800">
                                <span class="text-xs text-gray-400">Approved</span>
                                <p class="text-xl font-bold text-white">{{ $user->elements->where('status', 'approved')->count() }}</p>
                            </div>
                            <div class="bg-black bg-opacity-50 rounded-lg px-4 py-3 border border-gray-800">
                                <span class="text-xs text-gray-400">Pending</span>
                                <p class="text-xl font-bold text-white">{{ $user->elements->where('status', 'pending')->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Contributions Section -->
            <div class="bg-gradient-to-br from-black to-gray-900 border border-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-gray-800">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-5 h-5 text-gray-300 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        My Contributions
                    </h2>
                </div>
                
                <div class="p-6">
                    @if($user->elements->count() > 0)
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            @foreach($user->elements as $element)
                                <div class="bg-black rounded-xl border border-gray-800 hover:border-gray-700 hover:shadow-lg transition-all duration-300 overflow-hidden">
                                    <div class="p-5">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3 class="text-lg font-medium text-white">{{ $element->name }}</h3>
                                                <p class="text-sm text-gray-400 mt-1 flex items-center">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                    <a href="{{ route('blog.show', $element->post->slug) }}" class="text-gray-300 hover:text-white transition-colors">
                                                        {{ $element->post->title }}
                                                    </a>
                                                </p>
                                                <p class="text-xs text-gray-500 mt-1 flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    {{ $element->created_at->format('M j, Y') }}
                                                </p>
                                            </div>
                                            <div>
                                                @if($element->status === 'approved')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-200 border border-green-800">
                                                        Approved
                                                    </span>
                                                @elseif($element->status === 'pending')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900 text-yellow-200 border border-yellow-800">
                                                        Pending
                                                    </span>
                                                @else
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-200 border border-red-800">
                                                        Rejected
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <p class="text-sm text-gray-400 mt-3 mb-4">{{ Str::limit($element->content, 100) }}</p>
                                        
                                        <div class="flex space-x-3 pt-3 border-t border-gray-800">
                                            <a href="{{ route('elements.edit', $element) }}" class="inline-flex items-center text-xs px-3 py-1.5 bg-white text-black rounded-md hover:bg-gray-200 transition-colors">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <a href="{{ route('blog.show', $element->post->slug) }}#element-{{ $element->id }}" class="inline-flex items-center text-xs px-3 py-1.5 bg-gray-900 text-gray-300 rounded-md border border-gray-800 hover:bg-gray-800 hover:text-white transition-colors">
                                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                View
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-black rounded-xl p-10 border border-gray-800 text-center">
                            <div class="p-4 rounded-full bg-gray-900 border border-gray-800 inline-flex mb-4">
                                <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-400 text-lg mb-2">No contributions yet</p>
                            <p class="text-gray-500 mb-5">You haven't created any elements yet. Find a component and add your own elements!</p>
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 bg-white text-black text-sm font-medium rounded-md hover:bg-gray-200 transition-colors duration-300">
                                Browse Components
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Account Settings Section -->
            <div class="bg-gradient-to-br from-black to-gray-900 border border-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-gray-800">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-5 h-5 text-gray-300 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Account Settings
                    </h2>
                </div>

                <div class="divide-y divide-gray-800">
                    <!-- Profile Information -->
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-medium text-white">Profile Information</h3>
                            <button id="toggleProfileForm" class="text-sm text-gray-400 hover:text-white flex items-center">
                                <span id="profileFormToggleText">Edit</span>
                                <svg id="profileFormToggleIcon" class="w-4 h-4 ml-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-400">Name</label>
                                    <div class="mt-1 text-white">{{ $user->name }}</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-400">Email</label>
                                    <div class="mt-1 text-white">{{ $user->email }}</div>
                                </div>
                            </div>

                            <div id="profileFormContainer" class="hidden mt-6 animate-fadeIn">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>

                    <!-- Password Update -->
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-medium text-white">Update Password</h3>
                            <button id="togglePasswordForm" class="text-sm text-gray-400 hover:text-white flex items-center">
                                <span id="passwordFormToggleText">Edit</span>
                                <svg id="passwordFormToggleIcon" class="w-4 h-4 ml-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>

                        <p class="text-gray-400 text-sm">Ensure your account is using a long, random password to stay secure.</p>

                        <div id="passwordFormContainer" class="hidden mt-6 animate-fadeIn">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-medium text-red-400 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                Delete Account
                            </h3>
                            <button id="toggleDangerZone" class="text-sm text-gray-400 hover:text-white flex items-center">
                                <span id="dangerZoneToggleText">Edit</span>
                                <svg id="dangerZoneToggleIcon" class="w-4 h-4 ml-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>

                        <p class="text-gray-400 text-sm">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>

                        <div id="dangerZoneContainer" class="hidden mt-6 animate-fadeIn">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Profile form toggle
            const toggleProfileForm = document.getElementById('toggleProfileForm');
            const profileFormContainer = document.getElementById('profileFormContainer');
            const profileFormToggleText = document.getElementById('profileFormToggleText');
            const profileFormToggleIcon = document.getElementById('profileFormToggleIcon');
            
            toggleProfileForm.addEventListener('click', function() {
                profileFormContainer.classList.toggle('hidden');
                if (profileFormContainer.classList.contains('hidden')) {
                    profileFormToggleText.textContent = 'Edit';
                    profileFormToggleIcon.classList.remove('rotate-180');
                } else {
                    profileFormToggleText.textContent = 'Hide';
                    profileFormToggleIcon.classList.add('rotate-180');
                    setTimeout(() => {
                        profileFormContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                }
            });
            
            // Password form toggle
            const togglePasswordForm = document.getElementById('togglePasswordForm');
            const passwordFormContainer = document.getElementById('passwordFormContainer');
            const passwordFormToggleText = document.getElementById('passwordFormToggleText');
            const passwordFormToggleIcon = document.getElementById('passwordFormToggleIcon');
            
            togglePasswordForm.addEventListener('click', function() {
                passwordFormContainer.classList.toggle('hidden');
                if (passwordFormContainer.classList.contains('hidden')) {
                    passwordFormToggleText.textContent = 'Edit';
                    passwordFormToggleIcon.classList.remove('rotate-180');
                } else {
                    passwordFormToggleText.textContent = 'Hide';
                    passwordFormToggleIcon.classList.add('rotate-180');
                    setTimeout(() => {
                        passwordFormContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                }
            });
            
            // Danger zone toggle
            const toggleDangerZone = document.getElementById('toggleDangerZone');
            const dangerZoneContainer = document.getElementById('dangerZoneContainer');
            const dangerZoneToggleText = document.getElementById('dangerZoneToggleText');
            const dangerZoneToggleIcon = document.getElementById('dangerZoneToggleIcon');
            
            toggleDangerZone.addEventListener('click', function() {
                dangerZoneContainer.classList.toggle('hidden');
                if (dangerZoneContainer.classList.contains('hidden')) {
                    dangerZoneToggleText.textContent = 'Edit';
                    dangerZoneToggleIcon.classList.remove('rotate-180');
                } else {
                    dangerZoneToggleText.textContent = 'Hide';
                    dangerZoneToggleIcon.classList.add('rotate-180');
                    setTimeout(() => {
                        dangerZoneContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }, 100);
                }
            });
            
            // Handle form submission messages and URL hash
            if (document.querySelector('[data-profile-updated]')) {
                toggleProfileForm.click();
            }
            if (document.querySelector('[data-password-updated]')) {
                togglePasswordForm.click();
            }
            
            const hash = window.location.hash;
            if (hash === '#profile') {
                toggleProfileForm.click();
            } else if (hash === '#password') {
                togglePasswordForm.click();
            } else if (hash === '#delete') {
                toggleDangerZone.click();
            }
        });
    </script>
    
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
        
        .transition-transform {
            transition: transform 0.2s ease-in-out;
        }
        
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</x-app-layout>