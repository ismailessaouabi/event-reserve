<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite('resources/css/app.css')
    <title>Event-reserve | Guichet en ligne</title>
</head>
<body class="bg-[#051529] text-white">
    <style>
        .active{
            border: 2px solid white;
            padding: 3px 8px;
            border-radius: 3px;
        }  
        .heddin{
            display: none;
        }
        .mobile-menu {
            display: none;
        }
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }
            .desktop-menu {
                display: none;
            }
            .search-container {
                order: 3;
                width: 100%;
                margin-top: 1rem;
            }
            .header-container {
                flex-wrap: wrap;
            }
            .nav-secondary {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            .footer-grid {
                grid-template-columns: 1fr !important;
                gap: 2rem !important;
            }
        }
    </style>
    <header class="bg-[#051529] w-full border-b border-gray-700">
        <div class="container w-full mx-auto px-4">
            <div class="header-container flex w-full justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="/" class="text-white font-bold text-xl md:text-2xl">
                        <i class="fa-regular fa-calendar-check text-xl md:text-2xl font-white"></i>
                        Event-reserve
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="mobile-menu md:hidden">
                    <button id="mobileMenuButton" class="text-white focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
                
                <form action="{{ route('events.home') }}" method="GET" class="search-container hidden md:flex space-x-4 mx-auto">
                    <div class="relative w-[200px] md:w-[300px] input_rechercher">
                        <input type="text" placeholder="Rechercher" name="name_event" class="bg-gray-800 w-full text-white rounded-full p-2 text-sm md:p-2.5 pr-8">
                        <i class="fas fa-search absolute right-3 top-2.5 md:top-3 text-gray-400"></i>
                        <div class="events_rechercher absolute z-50 bg-gray-800 w-full text-white rounded-lg text-sm">
                            @if(!empty($events_rechercher))
                                @foreach($events_rechercher as $event)
                                    <div class="py-1 flex px-2 hover:bg-gray-700 rounded">
                                        <img src="{{ Storage::url($event->image_path) }}" alt="" class="w-8 h-8 rounded-full mr-2">
                                        <a href="{{ route('accueil.event.show', $event->id) }}" class="truncate-2-lines">{{ $event->name }}</a>
                                    </div>
                                @endforeach
                            @endif                      
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 h-fit py-1.5 md:py-2 rounded-full text-sm">Rechercher</button>
                </form>
                
                <div class="desktop-menu flex items-center space-x-2 md:space-x-4">
                    <div class="flex items-center gap-1.5 md:gap-2.5">
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-full text-xs md:text-sm">Se connecter</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-full text-xs md:text-sm">S'inscrire</a>        
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu content -->
            <div id="mobileMenuContent" class="hidden md:hidden bg-[#051529] py-4 border-t border-gray-700">
                <form action="{{ route('events.home') }}" method="GET" class="mb-4">
                    <div class="relative input_rechercher">
                        <input type="text" placeholder="Rechercher" name="name_event" class="bg-gray-800 w-full text-white rounded-full p-2 text-sm pr-8">
                        <i class="fas fa-search absolute right-3 top-2.5 text-gray-400"></i>
                        <div class="events_rechercher absolute z-50 bg-gray-800 w-full text-white rounded-lg text-sm">
                            @if(!empty($events_rechercher))
                                @foreach($events_rechercher as $event)
                                    <div class="py-1 flex px-2 hover:bg-gray-700 rounded">
                                        <img src="{{ Storage::url($event->image_path) }}" alt="" class="w-8 h-8 rounded-full mr-2">
                                        <a href="{{ route('accueil.event.show', $event->id) }}" class="truncate-2-lines">{{ $event->name }}</a>
                                    </div>
                                @endforeach
                            @endif                      
                        </div>
                    </div>
                    <button type="submit" class="mt-2 bg-blue-600 text-white w-full py-2 rounded-full text-sm">Rechercher</button>
                </form>
                
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white text-center py-2 rounded-full text-sm">Se connecter</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white text-center py-2 rounded-full text-sm">S'inscrire</a>
                </div>
            </div>
            
            <!-- Navigation secondaire -->
            <nav class="nav-secondary overflow-x-auto whitespace-nowrap py-2 -mx-4 px-4">
                <div class="flex space-x-4 md:space-x-6">
                    @foreach ($categories as $category)
                        <a href="{{ route('eventsparcategory' , $category->id)}}" class="category text-white font-medium text-sm md:text-base {{ request()->route('id') == $category->id ? 'active' : '' }}">{{ $category->name }}</a>
                    @endforeach
                    
                    <div class="ml-auto flex items-center space-x-4">
                        <a href="#" class="text-gray-300 text-xs md:text-sm">Aide & Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="container mx-auto w-full px-4 py-6 md:py-8 bg-[#051529]">
        @yield('content')
    </section>

    <footer class="bg-[#051529] py-8 md:py-10 border-t border-gray-700">
        <div class="container mx-auto px-4">
            <div class="footer-grid grid grid-cols-2 md:grid-cols-5 gap-6">
                <div class="col-span-2 md:col-span-1">
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
                    <h3 class="text-white font-medium mb-3 md:mb-4">Explorer</h3>
                    <ul class="text-gray-400 text-xs md:text-sm space-y-1.5 md:space-y-2">
                        <li><a href="#" class="hover:text-white">Événements</a></li>
                        <li><a href="#" class="hover:text-white">Théâtre</a></li>
                        <li><a href="#" class="hover:text-white">Concerts</a></li>
                        <li><a href="#" class="hover:text-white">Festivals</a></li>
                        <li><a href="#" class="hover:text-white">Sport</a></li>
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-medium mb-3 md:mb-4">Service client</h3>
                    <ul class="text-gray-400 text-xs md:text-sm space-y-1.5 md:space-y-2">
                        <li><a href="#" class="hover:text-white">Mon compte</a></li>
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                        <li><a href="#" class="hover:text-white">Comment ça marche</a></li>
                        <li><a href="#" class="hover:text-white">Politiques de remboursement</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-medium mb-3 md:mb-4">Termes & Conditions</h3>
                    <ul class="text-gray-400 text-xs md:text-sm space-y-1.5 md:space-y-2">
                        <li><a href="#" class="hover:text-white">Politique de confidentialité</a></li>
                        <li><a href="#" class="hover:text-white">Termes d'utilisation</a></li>
                        <li><a href="#" class="hover:text-white">Conditions générales de vente</a></li>
                    </ul>
                </div>
                
                <div class="col-span-2 md:col-span-1">
                    <h3 class="text-white font-medium mb-3 md:mb-4">Téléchargez l'application</h3>
                    <div class="flex flex-col space-y-2">
                        <a href="#" class="block">
                            <img src="/api/placeholder/120/40" alt="App Store" class="h-8 md:h-10">
                        </a>
                        <a href="#" class="block">
                            <img src="/api/placeholder/120/40" alt="Google Play" class="h-8 md:h-10">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
       

        // Menu mobile - Correction ici
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenuContent = document.getElementById('mobileMenuContent');
        
        if (mobileMenuButton && mobileMenuContent) {
            mobileMenuButton.addEventListener('click', function(e) {
                e.preventDefault(); // Empêche tout comportement par défaut
                mobileMenuContent.classList.toggle('hidden');
                // Changement d'icône quand le menu est ouvert/fermé
                const icon = this.querySelector('i');
                if (mobileMenuContent.classList.contains('hidden')) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                }
            });
        }

        // Fermer le menu quand on clique à l'extérieur
        document.addEventListener('click', function(e) {
            if (mobileMenuContent && !mobileMenuContent.contains(e.target) && 
                mobileMenuButton && !mobileMenuButton.contains(e.target)) {
                mobileMenuContent.classList.add('hidden');
                const icon = mobileMenuButton.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Gestion de la recherche
        const inputRechercher = document.querySelector('.input_rechercher input');
        const eventsRechercher = document.querySelector('.events_rechercher');
        
        if (inputRechercher && eventsRechercher) {
            inputRechercher.addEventListener('focus', function() {
                eventsRechercher.classList.remove('heddin');
            });
            
            document.addEventListener('click', function(event) {
                if (!eventsRechercher.contains(event.target) {
                    eventsRechercher.classList.add('heddin');
                }
            });
        }
    });
</script>
</body>
</html>