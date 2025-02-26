<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-gradient-to-r from-indigo-600 to-purple-500 p-4 rounded-xl shadow-2xl">
            {{ __('SkyPulse Travel Portal') }} ✈️🌍
        </h2>
    </x-slot>

    <div class="relative bg-gradient-to-br from-indigo-500 to-purple-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-6 animate-fade-in">
                    Where Will You Explore Next? 🌟
                </h1>
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-2xl">
                    <div class="flex space-x-4 mb-6 border-b border-gray-200 dark:border-gray-700">
                        <button class="px-6 py-3 font-semibold text-indigo-600 dark:text-indigo-400 border-b-2 border-indigo-500">Flights</button>
                        
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="relative">
                            <input type="text" placeholder="From" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-2 focus:ring-indigo-500" />
                            <span class="absolute right-3 top-3 text-gray-400">✈️</span>
                        </div>
                        <div class="relative">
                            <input type="text" placeholder="To" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-2 focus:ring-indigo-500" />
                            <span class="absolute right-3 top-3 text-gray-400">🌍</span>
                        </div>
                        <div class="relative">
                            <input type="date" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-2 focus:ring-indigo-500" />
                            <span class="absolute right-3 top-3 text-gray-400">📅</span>
                        </div>
                        <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold transition-all transform hover:scale-105">
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

    <div class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($flights as $flight)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-shadow">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h4 class="text-xl font-bold text-white">{{ $flight->departure_airport }} → {{ $flight->arrival_airport }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">• {{ $flight->available_seats }} seats available</p>
                                </div>
                                <img src="{{ asset('img/' . $flight->airline_logo) }}" class="w-16 h-16" alt="{{ $flight->flight_number }}" />
                            </div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="text-center">
                                    <p class="font-bold text-2xl">{{ $flight->departure_code }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y, H:i') }}</p>
                                </div>
                                <div class="text-center mx-4">
                                    @php
                                        $departure = \Carbon\Carbon::parse($flight->departure_time);
                                        $arrival = \Carbon\Carbon::parse($flight->arrival_time);
                                        $duration = $departure->diff($arrival)->format('%Hh %Im');
                                    @endphp
                                    <p class="text-sm text-gray-600 dark:text-gray-400">🕓 {{ $duration }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $flight->stops }}</p>
                                </div>
                                <div class="text-center">
                                    <p class="font-bold text-2xl">{{ $flight->arrival_code }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($flight->arrival_time)->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="space-y-1">
                                    <p class="text-3xl font-bold text-indigo-600">${{ $flight->price }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $flight->trip_type }}</p>
                                </div>
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                                    Select ➔
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
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
        .range-slider::-webkit-slider-thumb {
            width: 1.25rem;
            height: 1.25rem;
            background-color: #4f46e5;
            border-radius: 9999px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .range-slider::-webkit-slider-thumb:hover {
            background-color: #4338ca;
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
