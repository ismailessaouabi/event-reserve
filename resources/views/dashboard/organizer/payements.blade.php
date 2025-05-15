@extends('dashboard.organizer.layouts')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-white">Gestion des paiements</h2>
                <p class="text-sm text-gray-400 mt-1">Suivi et analyse des transactions financières</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <select class="bg-gray-700 border border-gray-600 text-gray-300 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2 pr-8 appearance-none">
                        <option selected>Tous les statuts</option>
                        <option>Payés</option>
                        <option>En attente</option>
                        <option>Échoués</option>
                        <option>Remboursés</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <button class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white text-sm font-medium rounded-lg transition duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Exporter
                </button>
            </div>
        </div>

        <!-- Payment Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Total Revenue -->
            <div class="bg-gray-800 p-5 rounded-xl border-l-4 border-green-500 hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-gray-400">Revenu total</p>
                        <p class="text-2xl font-bold text-white mt-1">24,560 €</p>
                    </div>
                    <div class="p-2 bg-green-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-center text-xs text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +15.3% ce mois-ci
                </div>
            </div>

            <!-- Completed Payments -->
            <div class="bg-gray-800 p-5 rounded-xl border-l-4 border-blue-500 hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-gray-400">Paiements complétés</p>
                        <p class="text-2xl font-bold text-white mt-1">428</p>
                    </div>
                    <div class="p-2 bg-blue-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-center text-xs text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +12.1% ce mois-ci
                </div>
            </div>

            <!-- Pending Payments -->
            <div class="bg-gray-800 p-5 rounded-xl border-l-4 border-yellow-500 hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-gray-400">Paiements en attente</p>
                        <p class="text-2xl font-bold text-white mt-1">23</p>
                    </div>
                    <div class="p-2 bg-yellow-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-center text-xs text-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                    -3.2% ce mois-ci
                </div>
            </div>

            <!-- Failed Payments -->
            <div class="bg-gray-800 p-5 rounded-xl border-l-4 border-red-500 hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-gray-400">Paiements échoués</p>
                        <p class="text-2xl font-bold text-white mt-1">7</p>
                    </div>
                    <div class="p-2 bg-red-500/10 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-center text-xs text-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +1.5% ce mois-ci
                </div>
            </div>
        </div>

        <!-- Payment Methods Chart -->
        <div class="bg-gray-800 p-5 rounded-xl shadow-lg">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-lg font-semibold text-white">Méthodes de paiement</h3>
                <div class="flex items-center gap-2">
                    <span class="inline-block w-2 h-2 rounded-full bg-orange-500"></span>
                    <span class="text-xs text-gray-400">30 derniers jours</span>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                <div class="lg:col-span-2 h-64 bg-gray-700/20 rounded-lg flex items-center justify-center">
                    <!-- Chart placeholder -->
                    <div class="text-gray-500 text-center p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <p>Graphique des méthodes de paiement</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-blue-500/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium">Carte de crédit</span>
                        </div>
                        <span class="text-sm font-bold">62%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-purple-500/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium">PayPal</span>
                        </div>
                        <span class="text-sm font-bold">28%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-green-500/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium">Virement bancaire</span>
                        </div>
                        <span class="text-sm font-bold">7%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-yellow-500/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium">Autres</span>
                        </div>
                        <span class="text-sm font-bold">3%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Transactions Table -->
        <div class="bg-gray-800 p-5 rounded-xl shadow-lg">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-lg font-semibold text-white">Transactions récentes</h3>
                <a href="#" class="text-sm text-orange-500 hover:underline flex items-center gap-1">
                    Voir toutes les transactions
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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Participant</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Événement</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Montant</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Statut</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#PAY-5842</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Jean Dupont</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Concert d'été</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">120 €</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">15/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">Complété</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-orange-500 hover:text-orange-400 mr-3">Détails</a>
                                <a href="#" class="text-blue-500 hover:text-blue-400">Facture</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#PAY-5841</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Marie Lambert</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Conférence Tech</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">85 €</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">14/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500/20 text-yellow-400">En attente</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-orange-500 hover:text-orange-400 mr-3">Détails</a>
                                <a href="#" class="text-blue-500 hover:text-blue-400">Rappeler</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#PAY-5840</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Thomas Martin</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Festival Art</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">65 €</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">14/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">Complété</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-orange-500 hover:text-orange-400 mr-3">Détails</a>
                                <a href="#" class="text-blue-500 hover:text-blue-400">Facture</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#PAY-5839</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Sophie Bernard</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Concert d'été</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">120 €</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">13/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500/20 text-red-400">Échoué</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-orange-500 hover:text-orange-400 mr-3">Détails</a>
                                <a href="#" class="text-blue-500 hover:text-blue-400">Relancer</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#PAY-5838</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Lucie Petit</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Conférence Tech</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">85 €</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">12/05/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">Complété</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-orange-500 hover:text-orange-400 mr-3">Détails</a>
                                <a href="#" class="text-blue-500 hover:text-blue-400">Facture</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection