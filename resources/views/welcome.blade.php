<!DOCTYPE html>
@php
    $supportedLocales = ['en', 'es', 'fr', 'de'];
    $locale = str_replace('_', '-', app()->getLocale());
    $lang = in_array($locale, $supportedLocales) ? $locale : 'en';
@endphp
<html lang="{{ $lang }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkyPulse</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-blue-200 dark:text-white">
    <header class="flex items-center justify-between bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 py-4 px-8 relative z-10 shadow-blue-500/50 opacity-85">
        <div class="flex items-center">
            <svg width="180" height="50" viewBox="50 9 300 90" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="textGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#ffffff" />
                        <stop offset="50%" stop-color="#ffffff" />
                        <stop offset="100%" stop-color="#ffffff" />
                    </linearGradient>
                    <filter id="glow">
                        <feGaussianBlur stdDeviation="2" result="coloredBlur" />
                        <feMerge>
                            <feMergeNode in="coloredBlur" />
                            <feMergeNode in="SourceGraphic" />
                        </feMerge>
                    </filter>
                    
                </defs>
                <rect width="300" height="100" fill="none" rx="8" />
                <text x="50%" y="60%" class="title" text-anchor="middle" dominant-baseline="middle">
                    <animate attributeName="opacity" values="1;0.9;1" dur="2s" repeatCount="indefinite" />
                    SkyPulse
                </text>
                <path class="pulse" d="M30 70 Q75 50 120 70 Q165 90 210 60 Q255 30 270 70" transform="translate(0 10)" />
            </svg>
        </div>
        @if (Route::has('login'))
        <div class="relative">
            <button id="menu-toggle" class="md:hidden flex items-center px-3 py-2 border rounded text-white border-white hover:text-blue-300 hover:border-blue-300 font-orbitron" aria-label="Toggle navigation" aria-expanded="false" aria-controls="main-menu">
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z" />
                </svg>
            </button>
            <nav id="menu" class="hidden md:flex md:space-x-4 lg:space-x-6 absolute right-0 mt-2 md:mt-0 md:relative bg-blue-600 md:bg-transparent w-48 md:w-auto shadow-lg md:shadow-none" role="navigation">
                @auth
                    <a href="{{ url('/dashboard') }}" class="block md:inline-block rounded-md px-4 py-2 text-white hover:bg-blue-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#FEE715] font-orbitron">Dashboard</a>
                @else
                    <button class="md:hidden absolute top-2 right-2 text-white hover:text-blue-200" aria-label="Close menu" onclick="toggleMenu()">✕</button>
                    <a href="{{ route('login') }}" class="block md:inline-block rounded-md px-4 py-2 text-white hover:bg-blue-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#FEE715] font-orbitron-bold">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block md:inline-block rounded-md px-4 py-2 text-white hover:bg-blue-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#FEE715] font-orbitron-bold">Register</a>
                    @endif
                    <a href="{{ url('/admin/login') }}" class="block md:inline-block rounded-md px-4 py-2 bg-[#50afff] text-gray-900 hover:bg-[#0f44be] transition-colors duration-200 font-orbitron-bold border-2 border-[#50afff] hover:border-[#0f44be] focus:outline-none focus:ring-2 focus:ring-white">Admin</a>
                @endauth
            </nav>
        </div>
        @endif
        
    </header>
    <div class="h-8"></div>
    <div class="bg-gray-50 text-black/50 dark:bg-blue-200 dark:text-white/50">
        <img id="background" class="absolute inset-0 w-full h-full object-cover blur-sm" src="{{ asset('img/sun.jpg') }}" alt="Skypulse background" />
        <div class="relative min-h-full flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main>
                    <section class="relative flex flex-col md:flex-row items-center justify-between">
                        <div class="max-w-lg space-y-6">
                            <p class="text-sm uppercase ml-2 text-blue-900 tracking-widest">Elevate Your Travel Journey</p>
                            <h1 class="text-5xl font-bold text-blue-900">Experience The Magic Of Flight!</h1>
                            <button class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-700 font-orbitron">Book A Trip Now</button>
                        </div>
                        <div class="w-full md:w-1/2 mt-4 md:mt-0 ml-2">
                            <img src="{{ asset('img/plane2.png') }}" alt="Airplane" class="w-full">
                        </div>
                    </section>
                    <section class="py-8">
                        <div class="max-w-7xl mx-auto px-6">
                            <h2 class="text-3xl font-bold text-center text-blue-900">Why Choose Us?</h2>
                            <p class="text-center text-gray-700 mt-2">We provide the best travel experience with top-notch services.</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                                <div class="bg-blue-100 rounded-lg shadow-xl p-6 transform transition hover:scale-105">
                                    <h3 class="text-xl font-semibold text-blue-800">Affordable Prices</h3>
                                    <p class="text-gray-600 mt-2">Get the best deals on flights and travel packages.</p>
                                </div>
                                <div class="bg-blue-100 rounded-lg shadow-xl p-6 transform transition hover:scale-105">
                                    <h3 class="text-xl font-semibold text-blue-800">24/7 Customer Support</h3>
                                    <p class="text-gray-600 mt-2">We are here to assist you anytime, anywhere.</p>
                                </div>
                                <div class="bg-blue-100 rounded-lg shadow-xl p-6 transform transition hover:scale-105">
                                    <h3 class="text-xl font-semibold text-blue-800">Top Destinations</h3>
                                    <p class="text-gray-600 mt-2">Explore the most popular travel destinations around the world.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="max-w-7xl mx-auto px-6 py-10">
                        <section class="px-4">
                            <h2 class="text-3xl font-bold text-blue-900">Popular Destination</h2>
                            <p class="text-gray-500">Unleash Your Wanderlust With SkyWings</p>
                            <div class="flex gap-8 overflow-x-auto mt-6 snap-x snap-mandatory pb-4 hide-scrollbar">
                                <div class="min-w-[16rem] bg-blue-300 rounded-lg shadow-lg p-4 snap-start flex-shrink-0">
                                    <img src="{{ asset('img/chawen2.JPG') }}" 
                                         class="rounded-lg w-full h-32 object-cover" 
                                         alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">The Blue City</h3>
                                    <p class="text-gray-500 text-sm">Chefchaouen, Morocco</p>
                                </div>
                        
                                <div class="min-w-[16rem] bg-blue-300 rounded-lg shadow-lg p-4 snap-start flex-shrink-0">
                                    <img src="{{ asset('img/dubai.jpg') }}" 
                                         class="rounded-lg w-full h-32 object-cover" 
                                         alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">Khalifa Tour</h3>
                                    <p class="text-gray-500 text-sm">Dubai, Emirates</p>
                                </div>
                                <div class="min-w-[16rem] bg-blue-300 rounded-lg shadow-lg p-4 snap-start flex-shrink-0">
                                    <img src="{{ asset('img/sahara.png') }}" 
                                         class="rounded-lg w-full h-32 object-cover" 
                                         alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">Grand Sahara</h3>
                                    <p class="text-gray-500 text-sm">Merzouga, Morocco</p>
                                </div>                        
                                <div class="min-w-[16rem] bg-blue-300 rounded-lg shadow-lg p-4 snap-start flex-shrink-0">
                                    <img src="{{ asset('img/thailand.jpg') }}" 
                                         class="rounded-lg w-full h-32 object-cover" 
                                         alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">Toub Kaak Beach</h3>
                                    <p class="text-gray-500 text-sm">Krabi, Thailand</p>
                                </div>                        
                                <div class="min-w-[16rem] bg-blue-300 rounded-lg shadow-lg p-4 snap-start flex-shrink-0">
                                    <img src="{{ asset('img/barcelona.jpg') }}" 
                                         class="rounded-lg w-full h-32 object-cover" 
                                         alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">Sagrada Família</h3>
                                    <p class="text-gray-500 text-sm">Barcelona, Spain</p>
                                </div>
                            </div>
                        </section>
                        
                        <section class="mt-16 flex flex-col md:flex-row items-center gap-6">
                            <img src="{{ asset('img/seat.jpg') }}" class="rounded-lg shadow-lg w-full md:w-auto" alt="Promo">
                            <div>
                                <h2 class="text-blue-900 text-4xl font-bold">UNLEASH WANDERLUST WITH SKYWINGS</h2>
                                <p class="text-gray-500">Explore new places and experience different cultures.</p>
                                <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg font-orbitron">Book A Flight Now</button>
                            </div>
                        </section>
                    </div>
                </main>
            </div>
        </div>
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
