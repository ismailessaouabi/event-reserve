@extends('dashboard.organizer.layouts')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
            <div>
                <h1 class="text-2xl font-bold text-white">Tableau de bord des statistiques</h1>
                <p class="text-sm text-gray-400 mt-1">Analyse des performances de votre événement</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <select class="bg-gray-700 border border-gray-600 text-gray-300 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2 pr-8 appearance-none">
                        <option selected>7 derniers jours</option>
                        <option>30 derniers jours</option>
                        <option>Ce mois-ci</option>
                        <option>Cette année</option>
                        <option>Personnalisé</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <button class="px-3 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm font-medium rounded-lg transition duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Exporter
                </button>
            </div>
        </div>

        <!-- Stats Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- New Participants Card -->
            <div class="bg-gray-800 p-5 rounded-xl border-l-4 border-orange-500 hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-gray-400">Nouveaux participants</p>
                        <p class="text-2xl font-bold text-white mt-2">124</p>
                        <div class="mt-2 flex items-center text-xs text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +8.7% depuis hier
                        </div>
                    </div>
                    <div class="p-2 bg-orange-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Occupancy Rate Card -->
            <div class="bg-gray-800 p-5 rounded-xl border-l-4 border-blue-500 hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-gray-400">Taux de remplissage</p>
                        <p class="text-2xl font-bold text-white mt-2">85%</p>
                        <div class="mt-2 flex items-center text-xs text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +5.2% depuis hier
                        </div>
                    </div>
                    <div class="p-2 bg-blue-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Views Card -->
            <div class="bg-gray-800 p-5 rounded-xl border-l-4 border-purple-500 hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-gray-400">Vues totales</p>
                        <p class="text-2xl font-bold text-white mt-2">3.2K</p>
                        <div class="mt-2 flex items-center text-xs text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +22.3% depuis hier
                        </div>
                    </div>
                    <div class="p-2 bg-purple-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Revenue Card -->
            <div class="bg-gray-800 p-5 rounded-xl border-l-4 border-green-500 hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-gray-400">Revenu total</p>
                        <p class="text-2xl font-bold text-white mt-2">24,560 €</p>
                        <div class="mt-2 flex items-center text-xs text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +15.3% depuis hier
                        </div>
                    </div>
                    <div class="p-2 bg-green-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <!-- Engagement Chart -->
            <div class="bg-gray-800 p-5 rounded-xl">
                <div class="flex justify-between items-center mb-5">
                    <h3 class="text-lg font-semibold text-white">Engagement des participants</h3>
                    <div class="flex items-center gap-2">
                        <span class="inline-block w-2 h-2 rounded-full bg-orange-500"></span>
                        <span class="text-xs text-gray-400">7 derniers jours</span>
                    </div>
                </div>
                <div class="h-64 bg-gray-700/20 rounded-lg flex items-center justify-center">
                    <!-- Chart placeholder -->
                    <div class="text-gray-500 text-center p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <p>Graphique d'engagement</p>
                    </div>
                </div>
            </div>

            <!-- Traffic Sources Chart -->
            <div class="bg-gray-800 p-5 rounded-xl">
                <div class="flex justify-between items-center mb-5">
                    <h3 class="text-lg font-semibold text-white">Sources de trafic</h3>
                    <div class="flex items-center gap-2">
                        <span class="inline-block w-2 h-2 rounded-full bg-blue-500"></span>
                        <span class="text-xs text-gray-400">30 derniers jours</span>
                    </div>
                </div>
                <div class="h-64 bg-gray-700/20 rounded-lg flex items-center justify-center">
                    <!-- Chart placeholder -->
                    <div class="text-gray-500 text-center p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <p>Graphique des sources de trafic</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-gray-800 p-5 rounded-xl">
            <h3 class="text-lg font-semibold text-white mb-5">Actions rapides</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <a href="#" class="bg-gray-700 hover:bg-gray-600 p-4 rounded-lg text-center transition duration-200">
                    <div class="mx-auto w-10 h-10 bg-orange-500/10 rounded-full flex items-center justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium">Créer un événement</p>
                </a>
                <a href="#" class="bg-gray-700 hover:bg-gray-600 p-4 rounded-lg text-center transition duration-200">
                    <div class="mx-auto w-10 h-10 bg-blue-500/10 rounded-full flex items-center justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium">Gérer les billets</p>
                </a>
                <a href="#" class="bg-gray-700 hover:bg-gray-600 p-4 rounded-lg text-center transition duration-200">
                    <div class="mx-auto w-10 h-10 bg-purple-500/10 rounded-full flex items-center justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium">Exporter données</p>
                </a>
                <a href="#" class="bg-gray-700 hover:bg-gray-600 p-4 rounded-lg text-center transition duration-200">
                    <div class="mx-auto w-10 h-10 bg-green-500/10 rounded-full flex items-center justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <p class="text-sm font-medium">Voir rapports</p>
                </a>
            </div>
        </div>
    </div>
@endsection