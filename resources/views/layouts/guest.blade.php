<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Component Library') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-white antialiased">
        <div class="min-h-screen flex flex-col bg-black">
            <!-- Navigation -->
            <nav class="relative px-4 sm:px-6 lg:px-8 py-5">
                <div class="max-w-lg mx-auto">
                    <a href="{{ url('/') }}" class="flex items-center justify-center">
                        <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <span class="ml-3 text-xl font-bold">Component Library</span>
                    </a>
                </div>
            </nav>
            
            <!-- Main Content -->
            <div class="flex flex-grow items-center justify-center px-4 py-6 sm:px-6 lg:px-8">
                <div class="w-full max-w-md">
                    <div class="bg-gradient-to-br from-gray-900 to-black border border-gray-800 rounded-2xl shadow-xl overflow-hidden p-8">
                        {{ $slot }}
                    </div>

                    <!-- Back to Home -->
                    <div class="mt-6 text-center">
                        <a href="{{ url('/') }}" class="inline-flex items-center text-sm text-gray-400 hover:text-white transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="py-4 text-center">
                <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Component Library. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>