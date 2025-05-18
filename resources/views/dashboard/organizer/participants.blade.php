@extends('dashboard.organizer.layouts')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Gestion des Participants</h2>
            <div class="flex space-x-3">
                <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm flex items-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Exporter
                </a>
                <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md text-sm flex items-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Ajouter
                </a>
            </div>
        </div>

        <!-- Statistiques des participants -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold">Aperçu des participants</h3>
                <div class="flex items-center">
                    <select id="event-filter" class="bg-gray-700 text-white text-sm rounded-md border-gray-600 focus:ring-orange-500 focus:border-orange-500 mr-3">
                        <option value="all">Tous les événements</option>
                        <option value="event1">Événement 1</option>
                        <option value="event2">Événement 2</option>
                    </select>
                    <a href="#" class="text-sm text-orange-500 hover:text-orange-400 flex items-center transition">
                        <span>Voir tout</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-gray-700/30 rounded-lg p-5 transition hover:bg-gray-700/50">
                    <p class="text-3xl font-bold text-orange-500">123</p>
                    <p class="text-sm text-gray-400">Total participants</p>
                    <div class="mt-2 text-xs text-green-400">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +8% cette semaine
                        </span>
                    </div>
                </div>
                
                <div class="bg-gray-700/30 rounded-lg p-5 transition hover:bg-gray-700/50">
                    <p class="text-3xl font-bold text-orange-500">546</p>
                    <p class="text-sm text-gray-400">Nouveaux participants</p>
                    <div class="mt-2 text-xs text-green-400">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            +12 depuis hier
                        </span>
                    </div>
                </div>
                
                <div class="bg-gray-700/30 rounded-lg p-5 transition hover:bg-gray-700/50">
                    <p class="text-3xl font-bold text-orange-500">45%</p>
                    <p class="text-sm text-gray-400">Taux de remplissage</p>
                    <div class="relative pt-2">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-600">
                            <div style="width: 45%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500"></div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-700/30 rounded-lg p-5 transition hover:bg-gray-700/50">
                    <p class="text-3xl font-bold text-orange-500">345</p>
                    <p class="text-sm text-gray-400">Vues du formulaire</p>
                    <div class="mt-2 text-xs text-gray-400">
                        <span class="flex items-center">
                            Taux de conversion: 12%
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des participants -->
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-700">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <h3 class="text-xl font-semibold mb-4 md:mb-0">Liste des participants</h3>
                    <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher un participant..." class="bg-gray-700 text-white text-sm rounded-md border-gray-600 w-full md:w-64 pl-10 pr-4 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                        <select class="bg-gray-700 text-white text-sm rounded-md border-gray-600 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="all">Tous les statuts</option>
                            <option value="confirmed">Confirmé</option>
                            <option value="pending">En attente</option>
                            <option value="cancelled">Annulé</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center">
                                    Participant
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Événement
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Date d'inscription
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Statut
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                       
                            <tr class="hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center text-white font-medium">
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-white"></div>
                                            <div class="text-sm text-gray-400"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-white"></div>
                                    <div class="text-xs text-gray-400"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-300"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                   
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Confirmé
                                        </span>
                                    
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            En attente
                                        </span>
                                    
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Annulé
                                        </span>
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="#" class="text-blue-400 hover:text-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="#" class="text-yellow-400 hover:text-yellow-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <button type="button" class="text-red-400 hover:text-red-300" 
                                                >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <p class="text-lg font-medium">Aucun participant trouvé</p>
                                        <p class="text-sm mt-1">Commencez par ajouter des participants à votre événement</p>
                                        <a href="#" class="mt-4 px-4 py-2 bg-orange-500 text-white rounded-md text-sm hover:bg-orange-600 transition">
                                            Ajouter un participant
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div id="delete-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title"  aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">
                                Supprimer le participant
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-300">
                                    Êtes-vous sûr de vouloir supprimer ce participant ? Cette action est irréversible et supprimera toutes les données associées.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form id="delete-form" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Supprimer
                        </button>
                    </form>
                    <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-gray-300 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(url) {
            document.getElementById('delete-form').action = url;
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('delete-modal').classList.add('hidden');
        }
    </script>
@endsection