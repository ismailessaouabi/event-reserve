@extends('pages.layouts')
@section('content')
    <div class="bg-[#011127] w-full h-fit py-9 flex flex-col justify-center items-center text-white">
        <h1 class="font-semibold w-[70%] text-3xl m-4 text-center">Bienvenue sur notre plateforme ! Nous sommes ravis de vous retrouver.</h1>
        
        <form class="w-[40%] h-fit py-10 flex flex-col gap-6 justify-start items-center border border-[#222f40] rounded-3xl" action="{{ route('login') }}" method="POST">
            
            @csrf

            {{-- Messages de session (succès, erreur, info) --}}
            @if(session('success'))
                <div class="w-[70%] bg-green-600 text-white p-3 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="w-[70%] bg-red-600 text-white p-3 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('info'))
                <div class="w-[70%] bg-blue-600 text-white p-3 rounded-md">
                    {{ session('info') }}
                </div>
            @endif

            {{-- Erreurs de validation globales --}}
            @if($errors->any())
                <div class="w-[70%] bg-red-600 text-white p-3 rounded-md">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Champ Email --}}
            <div class="w-[70%]">
                <input class="w-full border border-[#222f40] p-2.5 @error('email') border-red-500 @enderror" 
                       type="text" 
                       name="email" 
                       placeholder="Email" 
                       value="{{ old('email') }}" 
                       required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Champ Password --}}
            <div class="w-[70%]">
                <input class="w-full border border-[#222f40] p-2.5 @error('password') border-red-500 @enderror" 
                       type="password" 
                       name="password" 
                       placeholder="Password" 
                       required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="btns w-[70%] flex flex-col gap-2">
                <button class="w-full cursor-pointer px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition" type="submit">Login</button>
                <div>
                    Pas encore de compte ? <a href="{{ route('register.form') }}" class="text-blue-700">Inscrivez-vous ici</a>
                </div>
            </div>
            
        </form>
    </div>
    
@endsection