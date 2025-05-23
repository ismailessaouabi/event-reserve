<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    @foreach($events as $event)
    <a href="{{ route('accueil.event.show', $event->id) }}" class="relative rounded-lg overflow-hidden h-64">
                <img src="{{ Storage::url($event->image_path) }}" alt="Festival" class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                    <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold">FESTIVAL</span>
                    <h3 class="text-white font-bold mt-2">Festival de la Comédie Arabe</h3>
                    <p class="text-gray-200 text-sm">15-26 Jun 2023</p>
                </div>
            </a>
    @endforeach
</body>
</html>