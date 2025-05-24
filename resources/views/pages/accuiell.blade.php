
    @extends('pages.layouts')

    @section('content')
    <!-- Featured Events Banner Section -->
    <section class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @for($i = 0; $i < 3; $i++)
                
            <!-- Featured Event 1 -->
            <a href="{{ route('accueil.event.show', $events[$i]->id) }}" class="relative rounded-lg overflow-hidden h-64">
                <img src="{{ Storage::url($events[$i]->image_path) }}" alt="Festival" class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                    <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold">{{ $events[$i]->category->name }}</span>
                    <h3 class="text-white font-bold mt-2">{{ $events[$i]->name }}</h3>
                    <p class="text-gray-200 text-sm">{{ $events[$i]->start_time }}</p>
                </div>
            </a>
            @endfor
            
            
        </div>
    </section>

    <!-- Categories Section -->
    <section class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-2">
                <button class="bg-blue-900 px-3 py-1 rounded text-xs font-medium">Aujourd'hui</button>
                <button class="bg-gray-800 px-3 py-1 rounded text-xs font-medium">Cette semaine</button>
                <button class="bg-gray-800 px-3 py-1 rounded text-xs font-medium">Ce weekend</button>
                <a href="{{ route('eventspardate') }}" class="bg-gray-800 px-3 py-1 rounded text-xs font-medium">Ce mois-ci</a>
            </div>
        </div>
        
        <!-- Events Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">           
            <!-- Event Card 2 -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Comedy Show" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">Comédie Show</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Grande Comédie Show - Le plus fou des soirées comiques</h3>
                    <p class="text-gray-400 text-xs mt-1">15 Juin 2023 à 20:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Complexe Culturel ESPACE ROUDANI</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">150,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- Event Card 3 -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Music Event" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-yellow-500 text-black px-2 py-1 rounded text-xs">MUSIC EVENT</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Soirée Red & Conditions</h3>
                    <p class="text-gray-400 text-xs mt-1">17 Juin 2023 à 22:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Complexe Événementiel BOULTEK</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">200,00 MAD</span>
                    </div>
                </div>
            </div>
            
            <!-- Event Card 4 - Sold Out -->
            <div class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="/api/placeholder/300/180" alt="Rappers Night" class="w-full h-40 object-cover">
                    <span class="absolute top-2 left-2 bg-purple-500 text-white px-2 py-1 rounded text-xs">Rap & Pop</span>
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <span class="bg-red-600 text-white px-4 py-2 rounded-lg font-bold">SOLD OUT</span>
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">Rappers Delight: Al Hoceima</h3>
                    <p class="text-gray-400 text-xs mt-1">12 Juin 2023 à 23:00</p>
                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">Quartier Mirador, Al Hoceima</span>
                    </div>
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">250,00 MAD</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- All Events Section -->
    <section class="container mx-auto px-4 py-4">
        <h2 class="text-xl font-bold text-white mb-6">Tous les événements</h2>
        
        
        <!-- Events Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
        @foreach ($events as $event)
            <a href="{{ route('accueil.event.show', $event->id) }}" class="bg-gray-900 rounded-lg overflow-hidden event-card">
                <div class="relative">
                    <img src="{{ Storage::url($event->image_path) }}" alt="Comedy Festival" class="w-full h-60 object-cover">
                    <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">{{ $event->category->name }}</span>
                </div>
                <div class="p-3">
                    <h3 class="text-white font-medium text-sm truncate-2-lines">{{ $event->name }}</h3>
                    <div class="flex items-center mt-2">
                    <i class="fas fa-clock text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">{{ $event->start_time }}</span>
                    </div>
                    <div class="flex items-center mt-2">
                    <i class="fas fa-clock text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">{{ $event->end_time }}</span>
                    </div>                  

                    <div class="flex items-center mt-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                        <span class="text-gray-400 text-xs ml-1">{{ $event->place->name }}</span>
                    </div>
                    @if ($event->teckets->count() > 0)
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">{{ $event->teckets->first()->prix }} MAD</span>
                    </div>
                    @else
                    <div class="mt-3 flex justify-between items-center">
                        <span class="text-white font-bold text-sm">300 MAD</span>
                    </div>
                    @endif
                </div>
            </a>
            
            @endforeach
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mb-10">
            <button class="bg-gray-800 text-white px-6 py-2 rounded-full hover:bg-gray-700 transition">Plus d'événements</button>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="bg-gray-900 py-8">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="text-xl font-bold text-white mb-4">RESTEZ INFORMÉ!</h2>
                <p class="text-gray-300 mb-6 max-w-lg mx-auto text-sm">Inscrivez-vous à notre newsletter et soyez le premier à être informé des nouvelles actualités et des nouvelles sorties de billets!</p>
                
                <div class="max-w-md mx-auto flex">
                    <input type="email" placeholder="Votre adresse email" class="bg-gray-800 text-white px-4 py-2 rounded-l-lg flex-grow">
                    <button class="bg-red-600 text-white px-4 py-2 rounded-r-lg font-medium">S'inscrire</button>
                </div>
            </div>
        </div>
    </section>
    
    @endsection

  
    