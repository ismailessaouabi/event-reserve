<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #0a192f;
            color: white;
        }
        .sidebar {
            background-color: #0f2544;
            min-height: 100vh;
        }
        .card {
            background-color: #0f2544;
            border-radius: 8px;
        }
        .orange-text {
            color: #ff6b35;
        }
        .nav-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .nav-item:hover {
            background-color: #1a3152;
            border-radius: 6px;
        }
        .stat-card {
            padding: 20px;
            position: relative;
        }
        .icon-circle {
            background-color: rgba(30, 41, 59, 0.7);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .divider {
            border-bottom: 1px solid #ff6b3544;
        }
    </style>
</head>
<body>
    <div class="flex">
        <!-- Sidebar -->
        <div class="sidebar w-72 p-4 flex flex-col">
            <!-- User Profile -->
            <div class="flex items-center mb-8 p-2">
                <div class="w-12 h-12 bg-gray-300 rounded-full mr-3 overflow-hidden">
                    <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="w-full h-full object-cover">
                </div>
                <span class="text-lg font-semibold">ail Essao</span>
            </div>
            
            <!-- Navigation -->
            <nav class="flex flex-col gap-2">
                <div class="nav-item text-orange-500">
                    <i class="fas fa-chart-line"></i>
                    <span>Tableau de bord</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-user"></i>
                    <span>Mes informations</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-calendar-check"></i>
                    <span>Mes réservations</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-heart"></i>
                    <span>Mes favoris</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-wallet"></i>
                    <span>Mon solde</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-lock"></i>
                    <span>Sécurité</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-user-slash"></i>
                    <span>Désactivation et suppression</span>
                </div>
            </nav>
            
            <!-- Logout Button -->
            <div class="mt-auto">
                <div class="nav-item cursor-pointer">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Se déconnecter</span>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8">
            @hasSection('content')
                @yield('content')
            @else
                <!-- Header -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold flex items-center">
                        <i class="fas fa-chart-line text-orange-500 mr-2"></i>
                        Tableau de bord
                    </h1>
                    <div class="divider mt-2"></div>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-3 gap-6">
                    <!-- Commandes validées -->
                    <div class="card stat-card">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-4xl font-bold">0</h3>
                                <h2 class="text-xl mt-6 mb-3">Commandes validées</h2>
                                <div class="divider"></div>
                                <div class="flex items-center mt-3 text-sm">
                                    <span>Historique des commandes</span>
                                    <i class="fas fa-arrow-right ml-2 text-orange-500"></i>
                                </div>
                            </div>
                            <div class="icon-circle">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Total dépensé -->
                    <div class="card stat-card">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-4xl font-bold text-orange-500">0,00 MAD</h3>
                                <h2 class="text-xl mt-6 mb-3">Total dépensé</h2>
                                <div class="divider"></div>
                                <div class="flex items-center mt-3 text-sm">
                                    <span>Historique des commandes</span>
                                    <i class="fas fa-arrow-right ml-2 text-orange-500"></i>
                                </div>
                            </div>
                            <div class="icon-circle">
                                <i class="fas fa-receipt"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Solde actuel -->
                    <div class="card stat-card">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-4xl font-bold text-orange-500">0,00 MAD</h3>
                                <h2 class="text-xl mt-6 mb-3">Solde actuel</h2>
                                <div class="divider"></div>
                                <div class="flex items-center mt-3 text-sm">
                                    <span>Historique des transactions</span>
                                    <i class="fas fa-arrow-right ml-2 text-orange-500"></i>
                                </div>
                            </div>
                            <div class="icon-circle">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>