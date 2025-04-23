<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-[#011127] w-full h-screen flex flex-col justify-center items-center text-white" >
    <h1>Bienvenue sur notre plateforme ! Nous sommes ravis de vous retrouver.</h1>
    <form class="w-[40%] h-[70%] flex flex-col gap-6 justify-center items-center border border-[#222f40] rounded-3xl" action="{{ route('login') }}" method="POST">
        @csrf
        <input class="w-[70%] border border-[#222f40] p-2.5" type="text" name="email" placeholder="Email" required>
        <input class="w-[70%] border border-[#222f40] p-2.5" type="password" name="password" placeholder="Password" required>
        <div class="btns w-[70%] flex flex-col gap-2">
            <button class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition " type="submit">Login</button>
            <div>
                Pas encore de compte ? <a href="#" class="text-blue-700">Inscrivez-vous ici</a>
            </div>
        </div>
        
    </form>

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    
</body>
</html>