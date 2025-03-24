<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-gradient-to-r from-purple-600 to-indigo-500 p-4 rounded-xl shadow-2xl transform transition hover:scale-105">
            {{ __('Travel Dashboard') }} ✈️🌐
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Upcoming Flights Card -->
                <div class="bg-gradient-to-br from-indigo-100 to-purple-50 dark:from-gray-800 dark:to-gray-700 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 dark:text-gray-300 mb-2">Upcoming Flights</p>
                            <p class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">2</p>
                        </div>
                        <div class="p-3 bg-indigo-100 dark:bg-indigo-900 rounded-full transform group-hover:rotate-12 transition">
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('flights') }}" class="mt-4 inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors">
                        <span>View All</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <!-- Total Bookings Card -->
                <div class="bg-gradient-to-br from-purple-100 to-pink-50 dark:from-gray-800 dark:to-gray-700 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 dark:text-gray-300 mb-2">Total Bookings</p>
                            <p class="text-4xl font-bold text-purple-600 dark:text-purple-400">0</p>
                        </div>
                        <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-full transform group-hover:rotate-12 transition">
                            <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('flights') }}" class="mt-4 inline-flex items-center text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300 transition-colors">
                        <span>View History</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <!-- Add more stat cards here -->
            </div>

            <!-- Quick Action Section -->
            <div class="mb-8">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-8 rounded-2xl shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-16 -mr-16 opacity-20">
                        <svg class="w-64 h-64 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Ready for Your Next Adventure?</h3>
                    <a href="{{ route('flights') }}" class="inline-flex items-center px-8 py-4 bg-white text-indigo-600 rounded-xl font-bold hover:bg-gray-100 transition-all transform hover:scale-105">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Book New Flight
                    </a>
                </div>
            </div>

            <!-- Recent Bookings Section -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold">Recent Bookings ✈️</h3>
                    <a href="{{ route('flights') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">View All</a>
                </div>

                <div class="space-y-4">
                    <!-- Booking Item -->
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 group">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-indigo-100 dark:bg-indigo-900 rounded-lg">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold">Paris Getaway</h4>
                                <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span>SW 235</span>
                                    <span class="text-xs">•</span>
                                    <span>Nov 15, 2023</span>
                                    <span class="text-xs">•</span>
                                    <span>09:45 AM</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Confirmed
                            </span>
                            <a href="{{ route('flights') }}" class="text-indigo-600 hover:text-indigo-800 dark:hover:text-indigo-400 transition-colors">
                                View Details
                            </a>
                        </div>
                    </div>

                    <!-- Add more booking items here -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>