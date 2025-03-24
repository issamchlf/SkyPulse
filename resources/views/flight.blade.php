<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-deep-blue leading-tight bg-light-blue p-4 rounded-xl shadow-2xl">
            {{ __('SkyPulse Travel Portal') }} ✈️🌍
        </h2>
    </x-slot>

    <div class="relative bg-bright-blue py-16 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-6 animate-fade-in">
                    Where Will You Explore Next? 🌟
                </h1>
                <div class="bg-blue-gray rounded-2xl p-6 shadow-2xl">
                    <div class="flex justify-center space-x-4 mb-6 border-b border-blue-gray/50">
                        <button class="px-6 py-3 font-semibold text-deep-blue border-b-2 border-deep-blue">
                            Flights
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="relative">
                            <input type="text" placeholder="From" class="w-full px-4 py-3 rounded-lg border border-blue-gray/50 bg-light-blue focus:ring-2 focus:ring-deep-blue" />
                            <span class="absolute right-3 top-3 text-gray-500">✈️</span>
                        </div>
                        <div class="relative">
                            <input type="text" placeholder="To" class="w-full px-4 py-3 rounded-lg border border-blue-gray/50 bg-light-blue focus:ring-2 focus:ring-deep-blue" />
                            <span class="absolute right-3 top-3 text-gray-500">🌍</span>
                        </div>
                        <div class="relative">
                            <input type="date" class="w-full px-4 py-3 rounded-lg border border-blue-gray/50 bg-light-blue focus:ring-2 focus:ring-deep-blue" />
                            <span class="absolute right-3 top-3 text-gray-500">📅</span>
                        </div>
                        <button class="w-full bg-gradient-to-r from-deep-blue to-navy-blue hover:from-deep-blue hover:to-navy-blue text-white py-3 rounded-lg font-semibold transition transform hover:scale-105">
                            Search Flights 🔍
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute w-96 h-96 bg-purple-400/10 rounded-full blur-3xl -top-48 -left-48 animate-blob"></div>
            <div class="absolute w-96 h-96 bg-indigo-400/10 rounded-full blur-3xl -top-48 -right-48 animate-blob animation-delay-2000"></div>
        </div>
    </div>

    <div class="py-16 bg-bright-blue">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @foreach($flights as $flight)
                <div class="bg-gradient-to-r from-deep-blue to-navy-blue dark:from-deep-blue dark:to-navy-blue rounded-2xl p-6 shadow-xl hover:shadow-2xl transition transform hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h4 class="text-xl font-bold text-light-blue">
                                {{ $flight->departure_airport }} → {{ $flight->arrival_airport }}
                            </h4>
                            <p class="text-sm text-blue-gray">
                                • {{ $flight->plane->max_seats }} seats available
                            </p>
                        </div>
                        <img src="{{ $flight->plane->picture }}" class="w-16 h-16 rounded-full" alt="{{ $flight->flight_number }}" />
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-center">
                            <p class="font-bold text-2xl text-light-blue">{{ $flight->departure_code }}</p>
                            <p class="text-sm text-blue-gray">
                                {{ \Carbon\Carbon::parse($flight->departure_time)->format('d M, H:i') }}
                            </p>
                        </div>
                        <div class="text-center mx-4">
                            @php
                                $departure = \Carbon\Carbon::parse($flight->departure_time);
                                $arrival = \Carbon\Carbon::parse($flight->arrival_time);
                                $duration = $departure->diff($arrival)->format('%Hh %Im');
                            @endphp
                            <p class="text-sm text-blue-gray">🕓 {{ $duration }}</p>
                            <p class="text-sm text-blue-gray">{{ $flight->stops }}</p>
                        </div>
                        <div class="text-center">
                            <p class="font-bold text-2xl text-light-blue">{{ $flight->arrival_code }}</p>
                            <p class="text-sm text-blue-gray">
                                {{ \Carbon\Carbon::parse($flight->arrival_time)->format('d M, H:i') }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="space-y-1">
                            <p class="text-3xl font-bold text-blue-gray">${{ $flight->price }}</p>
                            <p class="text-sm text-blue-gray">{{ $flight->trip_type }}</p>
                        </div>
                        <button class="bg-gradient-to-r from-deep-blue to-navy-blue hover:from-deep-blue hover:to-navy-blue text-white px-6 py-3 rounded-lg font-semibold transition transform hover:scale-105">
                            Select ➔
                        </button>
                    </div>
                </div>
            @endforeach
            
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</x-app-layout>
