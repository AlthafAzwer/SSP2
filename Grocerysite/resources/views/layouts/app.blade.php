<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts (Vite, etc.) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Livewire Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <!-- Navigation -->
            <nav class="bg-gradient-to-r from-white via-gray-100 to-white border-b border-gray-200 shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Flex container: 3 sections (left/center/right) -->
                    <div class="flex items-center justify-between h-16 w-full">
                        
                        <!-- LEFT: Logo + Brand Name (big & pinned left) -->
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                                <img
                                    class="h-12 w-auto object-contain"
                                    src="{{ asset('images/logofinal.png') }}"
                                    alt="GroceriFy Logo"
                                />
                                <span class="text-3xl font-extrabold text-gray-700 hover:text-blue-600 transition-colors">
                                    GroceriFy
                                </span>
                            </a>
                        </div>

                        <!-- CENTER: Navigation Links -->
                        <div class="flex-1 flex justify-center">
                            <div class="hidden md:flex items-center space-x-8">
                                <a
                                    href="{{ route('home') }}"
                                    class="text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium"
                                >
                                    Home
                                </a>
                                <a
                                    href="{{ route('products') }}"
                                    class="text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium"
                                >
                                    Products
                                </a>
                                <a
                                    href="{{ route('contact') }}"
                                    class="text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium"
                                >
                                    Contact
                                </a>
                                <a
                                    href="{{ route('blog') }}"
                                    class="text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium"
                                >
                                    Reviews
                                </a>



                            </div>
                        </div>

                        

                        <!-- RIGHT: Cart Icon + Auth Links -->
                        <div class="flex items-center space-x-6">
                            <!-- Cart Icon Component -->
                            @livewire('cart-icon')

                            <a 
    href="{{ route('user.orders') }}" 
    class="flex items-center text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium"
>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2H2V5zm16 4H2v6a2 2 0 002 2h12a2 2 0 002-2V9zM6 12a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
    </svg>
    My Orders
</a>

                            <!-- Auth Links -->
                            @auth
                                <div class="relative">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button
                                                class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200"
                                            >
                                                {{ Auth::user()->name }}
                                                <svg
                                                    class="ml-1 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 9l-7 7-7-7"
                                                    />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link
                                                    :href="route('logout')"
                                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                                >
                                                    {{ __('Logout') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            @else
                                <div class="flex items-center space-x-4">
                                    <a
                                        href="{{ route('login') }}"
                                        class="text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium"
                                    >
                                        Login
                                    </a>
                                    <a
                                        href="{{ route('register') }}"
                                        class="text-gray-700 hover:text-blue-600 transition-colors duration-200 font-medium"
                                    >
                                        Register
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading (if using $header) -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-8">
                @yield('content')
            </main>
        </div>

        <!-- ===================================== -->
        <!-- FOOTER -->
        <!-- ===================================== -->
        <footer class="bg-gray-900 text-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Column 1: Brand / About -->
                    <div>
                        <h3 class="text-2xl font-bold mb-2 text-white">
                            GroceriFy
                        </h3>
                        <p class="text-sm text-gray-300">
                            The best place to find your fresh and organic groceries delivered right to your door. 
                            Quality, convenience, and sustainability—our guarantee to you.
                        </p>
                    </div>

                    <!-- Column 2: Quick Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-3 text-white">Quick Links</h4>
                        <ul class="space-y-2 text-sm">
                            <li>
                                <a
                                    href="{{ route('home') }}"
                                    class="hover:text-blue-400 transition-colors"
                                >
                                    Home
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('products') }}"
                                    class="hover:text-blue-400 transition-colors"
                                >
                                    Products
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('contact') }}"
                                    class="hover:text-blue-400 transition-colors"
                                >
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('blog') }}"
                                    class="hover:text-blue-400 transition-colors"
                                >
                                    Blog
                                </a>
                            </li>
                            @auth
                                <li>
                                    <a
                                        href="{{ route('profile.edit') }}"
                                        class="hover:text-blue-400 transition-colors"
                                    >
                                        Profile
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>

                    <!-- Column 3: Social Media -->
                    <div>
                        <h4 class="text-lg font-semibold mb-3 text-white">Follow Us</h4>
                        <p class="text-sm text-gray-300 mb-4">
                            Stay connected through our social channels!
                        </p>
                        <div class="flex space-x-4">
                            <!-- Example social icons (Font Awesome or Heroicons) -->
                            <a
                                href="#"
                                class="p-2 bg-gray-800 rounded-full hover:bg-blue-500 transition-colors"
                                aria-label="Facebook"
                            >
                                <!-- Facebook Icon -->
                                <svg 
                                    class="h-5 w-5 text-gray-300 hover:text-white" 
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M22.675 0H1.325C.594 0 0 .593 0 1.326v21.348C0 23.406.594 24 1.325 24h11.495v-9.294H9.847v-3.622h2.973V8.413c0-2.94 1.798-4.536 4.42-4.536 1.256 0 2.336.093 2.648.135v3.07h-1.818c-1.429 0-1.705.678-1.705 1.673v2.194h3.417l-.446 3.622h-2.971V24h5.82c.73 0 1.325-.594 1.325-1.326V1.326C24 .593 23.406 0 22.675 0z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="#"
                                class="p-2 bg-gray-800 rounded-full hover:bg-blue-500 transition-colors"
                                aria-label="Twitter"
                            >
                                <!-- Twitter Icon -->
                                <svg
                                    class="h-5 w-5 text-gray-300 hover:text-white"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M24 4.557a9.83 9.83 0 01-2.828.775 4.93 4.93 0 002.165-2.723c-.951.555-2.002.96-3.127 1.184A4.927 4.927 0 0016.616 3c-2.72 0-4.928 2.206-4.928 4.925 0 .386.044.76.128 1.121-4.096-.206-7.722-2.172-10.15-5.165a4.848 4.848 0 00-.666 2.475c0 1.706.869 3.213 2.188 4.096a4.913 4.913 0 01-2.23-.616v.06c0 2.385 1.693 4.374 3.946 4.828a4.963 4.963 0 01-2.224.084 4.928 4.928 0 004.598 3.417A9.868 9.868 0 010 19.54 13.94 13.94 0 007.548 21c9.056 0 14.01-7.512 14.01-14.014 0-.213-.004-.426-.013-.637A9.976 9.976 0 0024 4.557z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="#"
                                class="p-2 bg-gray-800 rounded-full hover:bg-blue-500 transition-colors"
                                aria-label="Instagram"
                            >
                                <!-- Instagram Icon -->
                                <svg
                                    class="h-5 w-5 text-gray-300 hover:text-white"
                                    fill="currentColor"
                                    viewBox="0 0 512 512"
                                >
                                    <path
                                        d="M349.33 69.33H162.67A93.36 93.36 0 0069.33 162.67v186.66a93.36 93.36 0 0093.34 93.34h186.66a93.36 93.36 0 0093.34-93.34V162.67a93.36 93.36 0 00-93.34-93.34zm64 280a64.07 64.07 0 01-64 64H162.67a64.07 64.07 0 01-64-64V162.67a64.07 64.07 0 0164-64h186.66a64.07 64.07 0 0164 64zm0-224a16 16 0 11-16-16 16 16 0 0116 16z"
                                    />
                                    <path
                                        d="M256 144a112 112 0 10112 112 112 112 0 00-112-112zm0 176a64 64 0 1164-64 64 64 0 01-64 64z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="border-t border-gray-800 mt-8 pt-4">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <p class="text-sm text-gray-400">
                            &copy; {{ date('Y') }} GroceriFy. All rights reserved.
                        </p>
                        <p class="text-sm text-gray-400 mt-2 md:mt-0">
                            Built with <span class="text-red-500">&hearts;</span> for the community.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- Livewire Scripts -->
        @livewireScripts
    </body>
</html>
