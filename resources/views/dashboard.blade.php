<x-app-layout>
    <div class="relative bg-gradient-to-b from-sky-100 to-blue-50 min-h-screen py-12 overflow-hidden">
        <div class="absolute -top-20 -right-20 w-72 h-72 bg-blue-500 rounded-full opacity-20 mix-blend-multiply"></div>
        <div class="absolute -bottom-40 -left-20 w-96 h-96 bg-sky-500 rounded-full opacity-20 mix-blend-multiply"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-blue-100 rounded-lg">✈️</div>
                            <p class="text-sm text-slate-500">Total Flights</p>
                        </div>
                        <p class="text-4xl font-bold text-slate-900 mb-1">{{ $totalFlights ?? 0 }}</p>
                        <p class="text-sm text-blue-600 font-medium">this month</p>
                    </div>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-50 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-green-100 rounded-lg">🌍</div>
                            <p class="text-sm text-slate-500">Miles Flown</p>
                        </div>
                        <p class="text-4xl font-bold text-slate-900 mb-1">{{ number_format($milesFlown ?? 0) }}</p>
                        <p class="text-sm text-green-600 font-medium">this month</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap gap-4 mt-6">
                <a href="{{ route('flights') }}" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Book New Flight
                </a>
                
                <a href="#" class="px-6 py-3 bg-white border border-slate-200 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:border-blue-200 flex items-center gap-2">
                    📜 View History
                </a>
                
                <a href="#" class="px-6 py-3 bg-white border border-slate-200 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:border-blue-200 flex items-center gap-2">
                    ⚙️ Account Settings
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 mt-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Recent Bookings
                    </h3>
                    <a href="{{ route('flights') }}" class="text-blue-600 hover:text-blue-700 font-medium flex items-center gap-1">
                        View All
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse ($recentBookings as $booking)
                    <div class="p-4 bg-slate-50 hover:bg-white rounded-lg border border-slate-100 transition-all duration-300 group">
                        <div class="flex items-center justify-between">
                            <div class="space-y-1">
                                <div class="flex items-center gap-3">
                                    <span class="text-lg font-semibold text-slate-900">{{ $booking->flight->flight_number ?? 'N/A' }}</span>
                                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $booking->status == 'Confirmed' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                                        {{ $booking->status ?? 'Pending' }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-4 text-sm text-slate-600">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $booking->flight->departure_time ?? 'N/A' }}
                                    </span>
                                    <span class="text-slate-400">•</span>
                                    <span>{{ $booking->flight->departure_airport ?? 'N/A' }} → {{ $booking->flight->arrival_airport ?? 'N/A' }}</span>
                                </div>
                            </div>
                            <button class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-slate-400 hover:text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @empty
                    <div class="text-center p-6 bg-slate-50 rounded-xl">
                        <p class="text-slate-500">No recent bookings found</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
