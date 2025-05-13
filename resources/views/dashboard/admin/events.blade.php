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
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>  
                @endif
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
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
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">name</label>
                        <input type="text" id="title" name="name" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">categorie</label>
                    <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    
                    
                    
                    <div class="mb-4">
                        <label for="lieu" class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                        <input type="text" id="lieu" name="lieu" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="datetime-local" id="date" name="date" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Capacité</label>
                        <input type="number" id="capacity" name="capacity" min="0" step="1"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('price')
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
            <!-- Exemple d'événement -->
            <div class="p-6 hover:bg-gray-50 transition duration-150">
                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                    <div class="flex gap-4">
                        <!-- Image de l'événement -->
                        <div class="w-24 h-24 flex-shrink-0">
                            <img src="https://via.placeholder.com/150" alt="Image événement" 
                                 class="w-full h-full object-cover rounded-md">
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Titre de l'événement</h3>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <i class="far fa-calendar-alt mr-2"></i>
                                12/12/2023 à 14:00
                            </div>
                            
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <i class="fas fa-map-marker-alt mr-2"></i> 
                                Lieu de l'événement
                            </div>
                            
                            <div class="mt-2">
                                <span class="inline-block bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded">
                                    50.00 €
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex gap-2">
                        <a href="#" 
                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Modifier
                        </a>
                        <form action="#" method="POST">
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
            
            <!-- Un autre événement -->
            <div class="p-6 hover:bg-gray-50 transition duration-150">
                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                    <div class="flex gap-4">
                        <div class="w-24 h-24 flex-shrink-0">
                            <img src="https://via.placeholder.com/150" alt="Image événement" 
                                 class="w-full h-full object-cover rounded-md">
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Concert Jazz</h3>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <i class="far fa-calendar-alt mr-2"></i>
                                15/12/2023 à 20:30
                            </div>
                            
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <i class="fas fa-map-marker-alt mr-2"></i> 
                                Salle des fêtes
                            </div>
                            
                            <div class="mt-2">
                                <span class="inline-block bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded">
                                    25.00 €
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex gap-2">
                        <a href="#" 
                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Modifier
                        </a>
                        <form action="#" method="POST">
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
        </div>
    </div>
</div>
    </div>
</div>
@endsection