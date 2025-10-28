@extends('pages.layouts')
@section('content')
    <div class="bg-[#011127] w-full h-fit py-9 flex flex-col justify-center items-center text-white" >
        <h1 class="font-semibold w-[70%] text-3xl  m-4 text-center">Bienvenue sur notre plateforme ! Nous sommes ravis de vous retrouver.</h1>
        
        <form class="w-[40%] h-fit py-10 flex flex-col gap-6 justify-start items-center border border-[#222f40] rounded-3xl" action="{{ route('login') }}" method="POST">
            @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>  
            @endif
            @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                        
            @endif
            @csrf
            <input class="w-[70%] border border-[#222f40] p-2.5" type="text" name="email" placeholder="Email" required>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="password" name="password" placeholder="Password" required>
            <div class="btns w-[70%] flex flex-col gap-2">
                <button class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition " type="submit">Login</button>
                <div>
                    Pas encore de compte ? <a href="{{route('register.form')}}" class="text-blue-700">Inscrivez-vous ici</a>
                </div>
            </div>
            
        </form>
    </div>
    
@endsection