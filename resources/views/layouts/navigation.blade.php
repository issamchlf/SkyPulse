<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 py-4 px-8 relative z-10 shadow-blue-500/50 opacity-85">
    <!-- Primary Navigation Menu -->
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
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

                            <style>
                                @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap');

                                .title {
                                    font: 600 32px 'Orbitron', sans-serif;
                                    fill: url(#textGradient);
                                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
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
                                    0% {
                                        stroke-width: 2;
                                        opacity: 1;
                                    }

                                    50% {
                                        stroke-width: 3;
                                        opacity: 0.8;
                                    }

                                    100% {
                                        stroke-width: 2;
                                        opacity: 1;
                                    }
                                }
                            </style>
                        </defs>

                        <rect width="300" height="100" fill="none" rx="8" />

                        <text x="50%" y="60%" class="title" text-anchor="middle" dominant-baseline="middle">
                            <animate attributeName="opacity" values="1;0.9;1" dur="2s" repeatCount="indefinite" />
                            SkyPulse
                        </text>

                        <path class="pulse" d="M30 70
                                  Q75 50 120 70
                                  Q165 90 210 60
                                  Q255 30 270 70" transform="translate(0 10)" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="">
            {{ __('Dashboard') }}
            </x-nav-link>
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none transition ease-in-out duration-150 font-orbitron">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-blue-700 focus:outline-none transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-white font-orbitron">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white font-orbitron">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
