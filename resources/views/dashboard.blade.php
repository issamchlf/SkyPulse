<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-gradient-to-r from-purple-600 to-indigo-500 p-4 rounded-xl shadow-2xl">
            {{ __('Travel Dashboard') }} ✈️🌐
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 dark:text-gray-400">Upcoming Flights</p>
                            <p class="text-3xl font-bold text-indigo-600">2</p>
                        </div>
                        <div class="p-3 bg-indigo-100 dark:bg-indigo-900 rounded-full">
                            <span class="text-2xl">✈️</span>
                        </div>
                    </div>
                    <a href="{{ route('flights') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline mt-4 block">
                        View All →
                    </a>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 dark:text-gray-400">Total Bookings</p>
                            <p class="text-3xl font-bold text-purple-600">0</p>
                        </div>
                        <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-full">
                            <span class="text-2xl">📅</span>
                        </div>
                    </div>
                    <a href="{{ route('flights') }}" class="text-purple-600 dark:text-purple-400 hover:underline mt-4 block">
                        View History →
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6 rounded-2xl shadow-2xl">
                    <h3 class="text-xl font-bold text-white mb-4">Ready for Adventure?</h3>
                    <a href="{{ route('flights') }}" class="inline-flex items-center px-6 py-3 bg-white text-indigo-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        🚀 Book New Flight
                    </a>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6">
                <h3 class="text-xl font-bold mb-6">Recent Bookings ✈️</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <div>
                            <h4 class="font-semibold">Paris Getaway</h4>
                            <p class="text-sm text-gray-500">Flight #SW235 · Nov 15, 2023</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Confirmed</span>
                            <a href="{{ route('flights') }}" class="text-indigo-600 hover:underline">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
