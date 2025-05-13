@extends('dashboard.admin.layouts')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Gestion des Événements</h1>

    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Formulaire d'ajout -->
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Ajouter un Événement</h2>
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>  
                @endif
                
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input type="text" id="name" name="name" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input type="file" id="image" name="image" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                        <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="category_id">
                            @if(isset($categories) && count($categories) > 0)
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @else
                                <option value="">Aucune catégorie trouvée</option>
                            @endif
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="lieu" class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                        <input type="text" id="lieu" name="lieu" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('lieu')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Date et heure de début</label>
                        <input type="datetime-local" id="start_time" name="start_time" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('start_time')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">Date et heure de fin</label>
                        <input type="datetime-local" id="end_time" name="end_time" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('end_time')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Capacité</label>
                        <input type="number" id="capacity" name="capacity" min="0" step="1"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('capacity')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Ajouter l'événement
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Liste des événements -->
        <div class="w-full lg:w-2/3">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Liste des Événements</h2>
                </div>
                
                <div class="divide-y divide-gray-200">
                    @if(isset($events) && count($events) > 0)
                        @foreach ($events as $event)
                            <div class="p-6 hover:bg-gray-50 transition duration-150">
                                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                                    <div class="flex gap-4">
                                        <!-- Image de l'événement -->
                                        <div class="w-24 h-24 flex-shrink-0">
                                            <img  src="{{ Storage::url($event->image_path) }}  "
                                                class="w-full h-full object-cover rounded-md">
                                        </div>
                                        
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-900">{{ $event->name }}</h3>
                                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                                <i class="far fa-calendar-alt mr-2"></i>
                                                date de début: {{ \Carbon\Carbon::parse($event->start_time)->format('d/m/Y H:i') }}
                                            </div>
                                            
                                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                            <i class="far fa-calendar-alt mr-2"></i>
                                               date de fin: {{ isset($event->end_time) ? \Carbon\Carbon::parse($event->end_time)->format('d/m/Y H:i') : 'N/A' }}
                                            </div>

                                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                                <i class="fas fa-map-marker-alt mr-2"></i> 
                                                {{ isset($event->place) ? $event->place->name : 'Complexe mahammed 5' }}
                                            </div>
                                            
                                            <div class="mt-2">
                                                <span class="inline-block bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded">
                                                    Capacité: {{ $event->place->capacity ?? 'Agadir' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex gap-2">
                                        <a href="{{ route('events.edit', $event->id) }}" 
                                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            Modifier
                                        </a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 text-sm font-medium"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="p-6 text-center text-gray-500">
                            Aucun événement disponible
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection