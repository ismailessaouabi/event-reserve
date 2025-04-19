<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>event-reserve</title>
</head>
<body>
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
                <a href="#" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm0 18a8 8 0 110-16 8 8 0 010 16zm1-11a1 1 0 10-2 0v3a1 1 0 00.293.707l2 2a1 1 0 101.414-1.414L11 9.586V7z"/>
                    </svg>
                    <span class="text-xl font-bold text-white">MonLogo</span>
                </a>
                <!-- Boutons -->
                <div class=" md:flex items-center space-x-4">
                    <x-eos-lightbulb-o  class="h-6 w-6 text-white" />
                    <a href="#" class="px-4 py-2 text-white font-medium hover:text-blue-600">Connexion</a>
                    <a href="#" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-300">Inscription</a>
                </div>
            </div>
        </div>
    </header>
    <ul class="bg-[#011127] w-full flex justify-center gap-4 px-[60px] shadow-md sticky pt-5  top-0 z-50">
        <li><a href="#" class="text-white text-[20px] border-b-2 font-semibold hover:text-blue-600 ">Festivals</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Sports</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Cenima</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Concerts</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Comedia</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Théàtre</a></li>

    </ul>
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
    <ul class="bg-[#011127] w-full flex justify-center gap-4 px-[60px] shadow-md sticky pt-5  top-0 z-50">
        <li><a href="#" class="text-white text-[20px] border-b-2 font-semibold hover:text-blue-600 ">Festivals</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Aujourd'hui</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Cette semaine</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Ce week-end</a></li>
        <li><a href="#" class="text-white text-[20px]  font-semibold hover:text-blue-600 ">Ce mois-ci</a></li>
    </ul>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>




  
   
    
    <!-- Script pour le menu mobile -->
    <script>
        
    </script>
</body>
</html>