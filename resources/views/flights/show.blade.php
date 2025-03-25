<x-app-layout>


    <div class="relative bg-gradient-to-b from-sky-100 to-blue-50 min-h-screen py-12 overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute -top-20 -right-20 w-72 h-72 bg-blue-200 rounded-full opacity-20 mix-blend-multiply"></div>
        <div class="absolute -bottom-40 -left-20 w-96 h-96 bg-sky-200 rounded-full opacity-20 mix-blend-multiply"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Flight Card -->
            <div class="bg-white rounded-3xl p-8 shadow-2xl transform transition-all hover:shadow-3xl">
                <!-- Flight Header -->
                <div class="flex items-center justify-between mb-8 border-b-2 border-blue-50 pb-6">
                    <div>
                        <h1 class="text-4xl font-extrabold text-gray-900">
                            {{ $flight->departure_airport }} 
                            <span class="text-blue-500 mx-3">→</span> 
                            {{ $flight->arrival_airport }}
                        </h1>
                        <p class="mt-2 text-blue-500 font-semibold">
                            {{ $flight->plane->name }} • {{ $flight->plane->capacity }} seats
                        </p>
                    </div>
                    <img src="{{ $flight->plane->picture }}" class="w-24 h-24 rounded-full border-4 border-white shadow-lg" alt="Aircraft">
                </div>

                <!-- Flight Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <!-- Departure Card -->
                    <div class="bg-blue-50 p-6 rounded-xl">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-blue-500 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </div>
                            <p class="text-lg font-bold text-blue-600">Departure</p>
                        </div>
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y') }}
                        </p>
                        <p class="text-blue-500 font-medium">
                            {{ \Carbon\Carbon::parse($flight->departure_time)->format('H:i') }} Local Time
                        </p>
                    </div>

                    <!-- Arrival Card -->
                    <div class="bg-blue-50 p-6 rounded-xl">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="bg-green-500 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <p class="text-lg font-bold text-green-600">Arrival</p>
                        </div>
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($flight->arrival_time)->format('d M Y') }}
                        </p>
                        <p class="text-green-500 font-medium">
                            {{ \Carbon\Carbon::parse($flight->arrival_time)->format('H:i') }} Local Time
                        </p>
                    </div>
                </div>

                <!-- Pricing Section -->
                <div class="bg-blue-900 text-white p-6 rounded-xl mb-8 transform transition hover:scale-[1.01]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-blue-200">Total for</p>
                            <p class="text-2xl font-bold">Passengers</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-blue-200">Price per seat</p>
                            <p class="text-3xl font-bold">${{ number_format($flight->price, 2) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Reservation Form -->
                <form action="{{ route('flights.book', $flight->id) }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="bg-blue-50 p-6 rounded-xl">
                        <div class="flex items-center justify-between gap-6">
                            <div class="flex-1">
                                <label class="block text-lg font-semibold text-blue-900 mb-3">
                                    Select Seats <span class="text-sm text-blue-500">(Available: {{ $flight->available_seats }})</span>
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        name="seats" 
                                        min="1" 
                                        max="{{ $flight->available_seats }}" 
                                        required
                                        class="w-full px-6 py-4 border-0 rounded-xl text-2xl font-bold text-blue-900 bg-white shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-blue-500"
                                        x-data="{ seats: 1 }"
                                        x-model.number="seats"
                                        x-on:input="seats = Math.min(Math.max(seats, 1), {{ $flight->available_seats }})"
                                    >
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                        <span class="text-blue-500 font-bold">Seats</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-sm text-blue-500 mb-2">Total Price</p>
                                <p class="text-3xl font-bold text-blue-900" x-text="`$${({{ $flight->price }} * seats).toFixed(2)}`"></p>
                            </div>
                        </div>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full py-5 px-8 bg-gradient-to-r from-blue-500 to-sky-600 hover:from-blue-600 hover:to-sky-700 text-white font-bold text-xl rounded-xl transition-all transform hover:scale-[1.02] shadow-lg hover:shadow-xl flex items-center justify-center gap-3"
                    >
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Confirm Reservation
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Alpine.js for dynamic price calculation -->
    <script src="https://unpkg.com/alpinejs" defer></script>
</x-app-layout>