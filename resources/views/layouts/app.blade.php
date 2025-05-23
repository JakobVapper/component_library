<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-black border-b border-gray-800">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            
            <!-- Footer -->
            <footer class="bg-gray-950 mt-12 py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="border-t border-gray-800 pt-8">
                        <p class="text-center text-sm text-gray-400">
                            &copy; {{ date('Y') }} Component Library. All rights reserved.
                        </p>
                    </div>
                </div>
            </footer>
        </div>

        @stack('scripts')
    </body>
</html>