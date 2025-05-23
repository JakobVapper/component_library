<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A curated collection of beautiful Tailwind CSS components">

        <title>{{ config('app.name', 'Component Library') }} - Tailwind CSS Components</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-black text-white font-sans">
        <!-- Hero Section with Navigation -->
        <header class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/40 to-blue-900/40 mix-blend-multiply filter"></div>
            <nav class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ url('/') }}" class="flex items-center">
                        <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <span class="ml-3 text-xl font-bold">Component Library</span>
                    </a>
                </div>

                <!-- Auth Links -->
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        <div class="hidden md:flex items-center space-x-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm px-4 py-2 bg-white bg-opacity-10 border border-white border-opacity-20 rounded-md text-white hover:bg-opacity-20 transition-colors">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white transition-colors">
                                    Login
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm px-4 py-2 bg-white text-black rounded-md hover:bg-gray-200 transition-colors">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif

                    <!-- Mobile Menu Button -->
                    <button type="button" class="md:hidden text-gray-300 hover:text-white" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <div class="hidden md:hidden absolute top-16 right-0 left-0 z-10 bg-black bg-opacity-90 shadow-lg" id="mobile-menu">
                <div class="px-4 pt-2 pb-4 space-y-1 border-t border-gray-800">
                    <a href="#components" class="block px-4 py-2 text-gray-300 hover:text-white transition-colors">Components</a>
                    <a href="#features" class="block px-4 py-2 text-gray-300 hover:text-white transition-colors">Features</a>
                    <a href="#showcase" class="block px-4 py-2 text-gray-300 hover:text-white transition-colors">Showcase</a>
                    
                    @if (Route::has('login'))
                        <div class="pt-4 mt-2 border-t border-gray-800">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-white font-medium">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-300 hover:text-white">
                                    Login
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-300 hover:text-white">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>

            <!-- Hero Content -->
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 pb-32">
                <div class="md:flex md:items-center md:justify-between">
                    <!-- Hero Text -->
                    <div class="md:w-1/2 md:pr-12">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6">
                            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">Beautiful Components</span>
                            <span class="block">Built with Tailwind CSS</span>
                        </h1>
                        <p class="text-xl md:text-2xl font-light text-gray-300 mb-8">
                            A comprehensive library of customizable components to accelerate your next web project.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#components" class="inline-flex items-center px-6 py-3 bg-white text-black rounded-md text-base font-medium hover:bg-gray-200 transition-colors">
                                Explore Components
                                <svg class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="{{ Route::has('register') ? route('register') : '#' }}" class="inline-flex items-center px-6 py-3 border border-white bg-transparent rounded-md text-base font-medium text-white hover:bg-white hover:text-black transition-colors">
                                Get Started
                            </a>
                        </div>
                    </div>
                    
                    <!-- Hero Visual -->
                    <div class="hidden md:block md:w-1/2 mt-12 md:mt-0">
                        <div class="relative h-96">
                            <!-- Abstract Visual Element -->
                            <div class="absolute top-0 right-0 transform translate-x-8 -translate-y-12">
                                <svg class="w-64 h-64 opacity-20" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="200" cy="200" r="150" stroke="url(#gradient1)" stroke-width="2" />
                                    <circle cx="200" cy="200" r="100" stroke="url(#gradient2)" stroke-width="2" />
                                    <path d="M200 50L350 200L200 350L50 200L200 50Z" stroke="url(#gradient1)" stroke-width="2" fill="none" />
                                    <defs>
                                        <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#60A5FA" />
                                            <stop offset="100%" stop-color="#C084FC" />
                                        </linearGradient>
                                        <linearGradient id="gradient2" x1="100%" y1="0%" x2="0%" y2="100%">
                                            <stop offset="0%" stop-color="#60A5FA" />
                                            <stop offset="100%" stop-color="#C084FC" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            
                            <!-- Component Preview Card -->
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-900 rounded-xl p-6 border border-gray-700 shadow-2xl w-full max-w-md">
                                <div class="flex items-start space-x-4">
                                    <!-- Avatar -->
                                    <div class="flex-shrink-0">
                                        <div class="h-12 w-12 rounded-full bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center text-white font-bold text-xl">
                                            TW
                                        </div>
                                    </div>
                                    <!-- Content -->
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-white">
                                            Tailwind Components
                                        </p>
                                        <p class="text-sm text-gray-400">
                                            Beautifully designed, ready-to-use components
                                        </p>
                                        <div class="mt-2 bg-gray-800 p-3 rounded-lg">
                                            <code class="text-xs text-green-400">
                                                &lt;div class="flex items-center"&gt;<br>
                                                &nbsp;&nbsp;&lt;div class="bg-blue-500"&gt;<br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;// Your component<br>
                                                &nbsp;&nbsp;&lt;/div&gt;<br>
                                                &lt;/div&gt;
                                            </code>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-end space-x-2">
                                    <button class="px-3 py-1 bg-gray-800 text-gray-300 rounded text-xs">Cancel</button>
                                    <button class="px-3 py-1 bg-blue-600 text-white rounded text-xs">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Features Section -->
        <section id="features" class="py-24 bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-4">Why Choose Our Component Library</h2>
                    <p class="text-xl text-gray-400 max-w-2xl mx-auto">Crafted with attention to detail for developers who care about code quality</p>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-black p-8 rounded-xl border border-gray-800">
                        <div class="h-12 w-12 rounded-md bg-blue-900 bg-opacity-20 flex items-center justify-center mb-5">
                            <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Fully Responsive</h3>
                        <p class="text-gray-400">All components are designed to work flawlessly across all device sizes.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-black p-8 rounded-xl border border-gray-800">
                        <div class="h-12 w-12 rounded-md bg-purple-900 bg-opacity-20 flex items-center justify-center mb-5">
                            <svg class="h-6 w-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Customizable</h3>
                        <p class="text-gray-400">Easy to modify and adapt to your brand's unique design requirements.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-black p-8 rounded-xl border border-gray-800">
                        <div class="h-12 w-12 rounded-md bg-green-900 bg-opacity-20 flex items-center justify-center mb-5">
                            <svg class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Accessibility First</h3>
                        <p class="text-gray-400">Built with accessibility in mind to ensure a great experience for all users.</p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-black p-8 rounded-xl border border-gray-800">
                        <div class="h-12 w-12 rounded-md bg-red-900 bg-opacity-20 flex items-center justify-center mb-5">
                            <svg class="h-6 w-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Quick Implementation</h3>
                        <p class="text-gray-400">Copy and paste functionality to save development time and get projects launched faster.</p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="bg-black p-8 rounded-xl border border-gray-800">
                        <div class="h-12 w-12 rounded-md bg-yellow-900 bg-opacity-20 flex items-center justify-center mb-5">
                            <svg class="h-6 w-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Light & Dark Modes</h3>
                        <p class="text-gray-400">All components support both light and dark modes for modern user interfaces.</p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="bg-black p-8 rounded-xl border border-gray-800">
                        <div class="h-12 w-12 rounded-md bg-indigo-900 bg-opacity-20 flex items-center justify-center mb-5">
                            <svg class="h-6 w-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Clean Code</h3>
                        <p class="text-gray-400">Well-structured HTML and CSS that adheres to best practices for maintainability.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Showcase Section -->
        <section id="showcase" class="py-24 bg-black">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-4">Featured Components</h2>
                    <p class="text-xl text-gray-400 max-w-2xl mx-auto">Some of our most loved designs ready for implementation</p>
                </div>

                <!-- Featured Components Gallery -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Component Preview 1 -->
                    <div class="bg-gray-900 rounded-xl overflow-hidden border border-gray-800">
                        <div class="p-4 bg-gray-800 border-b border-gray-700 flex justify-between items-center">
                            <h3 class="text-white font-medium">Alert Component</h3>
                            <span class="px-2 py-1 bg-blue-900 text-blue-200 text-xs rounded-full">New</span>
                        </div>
                        <div class="p-6 flex items-center justify-center">
                            <!-- Sample Alert Component -->
                            <div class="w-full p-4 border border-blue-800 bg-blue-900 bg-opacity-20 rounded-lg flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="text-sm font-medium text-blue-300">Information</h4>
                                    <div class="mt-1 text-sm text-blue-200">
                                        This is an informational alert. You can use it to show non-critical information to users.
                                    </div>
                                </div>
                                <div class="ml-auto pl-3">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button class="inline-flex bg-blue-900 bg-opacity-30 rounded-md p-1.5 text-blue-300 hover:bg-opacity-50 focus:outline-none">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-gray-800 border-t border-gray-700 flex justify-between">
                            <span class="text-xs text-gray-400">Responsive • Accessible</span>
                            <a href="#" class="text-xs text-blue-400 hover:text-blue-300 flex items-center">
                                View Details
                                <svg class="ml-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Component Preview 2 -->
                    <div class="bg-gray-900 rounded-xl overflow-hidden border border-gray-800">
                        <div class="p-4 bg-gray-800 border-b border-gray-700 flex justify-between items-center">
                            <h3 class="text-white font-medium">Card Component</h3>
                            <span class="px-2 py-1 bg-purple-900 text-purple-200 text-xs rounded-full">Popular</span>
                        </div>
                        <div class="p-6 flex items-center justify-center">
                            <!-- Sample Card Component -->
                            <div class="w-full bg-black rounded-xl overflow-hidden border border-gray-800 transition-all duration-300 hover:shadow-lg hover:border-gray-700">
                                <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1592609931095-54a2168ae893?ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=80" alt="Card image">
                                <div class="p-5">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="px-2 py-1 bg-gray-800 text-gray-300 text-xs rounded-md">Design</span>
                                        <span class="px-2 py-1 bg-gray-800 text-gray-300 text-xs rounded-md">UI/UX</span>
                                    </div>
                                    <h5 class="text-xl font-bold tracking-tight text-white mb-2">A Guide to Creating Beautiful Interfaces</h5>
                                    <p class="font-normal text-gray-400 mb-4">Here's a guide to designing interfaces that are both visually appealing and highly functional.</p>
                                    <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:ring-2 focus:outline-none focus:ring-purple-500">
                                        Read more
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-gray-800 border-t border-gray-700 flex justify-between">
                            <span class="text-xs text-gray-400">Responsive • Interactive</span>
                            <a href="#" class="text-xs text-purple-400 hover:text-purple-300 flex items-center">
                                View Details
                                <svg class="ml-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- View All Button -->
                <div class="mt-12 text-center">
                    <a href="#" class="inline-flex items-center px-6 py-3 bg-white text-black rounded-md text-base font-medium hover:bg-gray-100 transition-colors">
                        View All Components 
                        <svg class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-black border-t border-gray-800">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Logo and Info -->
                    <div>
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span class="ml-3 text-xl font-bold">Component Library</span>
                        </div>
                        <p class="mt-4 text-gray-400 text-sm">A comprehensive collection of Tailwind CSS components for building beautiful web interfaces.</p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-white font-medium mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#components" class="text-gray-400 hover:text-white text-sm">Components</a></li>
                            <li><a href="#features" class="text-gray-400 hover:text-white text-sm">Features</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white text-sm">Documentation</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white text-sm">Support</a></li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div>
                        <h3 class="text-white font-medium mb-4">Stay Updated</h3>
                        <p class="text-gray-400 text-sm mb-4">Subscribe to our newsletter for the latest updates and components.</p>
                        <form class="flex">
                            <input type="email" placeholder="Your email" class="px-4 py-2 bg-gray-900 border border-gray-700 rounded-l-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 flex-grow">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700">Subscribe</button>
                        </form>
                    </div>
                </div>

                <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} Component Library. All rights reserved.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Mobile menu toggle
                const menuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');
                
                menuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
                
                // Close mobile menu when clicking a link
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.add('hidden');
                    });
                });
            });
        </script>
    </body>
</html>