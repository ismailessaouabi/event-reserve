<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>event-reserve</title>
</head>
<body>
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm0 18a8 8 0 110-16 8 8 0 010 16zm1-11a1 1 0 10-2 0v3a1 1 0 00.293.707l2 2a1 1 0 101.414-1.414L11 9.586V7z"/>
                    </svg>
                    <span class="text-xl font-bold text-gray-800">MonLogo</span>
                </a>

                <!-- Navigation Desktop -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-800 hover:text-blue-600 font-medium">Accueil</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 font-medium">Services</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 font-medium">À propos</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 font-medium">Contact</a>
                </nav>

                <!-- Boutons -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" class="px-4 py-2 text-gray-800 font-medium hover:text-blue-600">Connexion</a>
                    <a href="#" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-300">Inscription</a>
                </div>

                <!-- Menu Mobile -->
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-800 hover:text-blue-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menu Mobile déroulant -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#" class="block px-3 py-2 text-gray-800 hover:bg-gray-100 rounded">Accueil</a>
                    <a href="#" class="block px-3 py-2 text-gray-800 hover:bg-gray-100 rounded">Services</a>
                    <a href="#" class="block px-3 py-2 text-gray-800 hover:bg-gray-100 rounded">À propos</a>
                    <a href="#" class="block px-3 py-2 text-gray-800 hover:bg-gray-100 rounded">Contact</a>
                    <div class="border-t border-gray-200 pt-3">
                        <a href="#" class="block px-3 py-2 text-gray-800 hover:bg-gray-100 rounded">Connexion</a>
                        <a href="#" class="block px-3 py-2 bg-blue-600 text-white text-center rounded-md hover:bg-blue-700 transition duration-300">Inscription</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <style>
        main {
    background-image: url('../../public/assets/mariage-img.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition : background-image 0.5s ease-in-out;
}
    </style>
    <main class="w-full h-screen " >

    </main>
    <!-- Script pour le menu mobile -->
    <script>
        // Toggle mobile menu
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
        let index = 0;
        let images = [
            './assets/mariage-img.jpg',
            './assets/salle-concerne-img.jpg',
            './assets/téléchargement.png',

            
        ];
        const main = document.querySelector('main');
        setInterval(() => {
            
            main.style.backgroundImage = `url(${images[index]})`;
            index++;
            if (index >= images.length) {
                index = 0;
            }
        }, 5000);
    </script>
</body>
</html>