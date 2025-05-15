@extends('dashboard.organizer.layouts')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold">Billets vendus</h2>
                <p class="text-sm text-gray-400">Statistiques des ventes de billets</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <select class="bg-gray-700 border border-gray-600 text-gray-300 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2 pr-8 appearance-none">
                        <option selected>30 derniers jours</option>
                        <option>7 derniers jours</option>
                        <option>Ce mois-ci</option>
                        <option>Cette année</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <a href="#" class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white text-sm font-medium rounded-lg transition duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Rapport complet
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="bg-gray-800 p-4 sm:p-6 rounded-lg shadow-lg">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Total Tickets Sold -->
                <div class="bg-gray-700/30 p-4 sm:p-6 rounded-lg border-l-4 border-orange-500 hover:bg-gray-700/50 transition duration-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs sm:text-sm text-gray-400 uppercase tracking-wider">Billets vendus</p>
                            <p class="text-2xl font-bold text-white mt-1">3,248</p>
                        </div>
                        <div class="p-2 bg-orange-500/10 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-xs text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        +12.5% depuis hier
                    </div>
                </div>

                <!-- Occupancy Rate -->
                <div class="bg-gray-700/30 p-4 sm:p-6 rounded-lg border-l-4 border-blue-500 hover:bg-gray-700/50 transition duration-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs sm:text-sm text-gray-400 uppercase tracking-wider">Taux de remplissage</p>
                            <p class="text-2xl font-bold text-white mt-1">85%</p>
                        </div>
                        <div class="p-2 bg-blue-500/10 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-xs text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        +5.2% depuis hier
                    </div>
                </div>

                <!-- New Participants -->
                <div class="bg-gray-700/30 p-4 sm:p-6 rounded-lg border-l-4 border-green-500 hover:bg-gray-700/50 transition duration-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs sm:text-sm text-gray-400 uppercase tracking-wider">Nouveaux participants</p>
                            <p class="text-2xl font-bold text-white mt-1">124</p>
                        </div>
                        <div class="p-2 bg-green-500/10 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-xs text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        +8.7% depuis hier
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="bg-gray-700/30 p-4 sm:p-6 rounded-lg border-l-4 border-purple-500 hover:bg-gray-700/50 transition duration-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs sm:text-sm text-gray-400 uppercase tracking-wider">Revenu total</p>
                            <p class="text-2xl font-bold text-white mt-1">24,560 €</p>
                        </div>
                        <div class="p-2 bg-purple-500/10 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-xs text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        +15.3% depuis hier
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Sales Trend Chart -->
            <div class="bg-gray-800 p-4 sm:p-6 rounded-lg shadow-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Tendance des ventes</h3>
                    <div class="flex items-center gap-2">
                        <span class="inline-block w-2 h-2 rounded-full bg-orange-500"></span>
                        <span class="text-xs text-gray-400">30 derniers jours</span>
                    </div>
                </div>
                <div class="h-64">
                    <!-- Chart placeholder - would be replaced with actual chart library -->
                    <div class="w-full h-full bg-gray-700/30 rounded-lg flex items-center justify-center text-gray-500">
                        [Graphique des tendances des ventes]
                    </div>
                </div>
            </div>

            <!-- Ticket Types Distribution -->
            <div class="bg-gray-800 p-4 sm:p-6 rounded-lg shadow-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Répartition des types de billets</h3>
                    <div class="flex items-center gap-2">
                        <span class="inline-block w-2 h-2 rounded-full bg-blue-500"></span>
                        <span class="text-xs text-gray-400">Total vendus</span>
                    </div>
                </div>
                <div class="h-64">
                    <!-- Chart placeholder - would be replaced with actual chart library -->
                    <div class="w-full h-full bg-gray-700/30 rounded-lg flex items-center justify-center text-gray-500">
                        [Graphique de répartition des billets]
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Sales Table -->
        <div class="bg-gray-800 p-4 sm:p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold">Ventes récentes</h3>
                <a href="#" class="text-sm text-orange-500 hover:underline flex items-center gap-1">
                    Voir tout
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700/50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID Transaction</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Billet</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Participant</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Prix</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#TRX-5842</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">VIP Pass</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Jean Dupont</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">15/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">120 €</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">Payé</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#TRX-5841</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Standard</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Marie Lambert</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">15/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">60 €</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">Payé</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#TRX-5840</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Early Bird</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Thomas Martin</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">14/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">45 €</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500/20 text-yellow-400">En attente</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#TRX-5839</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">VIP Pass</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Sophie Bernard</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">14/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">120 €</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">Payé</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#TRX-5838</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Standard</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Lucie Petit</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">13/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">60 €</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500/20 text-red-400">Annulé</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection