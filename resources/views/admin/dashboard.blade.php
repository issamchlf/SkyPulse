<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard ') }}
        </h2>
    </x-slot>

    <div class="flex min-h-screen bg-gray-900">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 p-6">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-white">Admin Menu</h3>
            </div>
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="#"
                           class="block px-4 py-2 text-white hover:bg-gray-700 rounded">
                            Create Flight
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="block px-4 py-2 text-white hover:bg-gray-700 rounded">
                            Edit Flights
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="block px-4 py-2 text-white hover:bg-gray-700 rounded">
                            Edit Users
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="block px-4 py-2 text-white hover:bg-gray-700 rounded">
                            Add Bonus
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                           class="block px-4 py-2 text-white hover:bg-gray-700 rounded">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="block px-4 py-2 text-white hover:bg-gray-700 rounded">
                            Settings
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Dashboard Header -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Hello, Issam!</h1>
                        <p class="text-gray-400">Welcome to your futuristic dashboard</p>
                    </div>
                    <div>
                        <button
                            class="bg-indigo-600 hover:bg-indigo-700 transition-colors px-4 py-2 rounded-md text-white font-semibold flex items-center gap-2">
                            <svg class="h-5 w-5 animate-spin-slow" fill="none" stroke="currentColor" 
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M4 4v6h6M20 20v-6h-6"></path>
                            </svg>
                            Sync Data
                        </button>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <!-- Orders -->
                    <div class="bg-gray-800 p-4 rounded-lg shadow hover:shadow-xl transition-all">
                        <h3 class="text-lg font-semibold text-white">Orders</h3>
                        <p class="text-2xl font-bold mt-2 text-blue-400">201</p>
                        <p class="text-green-400 text-sm">+2.2%</p>
                    </div>
                    <!-- Approved -->
                    <div class="bg-gray-800 p-4 rounded-lg shadow hover:shadow-xl transition-all">
                        <h3 class="text-lg font-semibold text-white">Approved</h3>
                        <p class="text-2xl font-bold mt-2 text-blue-400">36</p>
                        <p class="text-green-400 text-sm">+1.5%</p>
                    </div>
                    <!-- Users -->
                    <div class="bg-gray-800 p-4 rounded-lg shadow hover:shadow-xl transition-all">
                        <h3 class="text-lg font-semibold text-white">Users</h3>
                        <p class="text-2xl font-bold mt-2 text-blue-400">4,890</p>
                        <p class="text-blue-400 text-sm">+0.8% from last week</p>
                    </div>
                    <!-- Subscriptions -->
                    <div class="bg-gray-800 p-4 rounded-lg shadow hover:shadow-xl transition-all">
                        <h3 class="text-lg font-semibold text-white">Subscriptions</h3>
                        <p class="text-2xl font-bold mt-2 text-blue-400">1,201</p>
                        <p class="text-blue-400 text-sm">+4.7% from last month</p>
                    </div>
                </div>

                <!-- Revenue & Analytics Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <!-- Revenue Cards -->
                    <div class="lg:col-span-1 space-y-4">
                        <!-- Month Total -->
                        <div class="bg-gray-800 p-4 rounded-lg shadow hover:shadow-xl transition-all">
                            <h3 class="text-lg font-semibold text-white">Month Total</h3>
                            <p class="text-2xl font-bold mt-2 text-blue-400">$25,410</p>
                            <p class="text-red-400 text-sm">-0.2% from last month</p>
                        </div>
                        <!-- Revenue -->
                        <div class="bg-gray-800 p-4 rounded-lg shadow hover:shadow-xl transition-all">
                            <h3 class="text-lg font-semibold text-white">Revenue</h3>
                            <p class="text-2xl font-bold mt-2 text-blue-400">$1,352</p>
                            <p class="text-red-400 text-sm">-3.1% from last week</p>
                        </div>
                        <!-- AI-Driven Insights (Placeholder) -->
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-4 rounded-lg shadow hover:shadow-xl transition-all">
                            <h3 class="text-lg font-semibold text-white">AI Predictions</h3>
                            <p class="text-sm mt-2 text-blue-400">
                                Next month’s revenue is estimated to grow by <span class="font-bold">5.4%</span> based on current trends.
                            </p>
                        </div>
                    </div>

<!-- Fake Analytics / Stats in Blue -->
<div class="lg:col-span-2 bg-blue-900 p-6 rounded-lg shadow hover:shadow-xl transition-all">
    <h3 class="text-xl font-semibold mb-4 text-blue-200">Sales & Revenue (2025)</h3>
    <div class="h-64 w-full bg-blue-800 rounded-lg flex flex-col items-center justify-center">
         <div class="text-4xl font-bold text-blue-100">10,000</div>
         <div class="mt-2 text-lg text-blue-200">Total Sales</div>
         <div class="text-4xl font-bold text-blue-100 mt-4">$50,000</div>
         <div class="mt-2 text-lg text-blue-200">Revenue</div>
         <div class="mt-4 text-2xl font-bold text-blue-100">+15%</div>
         <div class="text-lg text-blue-200">Growth</div>
    </div>
</div>


                <!-- Customer Orders Table -->
                <div class="mt-8">
                    <h3 class="text-xl font-semibold mb-2 text-white">Customer Orders</h3>
                    <div class="bg-gray-800 p-4 rounded-lg shadow hover:shadow-xl transition-all">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="text-left py-2 text-blue-400">Name</th>
                                    <th class="text-left py-2 text-blue-400">Location</th>
                                    <th class="text-left py-2 text-blue-400">Date</th>
                                    <th class="text-left py-2 text-blue-400">Status</th>
                                    <th class="text-left py-2 text-blue-400">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-700">
                                    <td class="py-2 text-white">Pressa</td>
                                    <td class="text-white">London</td>
                                    <td class="text-white">12-08-2025</td>
                                    <td class="text-yellow-400">Processing</td>
                                    <td class="text-white">$450</td>
                                </tr>
                                <tr class="border-b border-gray-700">
                                    <td class="py-2 text-white">Mike</td>
                                    <td class="text-white">Berlin</td>
                                    <td class="text-white">22-09-2025</td>
                                    <td class="text-green-400">Confirmed</td>
                                    <td class="text-white">$320</td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-white">Robert</td>
                                    <td class="text-white">New York</td>
                                    <td class="text-white">13-03-2025</td>
                                    <td class="text-red-400">Declined</td>
                                    <td class="text-white">$215</td>
                                </tr>
                            </tbody>
                        </table>
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
