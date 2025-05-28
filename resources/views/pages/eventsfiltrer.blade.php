@extends('pages.layouts')

@section('content')
<!-- Formulaire de filtre -->
<div class="bg-gray-800 p-4 rounded-lg mb-6">
    <form action="{{ route('events.filtrer') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Filtre par ville -->
        <div>
            <label for="ville" class="block text-sm font-medium text-gray-300 mb-1">Ville</label>
            <select name="ville" id="ville" class="w-full bg-gray-700 text-white rounded-md px-3 py-2 text-sm">
                <option value="">Toutes les villes</option>
                @foreach($allevents as $event)
                    <option value="{{ $event->place->name }}" {{ request('ville') == $event->place->name ? 'selected' : '' }}>{{ $event->place->name }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Filtre par catégorie -->
        <div>
            <label for="categorie" class="block text-sm font-medium text-gray-300 mb-1">Catégorie</label>
            <select name="categorie" id="categorie" class="w-full bg-gray-700 text-white rounded-md px-3 py-2 text-sm">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ request('categorie') == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Filtre par prix -->
        <div>
            <label for="prix_max" class="block text-sm font-medium text-gray-300 mb-1">Prix maximum</label>
            <select name="prix_max" id="prix_max" class="w-full bg-gray-700 text-white rounded-md px-3 py-2 text-sm">
                <option value="">Tous les prix</option>
                <option value="100" {{ request('prix_max') == '100' ? 'selected' : '' }}>100 MAD</option>
                <option value="200" {{ request('prix_max') == '200' ? 'selected' : '' }}>200 MAD</option>
                <option value="300" {{ request('prix_max') == '300' ? 'selected' : '' }}>300 MAD</option>
                <option value="500" {{ request('prix_max') == '500' ? 'selected' : '' }}>500 MAD</option>
            </select>
        </div>
        
        <!-- Boutons -->
        <div class="flex items-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm w-full">
                Filtrer
            </button>
            @if(request()->has('ville') || request()->has('categorie') || request()->has('prix_max'))
                <a href="{{ route('tout.events') }}" class="ml-2 bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md text-sm">
                    Réinitialiser
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Liste des événements -->
<div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
    @foreach ($events as $event)
        <a href="{{ route('accueil.event.show', $event->id) }}" class="bg-gray-900 rounded-lg overflow-hidden event-card hover:border border-gray-700">
            <div class="relative">
                <img src="{{ Storage::url($event->image_path) }}" alt="Comedy Festival" class="w-full h-60 object-cover">
                <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">{{ $event->category->name }}</span>
            </div>
            <div class="p-3">
                <h3 class="text-white font-medium text-sm truncate-2-lines">{{ $event->name }}</h3>
                <div class="flex items-center mt-2">
                    <i class="fas fa-clock text-gray-400 text-xs"></i>
                    <span class="text-gray-400 text-xs ml-1">début : {{ $event->start_time }}</span>
                </div>
                <div class="flex items-center mt-2">
                    <i class="fas fa-clock text-gray-400 text-xs"></i>
                    <span class="text-gray-400 text-xs ml-1">fin : {{ $event->end_time }}</span>
                </div>                  

                <div class="flex items-center mt-2">
                    <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                    <span class="text-gray-400 text-xs ml-1">Lieu : {{ $event->place->name }}</span>
                </div>
                @if ($event->teckets->count() > 0)
                <div class="mt-3 flex justify-between items-center">
                    <span class="text-white bg-gray-700 px-2 py-1 rounded font-bold text-sm">{{ $event->teckets->first()->prix }} MAD</span>
                </div>
                @else
                <div class="mt-3 flex justify-between items-center">
                    <span class="text-white bg-gray-700 px-2 py-1 rounded font-bold text-sm">300 MAD</span>
                </div>
                @endif
            </div>
        </a>
    @endforeach
</div>

<!-- Pagination -->


@endsection