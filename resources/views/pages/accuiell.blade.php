<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guichet.com - Billetterie en ligne</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <span class="text-2xl font-bold text-blue-600">Guichet</span>
                <span class="text-gray-500">@ store | Jb Voyage</span>
            </div>
            <div class="hidden md:flex space-x-6">
                <a href="#" class="font-medium text-gray-700 hover:text-blue-600">Billetterie</a>
                <a href="#" class="font-medium text-gray-700 hover:text-blue-600">Cinéma</a>
                <a href="#" class="font-medium text-gray-700 hover:text-blue-600">Voyage</a>
                <a href="#" class="font-medium text-gray-700 hover:text-blue-600">Sport</a>
            </div>
            <div class="flex items-center space-x-4">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Connexion</button>
            </div>
        </div>
    </header>

    <!-- Categories Navigation -->
    <div class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-3 overflow-x-auto">
            <div class="flex space-x-6 whitespace-nowrap">
                <a href="#" class="font-medium text-blue-600">+ Nostalgia Lovers Fest</a>
                <a href="#" class="font-medium text-gray-700">Cinéma</a>
                <a href="#" class="font-medium text-gray-700">® Sport</a>
                <a href="#" class="font-medium text-gray-700">* Concerts</a>
                <a href="#" class="font-medium text-gray-700">+ Théatre & Humour</a>
                <a href="#" class="font-medium text-gray-700">+ Festivals</a>
                <a href="#" class="font-medium text-gray-700">* Jeune Public</a>
                <a href="#" class="font-medium text-gray-700">* Salon & formation</a>
                <a href="#" class="font-medium text-gray-700">* Comediablanca</a>
                <a href="#" class="font-medium text-gray-700">* Sport</a>
            </div>
        </div>
    </div>

    <!-- Hero Banner -->
    <div class="bg-blue-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">COMEDIABLANCA</h1>
                    <p class="text-xl mb-4">MOROCCO MALL - CASABLANCA</p>
                    <p class="mb-4">(2% MOROCCO MALL</p>
                    <p class="mb-4">CASABLANCA</p>
                    <p class="mb-6">MOROCCO MALL</p>
                    <button class="bg-yellow-400 text-blue-900 px-6 py-3 rounded-md font-bold hover:bg-yellow-300">Acheter maintenant</button>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <div class="bg-gray-300 h-64 w-full max-w-md rounded-lg flex items-center justify-center">
                        <span class="text-gray-500">Image du concert</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Date Filters -->
    <div class="bg-white py-4 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex space-x-4 overflow-x-auto pb-2">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-md whitespace-nowrap">Aujourd'hui</button>
                <button class="bg-white border border-gray-300 px-4 py-2 rounded-md whitespace-nowrap">Cette semaine</button>
                <button class="bg-white border border-gray-300 px-4 py-2 rounded-md whitespace-nowrap">Ce weekend</button>
                <button class="bg-white border border-gray-300 px-4 py-2 rounded-md whitespace-nowrap">Ce mois-ci</button>
            </div>
        </div>
    </div>

    <!-- Events Grid -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Event Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gray-300 h-48 flex items-center justify-center">
                    <span class="text-gray-500">Image événement</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold text-lg">Du Tag a Bansky</h3>
                        <span class="bg-red-500 text-white text-xs px-2 py-1 rounded">SOLD OUT</span>
                    </div>
                    <p class="text-gray-600 mb-2">@ Institut francais de Casablanca</p>
                    <p class="text-gray-600 mb-2">19 Apr 2025 à 19:30</p>
                    <p class="font-bold text-blue-600 mb-4">90,00 MAD</p>
                    <button class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Voir détails</button>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gray-300 h-48 flex items-center justify-center">
                    <span class="text-gray-500">Image événement</span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Gravity Comedy Show</h3>
                    <p class="text-gray-600 mb-2">@ Gravity park - Marrakech</p>
                    <p class="text-gray-600 mb-2">19 Apr 2025 à 20:00</p>
                    <p class="font-bold text-blue-600 mb-4">170,00 MAD</p>
                    <button class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Acheter</button>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gray-300 h-48 flex items-center justify-center">
                    <span class="text-gray-500">Image événement</span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Atelier de Danse Indienne</h3>
                    <p class="text-gray-600 mb-2">@ Tempsdanse Schools</p>
                    <p class="text-gray-600 mb-2">20 avr. 2025 à 12:00</p>
                    <p class="font-bold text-blue-600 mb-4">100,00 MAD</p>
                    <button class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Acheter</button>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <button class="bg-white border border-blue-600 text-blue-600 px-6 py-2 rounded-md hover:bg-blue-50">Plus d'événements</button>
        </div>
    </div>

    <!-- Newsletter -->
    <div class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-4">RESTEZ INFORMÉS!</h2>
            <p class="mb-6 max-w-2xl mx-auto">Soyez le premier à profiter d'offres exclusives et à être informé des dernières nouveautés sur nos produits, le tout directement dans votre boite de réception.</p>
            <div class="max-w-md mx-auto flex">
                <input type="email" placeholder="Entrer votre adresse email" class="flex-grow px-4 py-2 rounded-l-md text-gray-900">
                <button class="bg-blue-600 px-6 py-2 rounded-r-md hover:bg-blue-700">S'inscrire</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="font-bold text-lg mb-4">Guichet</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Billetterie</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Qui sommes-nous ?</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Mentions légales</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4">Store</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Cinéma</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Voyage</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Sport</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4">Contactez nous</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4">Téléchargez l'application</h3>
                    <div class="flex space-x-2">
                        <button class="bg-black text-white px-3 py-2 rounded flex items-center">
                            <span class="mr-2">App Store</span>
                        </button>
                        <button class="bg-black text-white px-3 py-2 rounded flex items-center">
                            <span class="mr-2">Google Play</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>Guichet.com ! la plateforme numéro 1 de la billetterie digitalisée en Afrique. Elle met à la disposition des amoureux de la culture les meilleurs événements ! Entre des pièces théâtrales, des concerts, des festivals, ou même des matchs de Foot, Guichet.com transporte ses clients vers un univers révolutionnaire, ou divers événements leur sont proposés !</p>
                <p class="mt-4">© Copyright 2018 - 2025 Guichet.com - Tous droits réservés</p>
            </div>
        </div>
    </footer>
</body>
</html>