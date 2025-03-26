<x-app-layout>
    <div class="flex min-h-screen bg-gradient-to-b from-blue-100 to-blue-200">
        <aside class="w-64 border-r border-blue-200 bg-sky-100 p-6">
            <div class="mb-8">
                <h3 class="text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 bg-clip-text text-transparent">
                    Admin Console
                </h3>
            </div>
            <nav>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="flex items-center space-x-3 rounded-lg px-4 py-3 text-slate-600 transition-all duration-300 hover:bg-blue-100 hover:pl-6">
                            <svg class="h-5 w-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.flights.create') }}" 
                           class="flex items-center space-x-3 rounded-lg px-4 py-3 text-slate-600 transition-all duration-300 hover:bg-blue-100 hover:pl-6">
                            <svg class="h-5 w-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span>Create Flight</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center space-x-3 rounded-lg px-4 py-3 text-slate-600 transition-all duration-300 hover:bg-blue-100 hover:pl-6">
                            <svg class="h-5 w-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            <span>Edit Flights</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="flex-1 p-8">
            <div class="mx-auto max-w-7xl">
                <div class="mb-8 flex flex-col sm:flex-row items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-800">Welcome Back, {{ auth()->user()->name ?? 'Admin' }}</h1>
                        <p class="mt-1 text-slate-500">Last sync: {{ now()->diffForHumans() }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                    <div class="rounded-xl border border-blue-200 bg-white p-5 backdrop-blur-sm transition duration-300 hover:border-sky-300">
                        <div class="text-slate-500 text-sm">Total Orders</div>
                        <div class="mt-2 text-3xl font-bold text-slate-800">{{ $totalOrders }}</div>
                        <div class="mt-2 flex items-center text-sm text-green-600">
                            <span>▲ {{ $totalOrdersGrowth }}%</span>
                        </div>
                    </div>
                    <div class="rounded-xl border border-blue-200 bg-white p-5 backdrop-blur-sm transition duration-300 hover:border-sky-300">
                        <div class="text-slate-500 text-sm">Approved</div>
                        <div class="mt-2 text-3xl font-bold text-slate-800">{{ $approvedOrders }}</div>
                        <div class="mt-2 flex items-center text-sm text-green-600">
                            <span>▲ {{ $approvedGrowth }}%</span>
                        </div>
                    </div>
                    <div class="rounded-xl border border-blue-200 bg-white p-5 backdrop-blur-sm transition duration-300 hover:border-sky-300">
                        <div class="text-slate-500 text-sm">Active Users</div>
                        <div class="mt-2 text-3xl font-bold text-slate-800">{{ $activeUsers }}</div>
                        <div class="mt-2 text-sm text-slate-500">+{{ $activeUsers }} this month</div>
                    </div>
                </div>

                <div class="mt-8 grid gap-6 lg:grid-cols-3">
                    <div class="space-y-6 lg:col-span-1">
                        <div class="rounded-xl bg-gradient-to-br from-white to-blue-50 p-6 shadow-xl">
                            <div class="text-slate-500 text-sm">Monthly Revenue</div>
                            <div class="mt-2 text-3xl font-bold text-slate-800">${{ $monthlyRevenue }}</div>
                            <div class="mt-2 text-sm text-sky-500">▼ {{ $monthlyRevenueDecline ?? 0 }}% from last month</div>
                        </div>
                        <div class="rounded-xl bg-gradient-to-br from-white to-blue-50 p-6 shadow-xl">
                            <div class="text-slate-500 text-sm">Weekly Revenue</div>
                            <div class="mt-2 text-3xl font-bold text-slate-800">${{ $weeklyRevenue }}</div>
                            <div class="mt-2 text-sm text-sky-500">▼ {{ $weeklyRevenueDecline ?? 0 }}% from last week</div>
                        </div>
                        <div class="rounded-xl bg-gradient-to-tr from-sky-300 to-blue-400 p-6 shadow-xl">
                            <div class="text-lg font-semibold text-white">AI Forecast</div>
                            <div class="mt-3 text-sm text-blue-100">
                                Predictive analysis suggests <span class="font-bold text-white">{{ $aiForecast }}%</span> growth in next quarter's revenue.
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="h-full rounded-xl bg-gradient-to-br from-white to-blue-50 p-6 shadow-2xl">
                            <div class="mb-6 flex items-center justify-between">
                                <div>
                                    <div class="text-xl font-semibold text-slate-800">2025 Performance</div>
                                    <div class="text-sm text-slate-500">Year-to-date analytics</div>
                                </div>
                            </div>
                            <div class="grid h-72 place-content-center rounded-xl bg-blue-50 p-8 text-center">
                                <div class="text-5xl font-bold text-slate-800">{{ $totalTransactions }}</div>
                                <div class="mt-2 text-slate-500">Total Transactions</div>
                                <div class="mt-6 text-4xl font-bold text-slate-800">${{ $totalRevenue }}</div>
                                <div class="mt-2 text-slate-500">Revenue Generated</div>
                                <div class="mt-6 flex items-center justify-center space-x-2 text-green-600">
                                    <span>▲ {{ $revenueGrowth }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 rounded-xl border border-blue-200 bg-white p-6 shadow-2xl">
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <div class="text-xl font-semibold text-slate-800">Recent Orders</div>
                            <div class="text-sm text-slate-500">Updated in real-time</div>
                        </div>
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-blue-200 text-left text-sm text-slate-500">
                                <th class="pb-4">Client</th>
                                <th class="pb-4">Destination</th>
                                <th class="pb-4">Date</th>
                                <th class="pb-4">Status</th>
                                <th class="pb-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                                <tr class="border-b border-blue-200">
                                    <td class="py-4 text-slate-800">{{ $order->user->name }}</td>
                                    <td class="text-slate-600">{{ $order->flight->arrival_airport }}</td>
                                    <td class="text-slate-600">{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="rounded-full bg-orange-100 px-3 py-1 text-sm text-orange-600">Pending</span>
                                        @elseif($order->status == 'Confirmed')
                                            <span class="rounded-full bg-mint-100 px-3 py-1 text-sm text-mint-600">Confirmed</span>
                                        @else
                                            <span class="rounded-full bg-sky-100 px-3 py-1 text-sm text-sky-600">Declined</span>
                                        @endif
                                    </td>
                                    <td class="font-medium text-slate-800">${{ $order->total_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-8 flex justify-end">
                    <form method="POST" action="{{ route('adminlogout') }}">
                        @csrf
                        <x-dropdown-link :href="route('adminlogout')"
                                        class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md font-semibold transition-colors"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .animate-spin-slow {
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</x-app-layout>
