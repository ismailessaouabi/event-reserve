<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Réservations Événements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <style>
        .active {
            background-color: #3b82f6;
            color: #fff;
        }
        
    </style>
    <!-- Sidebar Mobile Toggle -->
    <button id="sidebarToggle" class="md:hidden fixed top-4 left-4 z-50 p-2 bg-indigo-600 text-white rounded-lg shadow-lg">
        <i class="fas fa-bars"></i>
    </button>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="hidden md:flex flex-col w-64 bg-indigo-800 text-white transition-all duration-300 ease-in-out fixed md:relative h-full">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 border-b border-indigo-700">
                <h1 class="text-xl font-bold">EventAdminPro</h1>
            </div>

            <!-- Menu Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-1">
                <a href="#" class="flex items-center px-4 py-3 text-sm font-medium bg-indigo-900 rounded-lg">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Tableau de bord
                </a>
                <a href="{{ route('events.index') }}" class=" menu-item flex items-center px-4 py-3 text-sm font-medium text-indigo-200 hover:bg-indigo-700 rounded-lg">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Événements
                </a>
                <a href="{{ route('events.index') }}" class=" menu-item flex items-center px-4 py-3 text-sm font-medium text-indigo-200 hover:bg-indigo-700 rounded-lg">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Teckets
                </a>
                <a href="{{ route('categories.index') }}" class=" menu-item flex items-center px-4 py-3 text-sm font-medium text-indigo-200 hover:bg-indigo-700 rounded-lg">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Catégories
                </a>
                <a href="{{ route('places.index') }}" class="  menu-item flex items-center px-4 py-3 text-sm font-medium text-indigo-200 hover:bg-indigo-700 rounded-lg">
                    <i class="fas fa-ticket-alt mr-3"></i>
                    places
                </a>
                <a href="{{ route('users.index') }}" class="  menu-item flex items-center px-4 py-3 text-sm font-medium text-indigo-200 hover:bg-indigo-700 rounded-lg">
                    <i class="fas fa-users mr-3"></i>
                    Utilisateurs
                </a>
                <a href="#" class=" menu-item flex items-center px-4 py-3 text-sm font-medium text-indigo-200 hover:bg-indigo-700 rounded-lg">
                    <i class="fas fa-chart-bar mr-3"></i>
                    Statistiques
                </a>
                <a href="#" class=" menu-item flex items-center px-4 py-3 text-sm font-medium text-indigo-200 hover:bg-indigo-700 rounded-lg">
                    <i class="fas fa-cog mr-3"></i>
                    Paramètres
                </a>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-indigo-700">
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name=Admin" alt="Admin">
                    <div class="ml-3">
                        <p class="text-sm font-medium">Administrateur</p>
                        <p class="text-xs text-indigo-200">admin@event.com</p>
                    </div>
                </div>
                <a href="#" class="mt-3 w-full text-left text-xs text-indigo-200 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-1"></i> Déconnexion
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            @HasSection('content')
                @yield('content')
            @else
            <!-- Top Bar -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between h-16 px-6">
                    <h2 class="text-lg font-semibold text-gray-800">Gestion des Réservations</h2>
                    <div class="flex items-center space-x-4">
                        <button class="p-1 text-gray-500 rounded-full hover:bg-gray-100">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="relative">
                            <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Réservations aujourd'hui</p>
                                <p class="text-2xl font-bold mt-1">142</p>
                            </div>
                            <div class="p-3 rounded-lg bg-blue-50 text-blue-600">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3"><span class="text-green-500">+12%</span> vs hier</p>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Événements actifs</p>
                                <p class="text-2xl font-bold mt-1">24</p>
                            </div>
                            <div class="p-3 rounded-lg bg-green-50 text-green-600">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3"><span class="text-green-500">+3</span> nouveaux</p>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Revenus (7j)</p>
                                <p class="text-2xl font-bold mt-1">€8,540</p>
                            </div>
                            <div class="p-3 rounded-lg bg-purple-50 text-purple-600">
                                <i class="fas fa-euro-sign"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3"><span class="text-green-500">+18%</span> vs semaine dernière</p>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Taux d'occupation</p>
                                <p class="text-2xl font-bold mt-1">78%</p>
                            </div>
                            <div class="p-3 rounded-lg bg-yellow-50 text-yellow-600">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3"><span class="text-green-500">+5%</span> vs mois dernier</p>
                    </div>
                </div>

                <!-- Dernières Réservations -->
                <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">Dernières réservations</h3>
                        <button class="text-sm text-indigo-600 hover:text-indigo-800">Voir tout</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Événement</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#RES-5421</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Concert Jazz</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Marie Dupont</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/06/2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmée</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-eye"></i></button>
                                        <button class="text-yellow-600 hover:text-yellow-900"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#RES-5420</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Conférence Tech</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jean Martin</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14/06/2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">En attente</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-eye"></i></button>
                                        <button class="text-yellow-600 hover:text-yellow-900"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#RES-5419</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Festival Culinaire</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sophie Leroy</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12/06/2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmée</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-eye"></i></button>
                                        <button class="text-yellow-600 hover:text-yellow-900"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#RES-5418</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Exposition Art</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Thomas Bernard</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10/06/2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Annulée</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-eye"></i></button>
                                        <button class="text-yellow-600 hover:text-yellow-900"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                        <div class="text-sm text-gray-500">Affichage <span class="font-medium">1</span> à <span class="font-medium">4</span> sur <span class="font-medium">124</span> résultats</div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 border rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Précédent</button>
                            <button class="px-3 py-1 border rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">Suivant</button>
                        </div>
                    </div>
                </div>

                <!-- Prochains Événements -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Prochains événements</h3>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="p-6 hover:bg-gray-50 transition-colors duration-150">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-lg bg-purple-100 text-purple-600 mr-4">
                                            <i class="fas fa-music"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Festival Jazz</h4>
                                            <p class="text-sm text-gray-500">25-27 Juin 2023</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-gray-800">142/200 places</p>
                                        <p class="text-sm text-gray-500">71% rempli</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 hover:bg-gray-50 transition-colors duration-150">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                                            <i class="fas fa-laptop-code"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Conférence IA</h4>
                                            <p class="text-sm text-gray-500">30 Juin 2023</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-gray-800">85/120 places</p>
                                        <p class="text-sm text-gray-500">70% rempli</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 hover:bg-gray-50 transition-colors duration-150">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-lg bg-green-100 text-green-600 mr-4">
                                            <i class="fas fa-utensils"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Atelier Cuisine</h4>
                                            <p class="text-sm text-gray-500">5 Juillet 2023</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-gray-800">12/20 places</p>
                                        <p class="text-sm text-gray-500">60% rempli</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Graphique -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Réservations par mois</h3>
                            <select class="text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                <option>2023</option>
                                <option>2022</option>
                                <option>2021</option>
                            </select>
                        </div>
                        <div class="h-64">
                            <!-- Espace pour le graphique (Chart.js par exemple) -->
                            <div class="flex items-center justify-center h-full bg-gray-50 rounded-lg border border-gray-200">
                                <p class="text-gray-500">Graphique des réservations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @endif
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });
        //active menu item
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                menuItems.forEach(otherItem => {
                    otherItem.classList.remove('active');
                });
                item.classList.add('active');
            });
        });

        
        

        
       
    </script>
    
</body>
</html>