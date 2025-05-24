<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    



<div class="bg-gray-900 text-white min-h-screen">
    <!-- Header avec bouton retour -->
    <div class="flex items-center justify-between p-4">
        <a href="{{ route('events.home') }}" class="rounded-full bg-gray-800 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div class="flex gap-4">
            <button class="rounded-full bg-gray-800 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                </svg>
            </button>
            <button class="rounded-full bg-gray-800 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Image de l'événement et informations -->
    <div class="flex flex-col md:flex-row">
        <!-- Image principale -->
        <div class="w-[90%]  flex justify-center items-center md:w-1/2">
            <img src="{{ Storage::url($event->image_path) }}" alt="Master Musicians of Jajouka" class="w-[70%] h-fit object-cover">
        </div>
        
        <!-- Informations de l'événement -->
        <div class=" w-full md:w-1/2 p-6 bg-gray-900">
            <div class="mb-4">
                <span class="text-xs text-green-500 uppercase tracking-wide font-semibold">{{ $event->category->name }}</span>
            </div>
            
            <h1 class="text-2xl font-bold mb-4">{{ $event->name }}</h1>
            
            <div class="flex items-center mb-3 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $event->place->name }}</span>
            </div>
            
            <div class="flex items-center mb-6 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span> début : {{ $event->start_time }}</span>
            </div>
            
            <div class="flex items-center mb-6 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span> fin : {{ $event->end_time }}</span>
            </div>
            
            <p class="text-gray-400 description">
                {{ $event->description }}
            </p>
            <p class="text-gray-400 description">
                {{$event->teckets->first()->prix}} MAD
            </p>
            <form action="{{ route('payement.checkout',$event->id) }}" class="flex flex-col" method="GET">
                @csrf
                <label for="quantity_tickets" class="text-gray-400">
                    Nombre de tickets :
                    <input type="number" id="quantity_tickets" name="quantity_tickets" value="1" min="1" class="bg-gray-700 text-white p-2 rounded">
                </label>
                <button type="submit" id="buyButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                    Acheter
                    <p class="prix_complete">{{$event->teckets->first()->prix}} MAD</p>
                </button>
            </form>
            
            
            
        </div>


    </div>
</div>
<script>
    const quantity_tickets = document.getElementById('quantity_tickets');
    const prixComplete = document.querySelector('.prix_complete');
    quantity_tickets.addEventListener('change', function() {
        const quantityTickets = document.getElementById('quantity_tickets').value;
        const prixTotal = {{$event->teckets->first()->prix}} * quantityTickets;
        prixComplete.textContent = prixTotal + ' MAD';
    });
</script>

</body>
</html>