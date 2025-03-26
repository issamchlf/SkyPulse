<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight font-orbitron">
            {{ __('Admin Dashboard ') }}
        </h2>
    </x-slot>

    <div class="flex min-h-screen bg-gray-900">
        <aside class="w-64 border-r border-gray-700 bg-gray-800 p-6">
            <div class="mb-8">
                <h3 class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-cyan-400 bg-clip-text text-transparent">
                    Admin Console</h3>
            </div>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="flex items-center space-x-3 rounded-lg px-4 py-3 text-gray-300 transition-all hover:bg-gray-700/50 hover:pl-6">
                            <svg class="h-5 w-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.flights.create') }}" class="flex items-center space-x-3 rounded-lg px-4 py-3 text-gray-300 transition-all hover:bg-gray-700/50 hover:pl-6">
                            <svg class="h-5 w-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span>Create Flight</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 rounded-lg px-4 py-3 text-gray-300 transition-all hover:bg-gray-700/50 hover:pl-6">
                            <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            <span>Edit Flights</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
    
        <div class="flex-1 p-8">
            <div class="mx-auto max-w-7xl">
                <div class="mb-8 flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Welcome Back, Issam</h1>
                        <p class="mt-1 text-gray-400">Last sync: 2 minutes ago</p>
                    </div>
                    <button class="flex items-center space-x-2 rounded-lg bg-gradient-to-r from-indigo-500 to-blue-500 px-5 py-3 font-semibold text-white shadow-lg transition-transform hover:scale-[1.02]">
                        <svg class="h-5 w-5 animate-[spin_3s_linear_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M20 20v-6h-6m6-6l-6 6 6 6M4 16l6-6-6-6"/>
                        </svg>
                        <span>Sync Data</span>
                    </button>
                </div>
    
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
                    <div class="rounded-xl border border-gray-700/50 bg-gray-800 p-5 backdrop-blur-lg transition-all hover:border-indigo-400/30">
                        <div class="text-gray-400">Total Orders</div>
                        <div class="mt-2 text-3xl font-bold text-indigo-400">201</div>
                        <div class="mt-2 flex items-center text-sm text-emerald-400">
                            <span>▲ 2.2%</span>
                        </div>
                    </div>
                    <div class="rounded-xl border border-gray-700/50 bg-gray-800 p-5 backdrop-blur-lg transition-all hover:border-indigo-400/30">
                        <div class="text-gray-400">Approved</div>
                        <div class="mt-2 text-3xl font-bold text-cyan-400">36</div>
                        <div class="mt-2 flex items-center text-sm text-emerald-400">
                            <span>▲ 1.5%</span>
                        </div>
                    </div>
                    <div class="rounded-xl border border-gray-700/50 bg-gray-800 p-5 backdrop-blur-lg transition-all hover:border-indigo-400/30">
                        <div class="text-gray-400">Active Users</div>
                        <div class="mt-2 text-3xl font-bold text-purple-400">4,890</div>
                        <div class="mt-2 text-sm text-cyan-400">+890 this month</div>
                    </div>
                    <div class="rounded-xl border border-gray-700/50 bg-gray-800 p-5 backdrop-blur-lg transition-all hover:border-indigo-400/30">
                        <div class="text-gray-400">Subscriptions</div>
                        <div class="mt-2 text-3xl font-bold text-blue-400">1,201</div>
                        <div class="mt-2 text-sm text-emerald-400">▲ 4.7% growth</div>
                    </div>
                </div>
    
                <div class="mt-8 grid gap-6 lg:grid-cols-3">
                    <div class="space-y-6 lg:col-span-1">
                        <div class="rounded-xl bg-gradient-to-br from-gray-800 to-gray-800/50 p-6 shadow-2xl">
                            <div class="text-gray-400">Monthly Revenue</div>
                            <div class="mt-2 text-3xl font-bold text-white">$25,410</div>
                            <div class="mt-2 text-sm text-rose-400">▼ 0.2% from last month</div>
                        </div>
                        <div class="rounded-xl bg-gradient-to-br from-gray-800 to-gray-800/50 p-6 shadow-2xl">
                            <div class="text-gray-400">Weekly Revenue</div>
                            <div class="mt-2 text-3xl font-bold text-white">$1,352</div>
                            <div class="mt-2 text-sm text-rose-400">▼ 3.1% from last week</div>
                        </div>
                        <div class="rounded-xl bg-gradient-to-tr from-indigo-600/80 to-purple-600/80 p-6 shadow-2xl">
                            <div class="text-lg font-semibold text-white">AI Forecast</div>
                            <div class="mt-3 text-sm text-blue-100/80">
                                Predictive analysis suggests <span class="font-bold text-white">5.4% growth</span> 
                                in next quarter's revenue based on current metrics.
                            </div>
                        </div>
                    </div>
    
                    <div class="lg:col-span-2">
                        <div class="h-full rounded-xl bg-gradient-to-br from-blue-900/50 to-indigo-900/50 p-6 shadow-2xl">
                            <div class="mb-6 flex items-center justify-between">
                                <div>
                                    <div class="text-xl font-semibold text-blue-200">2025 Performance</div>
                                    <div class="text-sm text-blue-300/80">Year-to-date analytics</div>
                                </div>
                            </div>
                            <div class="grid h-72 place-content-center rounded-xl bg-blue-900/20 p-8 text-center">
                                <div class="text-5xl font-bold text-blue-100">10.2k</div>
                                <div class="mt-2 text-blue-300">Total Transactions</div>
                                <div class="mt-6 text-4xl font-bold text-blue-100">$50.8k</div>
                                <div class="mt-2 text-blue-300">Revenue Generated</div>
                                <div class="mt-6 flex items-center justify-center space-x-2 text-emerald-300">
                                    <span>▲ 15.3%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="mt-8 rounded-xl border border-gray-700/50 bg-gray-800 p-6 shadow-2xl">
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <div class="text-xl font-semibold text-white">Recent Orders</div>
                            <div class="text-sm text-gray-400">Updated in real-time</div>
                        </div>
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700 text-left text-sm text-blue-400">
                                <th class="pb-4">Client</th>
                                <th class="pb-4">Destination</th>
                                <th class="pb-4">Date</th>
                                <th class="pb-4">Status</th>
                                <th class="pb-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-700/50">
                                <td class="py-4 text-white">Pressa</td>
                                <td class="text-gray-300">London</td>
                                <td class="text-gray-300">12-08-2025</td>
                                <td><span class="rounded-full bg-yellow-400/10 px-3 py-1 text-sm text-yellow-300">Pending</span></td>
                                <td class="font-medium text-white">$450</td>
                            </tr>
                            <tr class="border-b border-gray-700/50">
                                <td class="py-4 text-white">Mike</td>
                                <td class="text-gray-300">Berlin</td>
                                <td class="text-gray-300">22-09-2025</td>
                                <td><span class="rounded-full bg-emerald-400/10 px-3 py-1 text-sm text-emerald-300">Confirmed</span></td>
                                <td class="font-medium text-white">$320</td>
                            </tr>
                            <tr>
                                <td class="py-4 text-white">Robert</td>
                                <td class="text-gray-300">New York</td>
                                <td class="text-gray-300">13-03-2025</td>
                                <td><span class="rounded-full bg-rose-400/10 px-3 py-1 text-sm text-rose-300">Declined</span></td>
                                <td class="font-medium text-white">$215</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

                <!-- Logout Button -->
                <div class="mt-8 flex justify-end">
                    <form method="POST" action="{{ route('adminlogout') }}">
                        @csrf
                        <x-dropdown-link :href="route('adminlogout')"
                                         class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-semibold transition-colors"
                                         onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Animation -->
    <style>
        .animate-spin-slow {
            animation: spin 2s linear infinite;
        }
    </style>
</x-app-layout>
