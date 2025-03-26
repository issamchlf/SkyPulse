<x-app-layout>
    <div class="min-h-screen bg-gray-900 py-8">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            @if(session('success'))
            <div id="successMessage" class="mb-6 rounded-lg border border-emerald-500/30 bg-emerald-900/20 p-4 text-emerald-300 shadow-lg transition-opacity duration-500">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <svg class="h-6 w-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm">{{ session('success') }}</span>
                    </div>
                    <div class="h-1 w-24 overflow-hidden rounded-full bg-emerald-900/30">
                        <div id="progressBar" class="h-full bg-emerald-500 transition-all duration-3000"></div>
                    </div>
                </div>
            </div>
            @endif

            <div class="mb-8 border-b border-gray-700 pb-6">
                <h1 class="text-3xl font-bold text-white sm:text-4xl">
                    <span class="bg-gradient-to-r from-indigo-400 to-cyan-400 bg-clip-text text-transparent">
                        Create New Flight
                    </span>
                </h1>
                <p class="mt-2 text-gray-400">Fill in the details to schedule a new flight</p>
            </div>

            <form action="{{ route('store.flight') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="space-y-4">
                        <div>
                            <label for="plane_id" class="block text-sm font-medium text-gray-300">Plane ID</label>
                            <input type="number" id="plane_id" name="plane_id" required
                                   class="mt-1 block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-white shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 hover:border-gray-600">
                        </div>
                        <div>
                            <label for="flight_number" class="block text-sm font-medium text-gray-300">Flight Number</label>
                            <input type="text" id="flight_number" name="flight_number" required
                                   class="mt-1 block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-white shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 hover:border-gray-600">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="departure_airport" class="block text-sm font-medium text-gray-300">Departure Airport</label>
                            <input type="text" id="departure_airport" name="departure_airport" required
                                   class="mt-1 block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-white shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 hover:border-gray-600">
                        </div>
                        <div>
                            <label for="arrival_airport" class="block text-sm font-medium text-gray-300">Arrival Airport</label>
                            <input type="text" id="arrival_airport" name="arrival_airport" required
                                   class="mt-1 block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-white shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 hover:border-gray-600">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="departure_time" class="block text-sm font-medium text-gray-300">Departure Time</label>
                        <input type="datetime-local" id="departure_time" name="departure_time" required
                               class="mt-1 block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-white shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 hover:border-gray-600">
                    </div>
                    <div>
                        <label for="arrival_time" class="block text-sm font-medium text-gray-300">Arrival Time</label>
                        <input type="datetime-local" id="arrival_time" name="arrival_time" required
                               class="mt-1 block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-white shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 hover:border-gray-600">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="available_seats" class="block text-sm font-medium text-gray-300">Available Seats</label>
                        <input type="number" id="available_seats" name="available_seats" required
                               class="mt-1 block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-white shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 hover:border-gray-600">
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-300">Price</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">$</span>
                            <input type="number" step="0.01" id="price" name="price" required
                                   class="block w-full rounded-lg border border-gray-700 bg-gray-800 pl-8 pr-4 py-3 text-white shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 hover:border-gray-600">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-300">Flight Status</label>
                    <select id="status" name="status" required
                            class="mt-1 block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-white shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 hover:border-gray-600">
                        <option value="1" class="bg-gray-800">Active</option>
                        <option value="0" class="bg-gray-800">Inactive</option>
                    </select>
                </div>

                <div class="border-t border-gray-700 pt-6">
                    <button type="submit" 
                            class="flex w-full items-center justify-center space-x-2 rounded-lg bg-gradient-to-r from-indigo-500 to-blue-500 px-6 py-4 font-semibold text-white shadow-lg transition-transform hover:scale-[1.02] md:w-auto md:px-8">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span>Create Flight</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const progressBar = document.getElementById('progressBar');
            if(progressBar) {
                progressBar.style.width = '0%';
                setTimeout(() => {
                    progressBar.style.width = '100%';
                }, 50);
            }

            setTimeout(() => {
                const successMessage = document.getElementById('successMessage');
                if(successMessage) {
                    successMessage.style.opacity = '0';
                    setTimeout(() => {
                        window.location.href = "{{ route('admin.dashboard') }}";
                    }, 500);
                }
            }, 3000);
        });
    </script>
    @endif
</x-app-layout>
