<x-app-layout>
    <div class="flex-1 flex flex-col bg-gray-50">
        <div class="bg-white px-6 py-4 flex space-x-6 border-b border-gray-200 overflow-x-auto">
            <a href="#" class="whitespace-nowrap pb-2 px-4 font-semibold border-b-2 border-blue-600 text-blue-600 transition-all duration-300">
                <span class="block text-lg">Cheapest</span>
                <span class="text-sm font-medium text-blue-400">$217 - 5h 16m</span>
            </a>
            <a href="#" class="whitespace-nowrap pb-2 px-4 font-semibold border-b-2 border-transparent text-gray-500 hover:text-blue-600 hover:border-blue-400 transition-all duration-300">
                <span class="block text-lg">Quickest</span>
                <span class="text-sm font-medium text-gray-400">$350 - 3h 18m</span>
            </a>
        </div>

        <div class="flex-1 flex flex-col lg:flex-row overflow-hidden">
            <div class="flex-1 overflow-y-auto p-6 space-y-4">
                @forelse($flights as $flight)
                    @php
                        $departure = \Carbon\Carbon::parse($flight->departure_time);
                        $arrival = \Carbon\Carbon::parse($flight->arrival_time);
                        $duration = $departure->diff($arrival)->format('%Hh %Im');
                    @endphp
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 border border-gray-100">
                        <div class="flex-1">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('img/' . $flight->plane->picture) }}" alt="Airline Logo" class="w-12 h-12 rounded-lg border-2 border-white shadow-sm" />
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        {{ $departure->format('h:i A') }} – {{ $arrival->format('h:i A') }}
                                    </h3>
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ $flight->departure_airport }} → {{ $flight->arrival_airport }}
                                        <span class="mx-2">•</span>
                                        {{ $departure->format('d M') }} – {{ $arrival->format('d M') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-500">Duration</p>
                                <p class="text-gray-700 font-semibold mt-1">{{ $duration }}</p>
                            </div>
                            
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-500">Price</p>
                                <p class="text-2xl font-bold text-blue-600 mt-1">${{ $flight->price }}</p>
                            </div>
                            
                            <form method="GET" action="{{ route('flights.show', $flight->id) }}">
                                <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-blue-600 transition-all shadow-sm hover:shadow-md">
                                    Select
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-xl p-6 text-center border border-gray-100">
                        <p class="text-gray-500">No flights found</p>
                    </div>
                @endforelse

                <div class="mt-6">
                    {{ $flights->links() }}
                </div>
            </div>

            <div class="lg:w-80 xl:w-96 bg-white border-l border-gray-200 p-6 space-y-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Filter Flights</h2>
                
                <form method="GET" action="" class="space-y-6">
 
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Stops</h3>
                        <select name="stops" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Any stops</option>
                            <option value="0" {{ request('stops') == '0' ? 'selected' : '' }}>Nonstop</option>
                            <option value="1" {{ request('stops') == '1' ? 'selected' : '' }}>1 Stop</option>
                            <option value="2" {{ request('stops') == '2' ? 'selected' : '' }}>2+ Stops</option>
                        </select>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Price Range</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative">
                                <input type="number" name="min_price" placeholder="Min" 
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg pr-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                       value="{{ request('min_price') }}" />
                                <span class="absolute right-3 top-3 text-gray-400">$</span>
                            </div>
                            <div class="relative">
                                <input type="number" name="max_price" placeholder="Max" 
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg pr-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                       value="{{ request('max_price') }}" />
                                <span class="absolute right-3 top-3 text-gray-400">$</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Departure Time</h3>
                        <select name="time" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Any time</option>
                            <option value="morning" {{ request('time') == 'morning' ? 'selected' : '' }}>🌅 Morning (06:00 - 12:00)</option>
                            <option value="afternoon" {{ request('time') == 'afternoon' ? 'selected' : '' }}>☀️ Afternoon (12:00 - 18:00)</option>
                            <option value="evening" {{ request('time') == 'evening' ? 'selected' : '' }}>🌙 Evening (18:00 - 24:00)</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-3.5 rounded-lg font-semibold hover:from-blue-700 hover:to-blue-600 transition-all shadow-sm hover:shadow-md">
                        Apply Filters
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
