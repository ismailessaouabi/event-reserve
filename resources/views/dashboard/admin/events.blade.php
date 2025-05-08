@extends('dashboard.admin.layouts')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Gestion des Événements</h1>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Formulaire d'ajout -->
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Ajouter un Événement</h2>
                
                <form action="#" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                        <input type="text" id="title" name="title" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                            <input type="datetime-local" id="start_date" name="start_date" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                        </div>
                        
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                            <input type="datetime-local" id="end_date" name="end_date" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                        <input type="text" id="location" name="location" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
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
                        
                            <div class="p-6 hover:bg-gray-50 transition duration-150">
                                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">title</h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            12/34/2023
                                        </p>
                                        
                                            <p class="text-sm text-gray-500 mt-1">
                                                <i class="fas fa-map-marker-alt mr-1"></i> descrr
                                            </p>
                                        
                                            <p class="text-gray-600 mt-2">titre</p>
                                       
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
                    
                    <div class="px-6 py-4 border-t border-gray-200">
                        
                    </div>
               
            </div>
        </div>
    </div>
</div>
@endsection