<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Organisateur</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-900 text-white ">
    <div class="flex flex-col h-screen overflow-hidden lg:flex-row ">
        <!-- Mobile Header -->
        <div class="lg:hidden flex items-center justify-between p-4 bg-gray-800">
            <button id="menuToggle" class="text-white focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gray-300 rounded-full mr-3 overflow-hidden">
                    <img src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="Profile" class="w-full h-full object-cover">
                </div>
                <span class="text-lg font-semibold">{{ Auth::user()->name }}</span>
            </div>
        </div>

        <!-- Sidebar - Hidden on mobile by default -->
        <div id="sidebar" class="w-full lg:w-72 p-4 flex-col bg-gray-800 h-screen  hidden lg:flex">
            <!-- User Profile -->
            <div class="flex items-center mb-8 p-2">
                <div class="w-12 h-12 bg-gray-300 rounded-full mr-3 overflow-hidden">
                    <img src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="Profile" class="w-full h-full object-cover">
                </div>
                <span class="text-lg font-semibold">{{ Auth::user()->name }}</span>
            </div>
            
            <!-- Navigation -->
            <nav class="flex flex-col gap-1">
                <a href="{{ route('organizer') }}" class="flex items-center p-3 rounded-lg bg-gray-700 text-orange-500">
                    <i class="fas fa-chart-line w-6 text-center mr-3"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="{{ route('organizer.information') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-user w-6 text-center mr-3"></i>
                    <span>Mes informations</span>
                </a>
                <a href="{{ route('organizer.events.index') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-calendar-check w-6 text-center mr-3"></i>
                    <span>Mes événements</span>
                </a>
                <a href="{{ route('organizer.billets') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-ticket-alt w-6 text-center mr-3"></i>
                    <span>Billets vendus</span>
                </a>
                <a href="{{ route('organizer.statistiques') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-chart-pie w-6 text-center mr-3"></i>
                    <span>Statistiques</span>
                </a>
                <a href="{{ route('organizer.payements') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-wallet w-6 text-center mr-3"></i>
                    <span>Paiements</span>
                </a>
                <a href="{{ route('organizer.participants') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-users w-6 text-center mr-3"></i>
                    <span>Participants</span>
                </a>
                
                <a href="{{ route('logout') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-sign-out-alt w-6 text-center mr-3"></i>
                    <span>Se déconnecter</span>
                </a>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-scroll">
            @hasSection('content')
                @yield('content')
            @else
                <!-- Header -->
                <div class="mb-6 sm:mb-8">
                    <h1 class="text-xl sm:text-2xl font-bold flex items-center">
                        <i class="fas fa-chart-line text-orange-500 mr-2"></i>
                        Tableau de bord
                    </h1>
                    <div class="border-b border-orange-500/20 mt-2"></div>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    <!-- Événements créés -->
                    <div class="bg-gray-800 p-4 sm:p-6 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-3xl sm:text-4xl font-bold">{{$eventsCount ? $eventsCount : 0}}</h3>
                                <h2 class="text-lg sm:text-xl mt-4 sm:mt-6 mb-2 sm:mb-3">Événements créés</h2>
                                <div class="border-b border-orange-500/20"></div>
                                <div class="flex items-center mt-2 sm:mt-3 text-xs sm:text-sm hover:text-orange-500 transition-colors duration-200 cursor-pointer">
                                    <a href="{{ route('organizer.events.index') }}">Voir tous les événements</a>
                                    <i class="fas fa-arrow-right ml-2 text-orange-500"></i>
                                </div>
                            </div>
                            <div class="bg-gray-700/70 w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar-plus text-sm sm:text-base"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Participants -->
                    <div class="bg-gray-800 p-4 sm:p-6 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-3xl sm:text-4xl font-bold text-orange-500">{{$participantsCount}} dans {{$eventsCount}}</h3>
                                <h2 class="text-lg sm:text-xl mt-4 sm:mt-6 mb-2 sm:mb-3">Participants par événement</h2>
                                <div class="border-b border-orange-500/20"></div>
                                <div class="flex items-center mt-2 sm:mt-3 text-xs sm:text-sm hover:text-orange-500 transition-colors duration-200 cursor-pointer">
                                    <a href="{{ route('organizer.participants') }}">Gérer les participants</a>
                                    <i class="fas fa-arrow-right ml-2 text-orange-500"></i>
                                </div>
                            </div>
                            <div class="bg-gray-700/70 w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center">
                                <i class="fas fa-users text-sm sm:text-base"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Revenus -->
                    <div class="bg-gray-800 p-4 sm:p-6 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-3xl sm:text-4xl font-bold text-orange-500">0,00 MAD</h3>
                                <h2 class="text-lg sm:text-xl mt-4 sm:mt-6 mb-2 sm:mb-3">Revenus totaux</h2>
                                <div class="border-b border-orange-500/20"></div>
                                <div class="flex items-center mt-2 sm:mt-3 text-xs sm:text-sm hover:text-orange-500 transition-colors duration-200 cursor-pointer">
                                    <a href="{{ route('organizer.payements') }}">Voir les transactions</a>
                                    <i class="fas fa-arrow-right ml-2 text-orange-500"></i>
                                </div>
                            </div>
                            <div class="bg-gray-700/70 w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center">
                                <i class="fas fa-money-bill-wave text-sm sm:text-base"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Prochains événements -->
                    <div class="bg-gray-800 p-4 sm:p-6 rounded-lg col-span-1 sm:col-span-2 lg:col-span-1">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg sm:text-xl font-semibold">Prochains événements</h2>
                            <a href="#" class="text-xs sm:text-sm text-orange-500 hover:underline">Voir tout</a>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center p-3 bg-gray-700/50 rounded-lg">
                                <div class="bg-orange-500/20 p-2 rounded-lg mr-3">
                                    <i class="fas fa-calendar-day text-orange-500"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm sm:text-base font-medium">Concert Jazz</h3>
                                    <p class="text-xs text-gray-400">15 Juin 2023</p>
                                </div>
                            </div>
                            <div class="flex items-center p-3 bg-gray-700/50 rounded-lg">
                                <div class="bg-orange-500/20 p-2 rounded-lg mr-3">
                                    <i class="fas fa-calendar-day text-orange-500"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm sm:text-base font-medium">Conférence Tech</h3>
                                    <p class="text-xs text-gray-400">22 Juin 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistiques récentes -->
                    <div class="bg-gray-800 p-4 sm:p-6 rounded-lg col-span-1 lg:col-span-2">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg sm:text-xl font-semibold">Statistiques récentes</h2>
                            <a href="#" class="text-xs sm:text-sm text-orange-500 hover:underline">Voir plus</a>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            <div class="text-center p-3 bg-gray-700/30 rounded-lg">
                                <p class="text-2xl font-bold text-orange-500">12</p>
                                <p class="text-xs sm:text-sm text-gray-400">Nouveaux participants</p>
                            </div>
                            <div class="text-center p-3 bg-gray-700/30 rounded-lg">
                                <p class="text-2xl font-bold text-orange-500">85%</p>
                                <p class="text-xs sm:text-sm text-gray-400">Taux de remplissage</p>
                            </div>
                            <div class="text-center p-3 bg-gray-700/30 rounded-lg">
                                <p class="text-2xl font-bold text-orange-500">3.2k</p>
                                <p class="text-xs sm:text-sm text-gray-400">Vues</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('menuToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>
</html>