<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-black">
        <div>
            <a href="/" class="text-white text-2xl font-bold">
                ComponentLibrary
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-gray-900 border border-gray-800 shadow-md overflow-hidden sm:rounded-xl">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-white">Sign in to your account</h2>
                <p class="mt-2 text-sm text-gray-400">
                    Or
                    <a class="text-white hover:text-gray-300 underline transition-colors" href="{{ route('register') }}">
                        create a new account
                    </a>
                </p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-800 border-gray-700 text-white focus:border-white focus:ring-white" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <x-input-label for="password" :value="__('Password')" class="text-white" />
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-800 border-gray-700 text-white focus:border-white focus:ring-white" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center text-gray-300">
                        <input id="remember_me" type="checkbox" class="rounded bg-gray-800 border-gray-700 text-white focus:ring-white" name="remember">
                        <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="w-full justify-center bg-white text-black hover:bg-gray-200 py-3">
                        {{ __('Sign In') }}
                    </x-primary-button>
                </div>
            </form>
            
            <div class="mt-6 border-t border-gray-800 pt-6">
                <p class="text-sm text-center text-gray-400">
                    By signing in you agree to our 
                    <a href="#" class="text-white hover:text-gray-300 underline transition-colors">Terms of Service</a>
                    and
                    <a href="#" class="text-white hover:text-gray-300 underline transition-colors">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>