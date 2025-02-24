<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SkyPulse</title>

    <!-- Fonts -->
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
                <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
                <feMerge>
                  <feMergeNode in="coloredBlur"/>
                  <feMergeNode in="SourceGraphic"/>
                </feMerge>
              </filter>
              
              <style>
                @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap');
                
                .title {
                  font: 600 32px 'Orbitron', sans-serif;
                  fill: url(#textGradient);
                  text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
                  letter-spacing: 2px;
                }
              
                .pulse {
                  fill: none;
                  stroke: url(#textGradient);
                  stroke-width: 2;
                  stroke-linecap: round;
                  filter: url(#glow);
                  animation: pulse 1.5s ease-in-out infinite;
                }
              
                @keyframes pulse {
                  0% { stroke-width: 2; opacity: 1; }
                  50% { stroke-width: 3; opacity: 0.8; }
                  100% { stroke-width: 2; opacity: 1; }
                }
              </style>
            </defs>
              
            <rect width="300" height="100" fill="none" rx="8"/>
              
            <text x="50%" y="60%" class="title" text-anchor="middle" dominant-baseline="middle">
              <animate attributeName="opacity" values="1;0.9;1" dur="2s" repeatCount="indefinite"/>
              SkyPulse
            </text>
              
            <path class="pulse" d="M30 70 
                          Q75 50 120 70
                          Q165 90 210 60
                          Q255 30 270 70" 
                  transform="translate(0 10)"/>
              
            
              </svg>
        </div>

        @if (Route::has('login'))
            <nav class="flex space-x-6">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-4 py-2 text-white ring-1 ring-transparent transition hover:bg-blue-700 focus:outline-none focus-visible:ring-[#FEE715]">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}"
                       class="rounded-md px-4 py-2 text-white ring-1 ring-transparent transition hover:bg-blue-700 focus:outline-none focus-visible:ring-[#FEE715] font-orbitron">
                        Log in
                    </a>
                
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="rounded-md px-4 py-2 text-white ring-1 ring-transparent transition hover:bg-blue-700 focus:outline-none focus-visible:ring-[#FEE715] font-orbitron">
                            Register
                        </a>
                    @endif
                @endauth
                

                <a href="{{ url('/admin/login') }}"
                    class="rounded-md px-4 py-2 bg-blue-500 text-white ring-1 ring-transparent transition hover:bg-blue-700 focus:outline-none focus-visible:ring-[#FEE715] font-orbitron">
                    Admin
                </a>
            </nav>
        @endif
    </header>


    <div class="h-8"></div> 

    <div class="bg-gray-50 text-black/50 dark:bg-blue-200 dark:text-white/50">
        <img id="background" class="absolute inset-0 w-full h-full object-cover blur-sm"
            src="{{ asset('img/sun.jpg') }}" alt="Skypulse background" />

        <div
            class="relative min-h-full flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main>
                    <section class="relative flex flex-col md:flex-row items-center justify-between">
                        <div class="max-w-lg space-y-6">
                            <p class="text-sm uppercase ml-2 text-blue-900 tracking-widest">Elevate Your Travel Journey
                            </p>
                            <h1 class=" text-5xl font-bold text-blue-900">Experience The Magic Of Flight!</h1>
                            <button class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-700 font-orbitron">Book A Trip
                                Now</button>
                        </div>
                        <div class="w-full md:w-1/2 mt-4 md:mt-0 ml-2">
                            <img src="{{ asset('img/plane2.png') }}" alt="Airplane" class="w-full">
                        </div>
                    </section>
                    <section class="py-8">
                        <div class="max-w-7xl mx-auto px-6">
                            <h2 class="text-3xl font-bold text-center text-blue-900">Why Choose Us?</h2>
                            <p class="text-center text-gray-700 mt-2">
                                We provide the best travel experience with top-notch services.
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                                <div class="bg-blue-100 rounded-lg shadow-xl p-6 transform transition hover:scale-105">
                                    <h3 class="text-xl font-semibold text-blue-800">Affordable Prices</h3>
                                    <p class="text-gray-600 mt-2">
                                        Get the best deals on flights and travel packages.
                                    </p>
                                </div>
                                <div class="bg-blue-100 rounded-lg shadow-xl p-6 transform transition hover:scale-105">
                                    <h3 class="text-xl font-semibold text-blue-800">24/7 Customer Support</h3>
                                    <p class="text-gray-600 mt-2">
                                        We are here to assist you anytime, anywhere.
                                    </p>
                                </div>
                                <div class="bg-blue-100 rounded-lg shadow-xl p-6 transform transition hover:scale-105">
                                    <h3 class="text-xl font-semibold text-blue-800">Top Destinations</h3>
                                    <p class="text-gray-600 mt-2">
                                        Explore the most popular travel destinations around the world.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>






                    <div class="max-w-7xl mx-auto px-6 py-10">
                        <section>
                            <h2 class="text-3xl font-bold text-blue-900 ">Popular Destination</h2>
                            <p class="text-gray-500">Unleash Your Wanderlust With SkyWings</p>
                            <div class="flex gap-4 overflow-x-auto mt-6">
                                <div class="w-64 bg-blue-100 rounded-lg shadow-lg p-4">
                                    <img src="{{ asset('img/chawen2.JPG') }}" class="rounded-lg w-full"
                                        alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">The Blue City</h3>
                                    <p class="text-gray-500 text-sm">Chefchaouen, Morocco</p>
                                </div>
                                <div class="w-64 bg-blue-100 rounded-lg shadow-lg p-4">
                                    <img src="{{ asset('img/dubai.jpg') }}" class="rounded-lg w-full" alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">Khalifa Tour</h3>
                                    <p class="text-gray-500 text-sm">Dubai, Emarates</p>
                                </div>
                                <div class="w-64 bg-blue-100 rounded-lg shadow-lg p-4">
                                    <img src="{{ asset('img/sahara.png') }}" class="rounded-lg w-full"
                                        alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">Grand Sahara</h3>
                                    <p class="text-gray-500 text-sm">Merzouga, Morocco</p>
                                </div>
                                <div class="w-64 bg-blue-100 rounded-lg shadow-lg p-4">
                                    <img src="{{ asset('img/thailand.jpg') }}" class="rounded-lg w-full"
                                        alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">Toub Kaak Beach</h3>
                                    <p class="text-gray-500 text-sm">Krabi, Thailand</p>
                                </div>
                                <div class="w-64 bg-blue-100 rounded-lg shadow-lg p-4">
                                    <img src="{{ asset('img/barcelona.jpg') }}" class="rounded-lg w-full"
                                        alt="Destination">
                                    <h3 class="text-blue-900 font-semibold mt-2">Sagrada Família</h3>
                                    <p class="text-gray-500 text-sm">Barcelona, Spain</p>
                                </div>
                            </div>
                        </section>
                        <section class="mt-16 flex flex-col md:flex-row items-center gap-6">
                            <img src="{{ asset('img/seat.jpg') }}" class="rounded-lg shadow-lg" alt="Promo">
                            <div>
                                <h2 class="text-blue-900 text-4xl font-bold">UNLEASH WANDERLUST WITH SKYWINGS</h2>
                                <p class="text-gray-500">Explore new places and experience different cultures.</p>
                                <button class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg font-orbitron">Book A Flight
                                    Now</button>
                            </div>
                        </section>
                    </div>

                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
