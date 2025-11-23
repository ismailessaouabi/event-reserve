@extends('pages.layouts')

@section('content')
<div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
        @foreach ($events_rechercher as $event)
            <a href="{{-- route('accueil.event.show', $event->id) --}}" class="bg-gray-900 rounded-lg overflow-hidden event-card">
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
    @endsection