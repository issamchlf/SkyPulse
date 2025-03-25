<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SkyPulse') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">


        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-blue-100 dark:bg-blue-900">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-blue-500 shadow opacity-85">
                    <div class="max-w-7xl mx-auto py-4 px-4">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <footer class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 text-white pt-12 pb-8 px-4 md:px-8 lg:px-16 w-full">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div class="space-y-4">
                    <h3 class="text-2xl font-orbitron-bold text-white mb-4">SkyPulse</h3>
                    <p class="text-blue-100 text-sm leading-relaxed">
                        Redefining travel experiences since 2025. Explore the world with confidence and style.
                    </p>
                    <div class="flex space-x-2 mt-4">
                        <span class="text-xs font-semibold bg-blue-600 text-white px-3 py-1 rounded-full">Certified</span>
                        <span class="text-xs font-semibold bg-blue-600 text-white px-3 py-1 rounded-full">Eco-Friendly</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <h4 class="text-lg font-orbitron text-white mb-2">Explore</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('flights') }}" class="text-blue-100 hover:text-white transition-colors">Destinations</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Special Offers</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Travel Guides</a></li>
                        <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Loyalty Program</a></li>
                    </ul>
                </div>
                <div class="space-y-3">
                    <h4 class="text-lg font-orbitron text-white mb-2">Connect</h4>
                    <div class="space-y-2 text-blue-100">
                        <p class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            contact@skypulse.com
                        </p>
                        <p class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            +212 600 000 000
                        </p>
                    </div>
                </div>
                <div class="space-y-3">
                    <h4 class="text-lg font-orbitron text-white mb-2">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="p-2 bg-blue-600 rounded-full hover:bg-blue-900 transition-colors">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="p-2 bg-blue-600 rounded-full hover:bg-blue-900 transition-colors">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg>
                        </a>
                        <a href="#" class="p-2 bg-blue-600 rounded-full hover:bg-blue-900 transition-colors">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-blue-600 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center text-blue-100 text-sm">
                    <p class="mb-4 md:mb-0">
                        © 2025 <span class="text-white">SkyPulse</span>. All rights reserved.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                        <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</html>
