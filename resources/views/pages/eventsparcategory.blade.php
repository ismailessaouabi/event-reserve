@extends('pages.layouts')

@section('content')
<section class=" bg-gray-800 h-  container mx-auto px-4 py-6">
    <style>
       
    </style>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    @foreach($events as $event)
        <a href="{{ route('accueil.event.show', $event->id) }}" class="bg-gray-900 rounded-lg overflow-hidden event-card">
            <div class="relative">
                <img src="{{ Storage::url($event->image_path) }}" alt="Comedy Festival" class="w-full h-60 object-cover">
                <span class="absolute top-2 left-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">{{ $event->category->name }}</span>
            </div>
            <div class="p-3">
                <h3 class="text-white font-medium text-sm truncate-2-lines">{{ $event->name }}</h3>
                <p class="text-gray-400 text-xs mt-1">{{ $event->start_time }}</p>
                <p class="text-gray-400 text-xs mt-1">{{ $event->_time }}</p>

                <div class="flex items-center mt-2">
                    <i class="fas fa-map-marker-alt text-gray-400 text-xs"></i>
                    <span class="text-gray-400 text-xs ml-1">{{ $event->place->name }}</span>
                </div>
                <div class="mt-3 flex justify-between items-center">
                    <span class="text-white font-bold text-sm">200 MAD</span>
                </div>
            </div>
        </a>
    @endforeach
    </div>
</section>
     
@endsection
