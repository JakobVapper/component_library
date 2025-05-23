<x-guest-layout>
    <!-- Login Form Header -->
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-white">Welcome Back</h1>
        <p class="mt-2 text-gray-400">Sign in to your account to continue</p>
    </div>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-300 text-sm mb-1" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </div>
                <x-text-input id="email" class="block mt-1 w-full pl-10 pr-4 py-2.5 rounded-lg bg-gray-900 border-gray-700 text-white focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@example.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Password')" class="text-gray-300 text-sm mb-1" />
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-400 hover:text-blue-300 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <x-text-input id="password" class="block mt-1 w-full pl-10 pr-4 py-2.5 rounded-lg bg-gray-900 border-gray-700 text-white focus:border-blue-500 focus:ring-blue-500"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-gray-900 border-gray-700 text-blue-600 focus:ring-blue-500 focus:border-blue-500" name="remember">
                <span class="ml-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-black bg-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                {{ __('Log in') }}
            </button>
        </div>
        
        <!-- Registration Link -->
        @if (Route::has('register'))
            <div class="text-center mt-6">
                <p class="text-sm text-gray-400">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 transition-colors">
                        {{ __('Register') }}
                    </a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>