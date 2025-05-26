@extends('pages.layouts')
@section('content')

    <div class="bg-[#011127]  w-full h-fit flex flex-col justify-center items-center text-white" >
        <h1 class="font-semibold text-3xl w-[40%] m-4 text-center">Bienvenue sur notre plateforme ! Nous sommes ravis de vous retrouver.</h1>
        <form class="w-[40%] h-fit py-10 flex flex-col gap-6 justify-center items-center border border-[#222f40] rounded-3xl" action="{{ route('register.post') }}" method="POST">
            @csrf
            <select onchange="selectrole()" class="w-[70%] bg-[#011127]  border border-[#222f40]  p-2.5" name="role" id="">
                <option class="w-[100%] bg-[#011127]  border border-[#222f40] p-2.5" value="">--selectionnez--</option>
                <option class="w-[100%]  bg-[#011127] border border-[#222f40] p-2.5" value="organizer">Organizateur</option>
                <option class="w-[100%]  bg-[#011127] border border-[#222f40] p-2.5" value="customer">Utilisateur</option>
            </select>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="text" name="nom" placeholder="votre nom" required>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="text" name="email" placeholder="Email" required>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="password" name="password" placeholder="Password" required>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="password" name="password_confirmation" placeholder="confirm votre password" required>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="number" name="telephone" placeholder="Téléphone" required>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="text" name="ville" placeholder="ville" required>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="text" name="payes" placeholder="payes" required>
            <input class="w-[70%] border border-[#222f40] p-2.5" type="text" name="address" placeholder="address" required>


            <div class="btns w-[70%] flex flex-col gap-2">
                <input type="submit" value="inscriver" class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition " >
                
            </div>
            
        </form>

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
    </div>
    <script>
        const selectElement = document.querySelector('select[name="role"]');
        const email = document.querySelector('input[name="email"]');

        function selectrole() {
            if (selectElement.value === 'organizateur') {
                email.style.display = 'none';
            } else {
                email.style.display = 'block';
            }
        };
    </script>
@endsection