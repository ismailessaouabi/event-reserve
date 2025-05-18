@extends('dashboard.organizer.layouts')

@section('content')
<section class="py-12 bg-gray-800">
    <div class="container mx-auto px-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>  
        @endif
        <!-- Titre de la section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Mes Événements</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Retrouvez tous les événements que vous avez créés ou auxquels vous participez.</p>
        </div>

        <!-- Filtres -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <div class="w-full sm:w-auto">
                <select class="w-full px-4 bg-gray-800 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Tous les événements</option>
                    <option>Événements à venir</option>
                    <option>Événements passés</option>
                    <option>Événements créés</option>
                </select>
            </div>
            
            <div class="w-full sm:w-auto">
                <a href="{{ route('organizer.events.create') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Créer un événement
                </a>
            </div>
        </div>

        <!-- Liste des événements -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="bg-gray-900 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Image de l'événement -->
                    <div class="h-48 overflow-hidden">
                        <img src="{{ Storage::url($event->image_path) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Contenu de la carte -->
                    <div class="p-6">
                        <!-- Date et statut -->
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm font-medium px-3 py-1 bg-blue-100 text-blue-800 rounded-full">
                                {{$event->start_date}}
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
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{$event->name}}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus, et!</p>
                        
                        <!-- Lieu et participants -->
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            {{$event->place->name}}
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex gap-2 justify-between items-center pt-4 border-t border-gray-100">
                            <form action="{{ route('organizer.events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm flex items-center">
                                    Supprimer
                                    
                                </button>
                            </form>
                            <a href="{{ route('organizer.events.edit', $event->id) }}" class="text-yellow-600 hover:text-yellow-800 font-medium text-sm flex items-center">
                                Modifier
                                
                            
                            <a href="{{ route('organizer.events.show', $event->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center">
                                Voir détails
                                
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        

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