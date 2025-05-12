<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guichet - Billetterie d'événements</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #051529;
            color: white;
        }
        
        .event-card {
            transition: transform 0.3s ease;
        }
        
        .event-card:hover {
            transform: translateY(-5px);
        }

        .truncate-2-lines {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Header -->
    <header class="bg-[#051529] border-b border-gray-700">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="#" class="text-white font-bold text-2xl">
                        <img src="/api/placeholder/120/40" alt="Guichet Logo" class="h-8">
                    </a>
                </div>
                
                <div class="hidden md:flex space-x-4 mx-auto">
                    <button class="bg-white text-blue-900 px-3 py-1 rounded-full text-sm font-medium">FR</button>
                    <button class="text-white px-2 py-1 rounded-full text-sm font-medium">EN</button>
                    <div class="px-4">|</div>
                    <div class="relative">
                        <input type="text" placeholder="Rechercher" class="bg-gray-800 text-white rounded-full py-1 px-4 text-sm pr-8">
                        <i class="fas fa-search absolute right-3 top-2 text-gray-400"></i>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex space-x-4">
                        <a href="#" class="text-white">Store</a>
                        <a href="#" class="text-white">Voyage</a>
                        <a href="#" class="text-white">Cinéma</a>
                        <a href="#" class="text-white">Sport</a>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('login') }}" class="bg-red-600 text-white px-4 py-2 rounded-full text-sm">Se connecter</a>
                        <a href="{{ route('register') }}" class="bg-red-600 text-white px-4 py-2 rounded-full text-sm">S'inscrire</a>

                        <div class="ml-4 relative">
                            <button class="flex items-center justify-center w-8 h-8 bg-gray-700 rounded-full">
                                <i class="fas fa-user text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation secondaire -->
            <nav class="overflow-x-auto whitespace-nowrap py-2 -mx-4 px-4 hidden md:block">
                <div class="flex space-x-6">
                    @foreach ($categories as $category)
                        <a href="#" class="text-white font-medium">{{ $category->name }}</a>
                    @endforeach
                    
                    <div class="ml-auto flex items-center space-x-4">
                        <a href="#" class="text-gray-300 text-sm">Aide & Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Featured Events Banner Section -->
    <section class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Featured Event 1 -->
            <div class="relative rounded-lg overflow-hidden h-64">
                <img src="/api/placeholder/400/320" alt="Festival" class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                    <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold">FESTIVAL</span>
                    <h3 class="text-white font-bold mt-2">Festival de la Comédie Arabe</h3>
                    <p class="text-gray-200 text-sm">15-26 Jun 2023</p>
                </div>
            </div>
            
            <!-- Featured Event 2 -->
            <div class="relative rounded-lg overflow-hidden h-64">
                <img src="/api/placeholder/400/320" alt="REDMA Concert" class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                    <span class="bg-red-600 text-white px-2 py-1 rounded text-xs font-bold">CONCERT</span>
                    <h3 class="text-white font-bold mt-2">REDMA</h3>
                    <p class="text-gray-200 text-sm">15.06.2023 • Morocco Mall</p>
                </div>
            </div>
            
            <!-- Featured Event 3 -->
            <div class="relative rounded-lg overflow-hidden h-64">
                <img src="/api/placeholder/400/320" alt="Stand-up Show" class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                    <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs font-bold">STAND-UP</span>
                    <h3 class="text-white font-bold mt-2">L'Irresistible Show de Oualas</h3>
                    <p class="text-gray-200 text-sm">07.06.2023 • Megarama</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-2">
                <button class="bg-blue-900 px-3 py-1 rounded text-xs font-medium">Aujourd'hui</button>
                <button class="bg-gray-800 px-3 py-1 rounded text-xs font-medium">Cette semaine</button>
                <button class="bg-gray-800 px-3 py-1 rounded text-xs font-medium">Ce weekend</button>
                <button class="bg-gray-800 px-3 py-1 rounded text-xs font-medium">Ce mois-ci</button>
            </div>
        </div>
        
        <!-- Events Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
            <!-- Event Card 1 -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Comedy Festival" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">Comédie Français</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Juste pour rire</h3>
                    <p class="text-gray-400 text-xs mt-1">26 Juin 2023 à 20:30</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Théâtre Français de Casablanca</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">70,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- Event Card 2 -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Comedy Show" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">Comédie Show</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Grande Comédie Show - Le plus fou des soirées comiques</h3>
                    <p class="text-gray-400 text-xs mt-1">15 Juin 2023 à 20:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Complexe Culturel ESPACE ROUDANI</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">150,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- Event Card 3 -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Music Event" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-yellow-500 text-black px-2 py-1 rounded text-xs">MUSIC EVENT</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Soirée Red & Conditions</h3>
                    <p class="text-gray-400 text-xs mt-1">17 Juin 2023 à 22:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Complexe Événementiel BOULTEK</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">200,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- Event Card 4 - Sold Out -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Rappers Night" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-purple-500 text-white px-2 py-1 rounded text-xs">Rap & Pop</span>
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <span class="bg-red-600 text-white px-4 py-2 rounded-lg font-bold">SOLD OUT</span>
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Rappers Delight: Al Hoceima</h3>
                    <p class="text-gray-400 text-xs mt-1">12 Juin 2023 à 23:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Quartier Mirador, Al Hoceima</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">250,00 MAD</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- All Events Section -->
    <section class="container mx-auto px-4 py-4">
        <h2 class="text-xl font-bold text-white mb-6">Tous les événements</h2>
        
        <!-- Events Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
            <!-- Event Card 1 -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Comedy Festival" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">Comédie Français</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Juste pour rire</h3>
                    <p class="text-gray-400 text-xs mt-1">26 Juin 2023 à 20:30</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Théâtre Français de Casablanca</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">70,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- Event Card 2 -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Comedy Show" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">Comédie Show</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Grande Comédie Show</h3>
                    <p class="text-gray-400 text-xs mt-1">15 Juin 2023 à 20:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Complexe Culturel ESPACE ROUDANI</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">150,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- Event Card 3 -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Music Event" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-yellow-500 text-black px-2 py-1 rounded text-xs">MUSIC EVENT</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Soirée Red & Conditions</h3>
                    <p class="text-gray-400 text-xs mt-1">17 Juin 2023 à 22:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Complexe Événementiel BOULTEK</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">200,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- Event Card 4 - Sold Out -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Rap Event" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-purple-500 text-white px-2 py-1 rounded text-xs">Soirée punk à franges</span>
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <span class="bg-red-600 text-white px-4 py-2 rounded-lg font-bold">SOLD OUT</span>
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Soirée & Night</h3>
                    <p class="text-gray-400 text-xs mt-1">22 Juin 2023 à 23:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Théâtre de Rabat, Agdal</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">220,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- Event Card 5 - Sold Out -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Chef Event" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 rounded text-xs">FOOD FESTIVAL</span>
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <span class="bg-red-600 text-white px-4 py-2 rounded-lg font-bold">SOLD OUT</span>
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">CHEF SHOW SPECIALE</h3>
                    <p class="text-gray-400 text-xs mt-1">28 Juin 2023 à 19:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Restaurant Le Montana, Marrakech</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">400,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- More event cards... -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Festival" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded text-xs">CASE SPECIAL</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">GRANDE SPECTACLE CIRKA MOROCCO</h3>
                    <p class="text-gray-400 text-xs mt-1">30 Juin 2023 à 16:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Complexe City Arena, Rabat</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">300,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Concert Jazz" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-yellow-500 text-black px-2 py-1 rounded text-xs">JAZZ EVENT</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Jazz Night avec Mehram & Orquesta</h3>
                    <p class="text-gray-400 text-xs mt-1">22 Juin 2023 à 21:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Théâtre National Mohammed V</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">180,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Festival" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-teal-500 text-white px-2 py-1 rounded text-xs">TEX Production</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">MALI 2 SHOW - CASABLANCA</h3>
                    <p class="text-gray-400 text-xs mt-1">05 Jul 2023 à 20:30</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Complexe Sportif Anfa, Casablanca</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">250,00 MAD</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mb-10">
            <button class="bg-gray-800 text-white px-6 py-2 rounded-full hover:bg-gray-700 transition">Plus d'événements</button>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="bg-gray-900 py-8">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="text-xl font-bold text-white mb-4">RESTEZ INFORMÉ!</h2>
                <p class="text-gray-300 mb-6 max-w-lg mx-auto text-sm">Inscrivez-vous à notre newsletter et soyez le premier à être informé des nouvelles actualités et des nouvelles sorties de billets!</p>
                
                <div class="max-w-md mx-auto flex">
                    <input type="email" placeholder="Votre adresse email" class="bg-gray-800 text-white px-4 py-2 rounded-l-lg flex-grow">
                    <button class="bg-red-600 text-white px-4 py-2 rounded-r-lg font-medium">S'inscrire</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#051529] py-10 border-t border-gray-700">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                <div>
                    <img src="/api/placeholder/120/40" alt="Guichet Logo" class="h-8 mb-4">
                    <p class="text-gray-400 text-xs mb-4">Guichet est une plateforme de billetterie innovante qui offre une expérience utilisateur optimale pour acheter des billets d'événements au Maroc.</p>
                    <div class="flex space-x-3">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-white font-medium mb-4">Explorer</h3>
                    <ul class="text-gray-400 text-sm space-y-2">
                        <li><a href="#" class="hover:text-white">Événements</a></li>
                        <li><a href="#" class="hover:text-white">Théâtre</a></li>
                        <li><a href="#" class="hover:text-white">Concerts</a></li>
                        <li><a href="#" class="hover:text-white">Festivals</a></li>
                        <li><a href="#" class="hover:text-white">Sport</a></li>
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-medium mb-4">Service client</h3>
                    <ul class="text-gray-400 text-sm space-y-2">
                        <li><a href="#" class="hover:text-white">Mon compte</a></li>
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                        <li><a href="#" class="hover:text-white">Comment ça marche</a></li>
                        <li><a href="#" class="hover:text-white">Politiques de remboursement</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-medium mb-4">Termes & Conditions</h3>
                    <ul class="text-gray-400 text-sm space-y-2">
                        <li><a href="#" class="hover:text-white">Politique de confidentialité</a></li>
                        <li><a href="#" class="hover:text-white">Termes d'utilisation</a></li>
                        <li><a href="#" class="hover:text-white">Conditions générales de vente</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-medium mb-4">Téléchargez l'application</h3>
                    <div class="flex flex-col space-y-2">
                        <a href="#" class="block">
                            <img src="/api/placeholder/120/40" alt="App Store" class="h-10">
                        </a>
                        <a href="#" class="block">
                            <img src="/api/placeholder/120/40" alt="Google Play" class="h-10">
                        </a>
                    </div>