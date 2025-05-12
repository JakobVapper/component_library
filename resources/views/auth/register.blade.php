<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-black">
        <div>
            <a href="/" class="text-white text-2xl font-bold">
                ComponentLibrary
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-gray-900 border border-gray-800 shadow-md overflow-hidden sm:rounded-xl">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-white">Create your account</h2>
                <p class="mt-2 text-sm text-gray-400">
                    Already have an account?
                    <a class="text-white hover:text-gray-300 underline transition-colors" href="{{ route('login') }}">
                        Sign in
                    </a>
                </p>
            </div>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-white" required="true" />
                    <x-text-input id="name" class="block mt-1 w-full bg-gray-800 border-gray-700 text-white focus:border-white focus:ring-white" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-white" required="true" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-800 border-gray-700 text-white focus:border-white focus:ring-white" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-white" required="true" />

                    <x-text-input id="password" class="block mt-1 w-full bg-gray-800 border-gray-700 text-white focus:border-white focus:ring-white"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <p class="mt-1 text-sm text-gray-400">Must be at least 8 characters</p>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white" required="true" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-800 border-gray-700 text-white focus:border-white focus:ring-white"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex flex-col items-center mt-6 pt-4">
                    <x-primary-button class="w-full justify-center bg-white text-black hover:bg-gray-200 py-3">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
            
            <div class="mt-6 border-t border-gray-800 pt-6">
                <p class="text-sm text-center text-gray-400">
                    By signing up you agree to our 
                    <a href="#" class="text-white hover:text-gray-300 underline transition-colors">Terms of Service</a>
                    and
                    <a href="#" class="text-white hover:text-gray-300 underline transition-colors">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>