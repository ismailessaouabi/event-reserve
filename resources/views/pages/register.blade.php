@extends('pages.layouts')
@section('content')

<div class="bg-[#011127] w-full min-h-screen flex flex-col justify-center items-center text-white py-10">
    <h1 class="font-semibold text-3xl w-full max-w-3xl text-center mb-8">
        Bienvenue sur notre plateforme ! Nous sommes ravis de vous retrouver.
    </h1>

    <form class="w-full max-w-3xl bg-[#0a1a35] p-8 rounded-3xl shadow-lg flex flex-col gap-6" action="{{ route('register.post') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input class="w-full border border-[#222f40] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="name" placeholder="Votre nom" required>
            <input class="w-full border border-[#222f40] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="email" placeholder="Email" required>
            <input class="w-full border border-[#222f40] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="password" name="password" placeholder="Password" required>
            <input class="w-full border border-[#222f40] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="password" name="password_confirmation" placeholder="Confirmer votre password" required>
            <input class="w-full border border-[#222f40] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" name="phone" placeholder="Téléphone" required>
            <input class="w-full border border-[#222f40] p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="city" placeholder="Ville" required>
        </div>

        <div class="mt-6">
            <input type="submit" value="S'inscrire" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
        </div>

        @if (session('error'))
            <p class="text-red-500 mt-4">{{ session('error') }}</p>
        @endif
    </form>
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
