<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body  >
<header class="bg-[#011127] shadow-md  top-0 z-50 border-b-2 border-white">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href='/' class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm0 18a8 8 0 110-16 8 8 0 010 16zm1-11a1 1 0 10-2 0v3a1 1 0 00.293.707l2 2a1 1 0 101.414-1.414L11 9.586V7z"/>
                    </svg>
                    <span class="text-xl font-bold text-white">MonLogo</span>
                </a>
                <!-- Barre de recherche -->
                <div class="relative  bg-[#011127]">
                    <input type="text" placeholder="Rechercher un événement" class="px-4 py-2 rounded-md bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <button class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-300"> rechercher</button>
                </div>

                <!-- Boutons -->
                <div class=" md:flex items-center space-x-4">
                    <x-eos-lightbulb-o  class="h-6 w-6 text-white" />
                    <a href="{{route('login')}}" class="px-4 py-2 text-white font-medium hover:text-blue-600">Connexion</a>
                    <a href="#" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-300">Inscription</a>
                </div>
            </div>
        </div>
    </header>

    <div class="bg-[#011127] w-full h-screen flex flex-col justify-center items-center text-white" >
        <h1 class="font-semibold text-3xl w-[40%] m-4 text-center">Bienvenue sur notre plateforme ! Nous sommes ravis de vous retrouver.</h1>
        <form class="w-[40%] h-[70%] flex flex-col gap-6 justify-center items-center border border-[#222f40] rounded-3xl" action="{{ route('login') }}" method="POST">
            @csrf
            <input class="w-[70%] border border-[#222f40] p-2.5" type="text" name="email" placeholder="Email" required>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="password" name="password" placeholder="Password" required>
            <div class="btns w-[70%] flex flex-col gap-2">
                <button class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition " type="submit">Login</button>
                <div>
                    Pas encore de compte ? <a href="{{route('dash')}}" class="text-blue-700">Inscrivez-vous ici</a>
                </div>
            </div>
            
        </form>

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
    </div>
</body>
</html>