<x-guest-layout>
    <!-- Form Header -->
    <div class="mb-8 text-center">
        <div class="flex justify-center">
            <div class="h-16 w-16 rounded-full bg-blue-900 bg-opacity-20 flex items-center justify-center mb-4">
                <svg class="h-8 w-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
        <h1 class="text-2xl font-bold text-white">Verify Your Email</h1>
        <p class="mt-2 text-gray-400">Check your inbox and confirm your email address</p>
    </div>

    <div class="mb-8 text-sm text-gray-300 text-center">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-8 p-4 rounded-lg bg-blue-900 bg-opacity-20 border border-blue-800">
            <p class="text-sm text-blue-300 text-center">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </p>
        </div>
    @endif

    <div class="mt-8 flex flex-col space-y-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-black bg-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center">
            @csrf

            <button type="submit" class="text-sm text-blue-400 hover:text-blue-300 transition-colors">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>