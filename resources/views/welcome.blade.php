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
<body class="antialiased font-sans bg-black text-white">
    <div class="relative min-h-screen">
        <!-- Navigation -->
        <div class="absolute top-0 left-0 w-full z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-white text-2xl font-bold">
                            ComponentLibrary
                        </a>
                    </div>
                    
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:flex">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors">Log in</a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-gray-300 hover:text-white transition-colors">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="relative pt-24 pb-32 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 md:pt-24">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                        Modern UI Components
                    </h1>
                    <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-300">
                        A collection of customizable, ready-to-use components for your web projects
                    </p>
                    <div class="mt-10 flex justify-center space-x-6">
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-black bg-white hover:bg-gray-200 transition-colors md:py-4 md:text-lg md:px-10">
                                Get Started
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-black bg-white hover:bg-gray-200 transition-colors md:py-4 md:text-lg md:px-10">
                                Sign up
                            </a>
                            <a href="{{ route('login') }}" class="px-8 py-3 border border-white text-base font-medium rounded-md text-white bg-transparent hover:bg-gray-900 transition-colors md:py-4 md:text-lg md:px-10">
                                Log in
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            
            <!-- Decorative pattern -->
            <div class="absolute w-full h-64 bottom-0 bg-gradient-to-b from-transparent to-black/20"></div>
            <div class="absolute inset-0 z-[-1] opacity-20">
                <div class="absolute inset-0">
                    <svg class="w-full h-full" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                                <path d="M 0 10 L 40 10 M 10 0 L 10 40" fill="none" stroke="white" stroke-width="0.5" />
                            </pattern>
                        </defs>
                        <rect width="800" height="800" fill="url(#grid)" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Features -->
        <div class="py-16 bg-gray-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-white">Available Components</h2>
                    <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-400">
                        Browse our collection of component categories
                    </p>
                </div>
                
                <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($posts as $post)
                        <div class="bg-gray-900 overflow-hidden shadow-lg rounded-xl border border-gray-800 hover:border-gray-700 transition-all duration-300">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-gray-800 p-3 rounded-lg">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-white">{{ $post->title }}</h3>
                                        <p class="mt-1 text-sm text-gray-400">
                                            {{ $post->elements()->where('status', 'approved')->count() }} elements
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-base text-gray-300">
                                        {{ Str::limit($post->excerpt, 120) }}
                                    </p>
                                </div>
                                <div class="mt-6">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-medium text-sm text-white hover:bg-gray-700 transition-colors">
                                        View Components
                                        <svg class="ml-2 -mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- CTA -->
        <div class="py-16 bg-black">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gray-900 rounded-2xl shadow-xl overflow-hidden">
                    <div class="pt-10 pb-12 px-6 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
                        <div class="lg:self-center">
                            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                                <span class="block">Ready to dive in?</span>
                                <span class="block">Start using our components today.</span>
                            </h2>
                            <p class="mt-4 text-lg leading-6 text-gray-400">
                                Create an account to browse, contribute, and implement our growing collection of UI components.
                            </p>
                            <div class="mt-8 flex">
                                @auth
                                    <a href="{{ route('dashboard') }}" class="bg-white border border-transparent rounded-md shadow px-5 py-3 inline-flex items-center text-base font-medium text-black hover:bg-gray-200 transition-colors">
                                        Visit Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('register') }}" class="bg-white border border-transparent rounded-md shadow px-5 py-3 inline-flex items-center text-base font-medium text-black hover:bg-gray-200 transition-colors">
                                        Get started
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="bg-gray-950">
            <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
                <p class="mt-8 text-center text-base text-gray-400">
                    &copy; {{ date('Y') }} Component Library. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>