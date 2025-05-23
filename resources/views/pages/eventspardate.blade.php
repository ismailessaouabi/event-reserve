<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
<section class="container mx-auto px-4 py-4">
        <h2 class="text-xl font-bold text-white mb-6">Tous les événements</h2>        
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">

    @foreach($events as $event)
    <a href="{{ route('accueil.event.show', $event->id) }}" class="relative rounded-lg overflow-hidden h-64">
                <img src="{{ Storage::url($event->image_path) }}" alt="Festival" class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                    <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold">{{ $event->category->name }}</span>
                    <h3 class="text-white font-bold mt-2">{{ $event->name }}</h3>
                    <p class="text-gray-200 text-sm">{{ $event->start_time }}</p>
                </div>
            </a>
    @endforeach
        </div>
    </section>
</body>
</html>