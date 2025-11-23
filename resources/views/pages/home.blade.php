
    @extends('pages.layouts')

    @section('content')
    <!-- categories bar -->
    <section class="bg-gray-900 ">
        <div class="container mx-auto pb-4">
            <div class="flex space-x-4 overflow-x-auto">
                @foreach ($categories as $category)
                    <a href="{{ route('events_by_category', $category->id) }}" class="bg-gray-800 text-white px-4 py-2 rounded-2xl whitespace-nowrap hover:bg-gray-700 transition">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>
   
    <!-- Featured Events Banner Section -->
    <section class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
           
            
        </div>
    </section>

    <!-- Dates Section -->
    <section class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-2">
                <a href="#" class="bg-blue-900 px-3 py-1 rounded text-xs font-medium">Aujourd'hui</a>
                <a href="#" class="bg-gray-800 px-3 py-1 rounded text-xs font-medium">Cette semaine</a>
                <a href="#" class="bg-gray-800 px-3 py-1 rounded text-xs font-medium">Ce weekend</a>
                <a href="#" class="bg-gray-800 px-3 py-1 rounded text-xs font-medium">Ce mois-ci</a>
            </div>
        </div>
        
        <!-- Events Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">           
            @if($events->isEmpty())
                <p class="text-white text-sm font-semibold pl-3 pt-5">Aucun événement aujourd'hui.</p>
            @else

                @foreach ($events as $event)
                <a href="{{ route('event_details', $event->id) }}" class="bg-gray-900 rounded-lg border border-gray-700 overflow-hidden event-card">
                    <div class="relative">
                        <img src="{{ Storage::url($event->image_path) }}" alt="Comedy Festival" class="w-full h-60 object-cover">
                        <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">{{ $event->category->name }}</span>
                    </div>
                    <div class="p-3">
                        <h3 class="text-white font-medium text-sm truncate-2-lines">{{ $event->name }}</h3>
                        <div class="flex items-center mt-2">
                        <i class="fas fa-clock text-gray-400 text-xs"></i>
                            <span class="text-gray-400 text-xs ml-1">début : 0000</span>
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
            @endif
            
           
            
           
        </div>
    </section>
    
    <!-- All Events Section -->
    <section class="container mx-auto px-4 py-4">
        <h2 class="text-xl font-bold text-white mb-6">Tous les événements</h2>
        
        
        <!-- Events Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
        
            
        @if ($events->isEmpty())
            <p class="text-white text-sm font-semibold pl-3 pt-5">Aucun événement à venir.</p>
            
        @else
        @foreach ($events as $event)
        <a href="{{ route('event_details', $event->id) }}" class="bg-gray-900 rounded-lg overflow-hidden event-card hover:border border-gray-700">
            <div class="relative">
                <img src="{{ Storage::url($event->image_path) }}" alt="Comedy Festival" class="w-full h-60 object-cover">
                <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">{{ $event->category->name }}</span>
            </div>
            <div class="p-3">
                <h3 class="text-white font-medium text-sm truncate-2-lines">{{ $event->name }}</h3>
                <div class="flex items-center mt-2">
                <i class="fas fa-clock text-gray-400 text-xs"></i>
                    <span class="text-gray-400 text-xs ml-1">début :{{ $event->start_time }}/span>
                </div>
                <div class="flex items-center mt-2">
                <i class="fas fa-clock text-gray-400 text-xs"></i>
                    <span class="text-gray-400 text-xs ml-1">fin : {{ $event->end_time }}</span>
                </div>                  

                <div class="flex items-center mt-2">
                    <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                    <span class="text-gray-400 text-xs ml-1">Lieu : {{ $event->place->name }}</span>
                </div>
                
                <div class="mt-3 flex justify-between items-center">
                    <span class="text-white bg-gray-700 px-2 py-1 rounded font-bold text-sm">{{ $event->teckets->first()->price }} MAD</span>
                </div>
                
            
            </div>
        </a>
        
        @endforeach
        @endif
        </div>
        
       
        
    </section>
    <div class="text-center ">
        <a href="{{-- route('tout.events') --}}" class="bg-gray-800 text-white px-6 py-2 rounded-full hover:bg-gray-700 transition">Plus d'événements</a>
    </div>

    <!-- Newsletter Section -->
    <section class="bg-gray-900 mt-8 py-8">
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

  
    