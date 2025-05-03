<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>event-reserve</title>
</head>
<body class="bg-[#011127]">
    <style>
            html,
            body {
                position: relative;
                height: 100%;
            }

            body {
                background: #eee;
                font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                font-size: 14px;
                color: #000;
                margin: 0;
                padding: 0;
            }

            swiper-container {
                width: 100%;
                height: 95%;
                background: #011127;
            }

            swiper-slide {
                width: 70%;
                height: 100%;
                text-align: center;
                font-size: 18px;
                background: #011127;
                display: flex;
                justify-content: space-around;
                align-items: center;
                }

            swiper-slide img {
                border-radius: 10px;
                display: block;
                width: 30%;
                height: 80%;
                object-fit: cover;
            }
  
    </style>
    <!-- Header -->
    <header class="bg-[#011127] shadow-md sticky top-0 z-50 border-b-2 border-white">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href='/' class="flex items-center space-x-2">
                <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm0 18a8 8 0 110-16 8 8 0 010 16zm1-11a1 1 0 10-2 0v3a1 1 0 00.293.707l2 2a1 1 0 101.414-1.414L11 9.586V7z"/>
                </svg>
                <span class="text-xl font-bold text-white">MonLogo</span>
            </a>
            
            <!-- Hamburger menu pour mobile -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Barre de recherche - cachée sur mobile -->
            <div class="hidden md:block relative">
                <div class="flex">
                    <input type="text" placeholder="Rechercher un événement" class="px-4 py-2 rounded-l-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <button class="px-4 py-2 bg-blue-600 text-white font-medium rounded-r-md hover:bg-blue-700 transition duration-300">Rechercher</button>
                </div>
            </div>
            
            <!-- Boutons - cachés sur mobile -->
            <div class="hidden md:flex items-center space-x-4">
                <x-eos-lightbulb-o class="h-6 w-6 text-white" />
                <a href="{{route('login')}}" class="px-4 py-2 text-white font-medium hover:text-blue-600">Connexion</a>
                <a href="{{route('register')}}" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-300">Inscription</a>
            </div>
        </div>
        
        <!-- Menu mobile - s'affiche seulement quand on clique sur le hamburger -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-2">
            <div class="mb-4">
                <div class="flex">
                    <input type="text" placeholder="Rechercher un événement" class="w-full px-4 py-2 rounded-l-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <button class="px-2 py-2 bg-blue-600 text-white font-medium rounded-r-md hover:bg-blue-700 transition duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-col space-y-2">
                <div class="flex items-center space-x-2">
                    <x-eos-lightbulb-o class="h-6 w-6 text-white" />
                    <span class="text-white">Aide</span>
                </div>
                <a href="#" class="px-4 py-2 text-white font-medium hover:text-blue-600">Connexion</a>
                <a href="#" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-300 text-center">Inscription</a>
            </div>
        </div>
    </div>
</header>
    <!-- Nav catégories -->
    
    <ul class="bg-[#011127] w-full flex justify-start gap-4 px-[60px] shadow-md sticky pt-5  top-0 z-50">        
        <li><a href="#" class="text-white text-[20px] border-2 px-3 py-1.5 border-[#122034] font-semibold hover:text-blue-600">Festivals</a></li>
        <li><a href="#" class="text-white text-[20px] border-2 px-3 py-1.5 border-[#122034] font-semibold hover:text-blue-600">Festivals</a></li>
        <li><a href="#" class="text-white text-[20px] border-2 px-3 py-1.5 border-[#122034] font-semibold hover:text-blue-600">Festivals</a></li>
        <li><a href="#" class="text-white text-[20px] border-2 px-3 py-1.5 border-[#122034] font-semibold hover:text-blue-600">Festivals</a></li>
        <li><a href="#" class="text-white text-[20px] border-2 px-3 py-1.5 border-[#122034] font-semibold hover:text-blue-600">Festivals</a></li>
        <li><a href="#" class="text-white text-[20px] border-2 px-3 py-1.5 border-[#122034] font-semibold hover:text-blue-600">Festivals</a></li>
        <li><a href="#" class="text-white text-[20px] border-2 px-3 py-1.5 border-[#122034] font-semibold hover:text-blue-600">Festivals</a></li>
    </ul>
    <!-- Swiper slider -->
    <swiper-container class="mySwiper" loop="true" pagination="true" pagination-clickable="true" navigation="true" space-between="30"
        centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
        <swiper-slide>
            <img src="{{ asset('assets/g.jpg') }}" alt="">
            <img src="{{ asset('assets/g1.jpg') }}" alt="">
            <img src="{{ asset('assets/g3.jpg') }}" alt="">
        </swiper-slide>
        <swiper-slide>
            <img src="{{ asset('assets/g4.jpg') }}" alt="">
            <img src="{{ asset('assets/g5.png') }}" alt="">
            <img src="{{ asset('assets/g6.jpg') }}" alt="">
        </swiper-slide>
        <swiper-slide>
            <img src="{{ asset('assets/g7.jpg') }}" alt="">
            <img src="{{ asset('assets/g8.jpg') }}" alt="">
            <img src="{{ asset('assets/g9.jpg') }}" alt="">
        </swiper-slide>
    </swiper-container>
    <!-- nav pour choisir la durée -->
    <ul class="bg-[#011127] w-full flex justify-center gap-4 px-[60px] shadow-md sticky pt-5  top-0 z-50">
        <li><a href="#" class="text-white text-[20px] border-b-2 font-semibold hover:text-blue-600 ">Festivals</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Aujourd'hui</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Cette semaine</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Ce week-end</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Ce mois-ci</a></li>
    </ul>
    <!-- List events -->
    <section class="w-full px-10 bg-[#011127] pt-9 flex justify-center gap-2 flex-wrap">
        
        <div class="w-[23%] hover:bg-[#122034] rounded-2xl cursor-pointer text-[#9ba5b7] p-5 items-start flex flex-col gap-2.5 ">
            <h3 class="text-white text-2xl font-medium ">Noujoum Event</h3>
            <div class="w-full flex justify-start "><img class="w-[90%] rounded-2xl" src="{{asset('assets/g8.jpg')}}"></div>
            <h3 class="text-[18px] w-full">La Grande Soiree de Issawa à Casablanca</h3>
            <p class="text-[18px]">Complexe El Hassani ELjadida</p>
            <p class="text-[18px]">Du 20 Avril au 24 Avril</p>
            <button class="text-[18px]">300 DH</button>
        </div>
        <div class="w-[23%] hover:bg-[#122034] rounded-2xl cursor-pointer text-[#9ba5b7] p-5 items-start flex flex-col gap-2.5 ">
            <h3 class="text-white text-2xl font-medium ">Noujoum Event</h3>
            <div class="w-full flex justify-start "><img class="w-[90%] rounded-2xl" src="{{asset('assets/g8.jpg')}}"></div>
            <h3 class="text-[18px] w-full">La Grande Soiree de Issawa à Casablanca</h3>
            <p class="text-[18px]">Complexe El Hassani ELjadida</p>
            <p class="text-[18px]">Du 20 Avril au 24 Avril</p>
            <button class="text-[18px]">300 DH</button>
        </div>
        <div class="w-[23%] hover:bg-[#122034] rounded-2xl cursor-pointer text-[#9ba5b7] p-5 items-start flex flex-col gap-2.5 ">
            <h3 class="text-white text-2xl font-medium ">Noujoum Event</h3>
            <div class="w-full flex justify-start "><img class="w-[90%] rounded-2xl" src="{{asset('assets/g8.jpg')}}"></div>
            <h3 class="text-[18px] w-full">La Grande Soiree de Issawa à Casablanca</h3>
            <p class="text-[18px]">Complexe El Hassani ELjadida</p>
            <p class="text-[18px]">Du 20 Avril au 24 Avril</p>
            <button class="text-[18px]">300 DH</button>
        </div>
        <div class="w-[23%] hover:bg-[#122034] rounded-2xl cursor-pointer text-[#9ba5b7] p-5 items-start flex flex-col gap-2.5 ">
            <h3 class="text-white text-2xl font-medium ">Noujoum Event</h3>
            <div class="w-full flex justify-start "><img class="w-[90%] rounded-2xl" src="{{asset('assets/g8.jpg')}}"></div>
            <h3 class="text-[18px] w-full">La Grande Soiree de Issawa à Casablanca</h3>
            <p class="text-[18px]">Complexe El Hassani ELjadida</p>
            <p class="text-[18px]">Du 20 Avril au 24 Avril</p>
            <button class="text-[18px]">300 DH</button>
        </div>
        <div class="w-[23%] hover:bg-[#122034] rounded-2xl cursor-pointer text-[#9ba5b7] p-5 items-start flex flex-col gap-2.5 ">
            <h3 class="text-white text-2xl font-medium ">Noujoum Event</h3>
            <div class="w-full flex justify-start "><img class="w-[90%] rounded-2xl" src="{{asset('assets/g8.jpg')}}"></div>
            <h3 class="text-[18px] w-full">La Grande Soiree de Issawa à Casablanca</h3>
            <p class="text-[18px]">Complexe El Hassani ELjadida</p>
            <p class="text-[18px]">Du 20 Avril au 24 Avril</p>
            <button class="text-[18px]">300 DH</button>
        </div>
        <div class="w-[23%] hover:bg-[#122034] rounded-2xl cursor-pointer text-[#9ba5b7] p-5 items-start flex flex-col gap-2.5 ">
            <h3 class="text-white text-2xl font-medium ">Noujoum Event</h3>
            <div class="w-full flex justify-start "><img class="w-[90%] rounded-2xl" src="{{asset('assets/g8.jpg')}}"></div>
            <h3 class="text-[18px] w-full">La Grande Soiree de Issawa à Casablanca</h3>
            <p class="text-[18px]">Complexe El Hassani ELjadida</p>
            <p class="text-[18px]">Du 20 Avril au 24 Avril</p>
            <button class="text-[18px]">300 DH</button>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
</script>
</body>
</html>