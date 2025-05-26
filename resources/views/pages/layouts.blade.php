<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite('resources/css/app.css')
    <title>Event-reserve | Guichet en ligne</title>
</head>
<body class="bg-[#051529] text-white ">
    <style>
    .active{
        border: 2px solid white;
        padding: 3px 8px;
        border-radius: 3px;
       }       
    </style>
    <header class="bg-[#051529] w-full border-b border-gray-700">
        <div class="container w-full mx-auto px-4">
            <div class="flex w-full justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="/" class="text-white font-bold text-2xl">
                        <i class="fa-regular fa-calendar-check text-2xl font-white"></i>
                        Event-reserve
                    </a>
                </div>
                
                <form action="{{ route('events.home') }}" method="GET" class="hidden md:flex space-x-4 mx-auto">
                    <div class="relative w-[300px]  ">
                        <input type="text" placeholder="Rechercher" name="name_event" class="bg-gray-800 w-full text-white rounded-full p-2.5 text-sm pr-8">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                    @if(isset($events_rechercher))
                        @foreach($events_rechercher as $event)
                            <div class="relative w-[300px]  ">
                                <a href="{{ route('accueil.event.show', $event->id) }}" class="bg-gray-800 w-full text-white rounded-full p-2.5 text-sm pr-8">{{$event->name}}</a>
                            </div>
                        @endforeach
                    @else
                        <div class="relative w-[300px]  ">
                            <p class="bg-gray-800 w-full text-white rounded-full p-2.5 text-sm pr-8">aucune recherche</p>
                        </div>
                    @endif

                    
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm">Rechercher</button>
                </form>
                
                <div class="flex items-center space-x-4">
                    
                    <div class="flex items-center gap-2.5">
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm">Se connecter</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm">S'inscrire</a>        
                    </div>
                </div>
            </div>
            
            <!-- Navigation secondaire -->
            <nav class="overflow-x-auto whitespace-nowrap py-2 -mx-4 px-4 hidden md:block">
                <div class="flex space-x-6">
                    @foreach ($categories as $category)
                        <a href="{{ route('eventsparcategory' , $category->id)}}" class="category text-white font-medium {{ request()->route('id') == $category->id ? 'active' : '' }} ">{{ $category->name }}</a>
                    @endforeach
                    
                    <div class="ml-auto flex items-center space-x-4">
                        <a href="#" class="text-gray-300 text-sm">Aide & Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    <section class="container mx-auto w-full px-4 py-8 bg-[#051529]">
        @yield('content')
    </section>



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
                </div>
            </div>
        </div>
    </footer>
    <script>

    document.addEventListener('DOMContentLoaded', function() {
        const categoryLinks = document.querySelectorAll('.category');
        categoryLinks.forEach(link => {
            link.addEventListener('click', function() {
                categoryLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script> 
</body>
</html>