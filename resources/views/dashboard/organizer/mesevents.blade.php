@extends('layouts.app')

@section('content')
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Titre de la section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Mes Événements</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Retrouvez tous les événements que vous avez créés ou auxquels vous participez.</p>
        </div>

        <!-- Filtres -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <div class="w-full sm:w-auto">
                <select class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Tous les événements</option>
                    <option>Événements à venir</option>
                    <option>Événements passés</option>
                    <option>Événements créés</option>
                </select>
            </div>
            
            <div class="w-full sm:w-auto">
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Créer un événement
                </button>
            </div>
        </div>

        <!-- Liste des événements -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Image de l'événement -->
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $event->image_url ?? 'https://via.placeholder.com/400x200' }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Contenu de la carte -->
                    <div class="p-6">
                        <!-- Date et statut -->
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm font-medium px-3 py-1 bg-blue-100 text-blue-800 rounded-full">
                                {{ $event->date->format('d M Y') }}
                            </span>
                            @if($event->is_past)
                                <span class="text-sm font-medium px-3 py-1 bg-gray-100 text-gray-800 rounded-full">
                                    Terminé
                                </span>
                            @else
                                <span class="text-sm font-medium px-3 py-1 bg-green-100 text-green-800 rounded-full">
                                    À venir
                                </span>
                            @endif
                        </div>
                        
                        <!-- Titre et description -->
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $event->description }}</p>
                        
                        <!-- Lieu et participants -->
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            {{ $event->location }}
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                                </svg>
                                <span class="text-sm text-gray-500">{{ $event->participants_count }} participants</span>
                            </div>
                            
                            <a href="{{ route('events.show', $event->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center">
                                Voir détails
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($events->hasPages())
            <div class="mt-12">
                {{ $events->links() }}
            </div>
        @endif

        <!-- Message si aucun événement -->
        @if($events->isEmpty())
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="text-xl font-medium text-gray-700 mb-2">Aucun événement trouvé</h3>
                <p class="text-gray-500 mb-4">Vous n'avez pas encore créé ou rejoint d'événement.</p>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200">
                    Créer mon premier événement
                </button>
            </div>
        @endif
    </div>
</section>
@endsection