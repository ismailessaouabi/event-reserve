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
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar - Mobile first hidden, visible on md and up -->
        <div class="sidebar w-full md:w-72 p-4 flex flex-col fixed md:static inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50" id="sidebar">
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
        
        <!-- Mobile menu button -->
        <button class="md:hidden fixed top-4 left-4 z-50 p-2 rounded-md bg-indigo-600 text-white" id="menuButton">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Main Content -->
        <div class="flex-1 p-4 md:p-8 mt-16 md:mt-0">
            <!-- Header -->
            <div class="mb-6 md:mb-8">
                <h1 class="text-xl md:text-2xl font-bold flex items-center">
                    <i class="fas fa-chart-line text-orange-500 mr-2"></i>
                    Tableau de bord
                </h1>
                <div class="divider mt-2"></div>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <!-- Commandes validées -->
                <div class="card stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-3xl md:text-4xl font-bold">0</h3>
                            <h2 class="text-lg md:text-xl mt-4 md:mt-6 mb-2 md:mb-3">Commandes validées</h2>
                            <div class="divider"></div>
                            <div class="flex items-center mt-2 md:mt-3 text-xs md:text-sm">
                                <span>Historique des commandes</span>
                                <i class="fas fa-arrow-right ml-1 md:ml-2 text-orange-500"></i>
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
                            <h3 class="text-3xl md:text-4xl font-bold text-orange-500">0,00 MAD</h3>
                            <h2 class="text-lg md:text-xl mt-4 md:mt-6 mb-2 md:mb-3">Total dépensé</h2>
                            <div class="divider"></div>
                            <div class="flex items-center mt-2 md:mt-3 text-xs md:text-sm">
                                <span>Historique des commandes</span>
                                <i class="fas fa-arrow-right ml-1 md:ml-2 text-orange-500"></i>
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
                            <h3 class="text-3xl md:text-4xl font-bold text-orange-500">0,00 MAD</h3>
                            <h2 class="text-lg md:text-xl mt-4 md:mt-6 mb-2 md:mb-3">Solde actuel</h2>
                            <div class="divider"></div>
                            <div class="flex items-center mt-2 md:mt-3 text-xs md:text-sm">
                                <span>Historique des transactions</span>
                                <i class="fas fa-arrow-right ml-1 md:ml-2 text-orange-500"></i>
                            </div>
                        </div>
                        <div class="icon-circle">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('menuButton').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>
</html>