@extends('dashboard.admin.layouts')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-2">
                        Gestion des Événements
                    </h1>
                    <p class="text-gray-600">Créez et gérez vos événements facilement</p>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <div class="bg-white rounded-lg px-4 py-2 shadow-sm border">
                        <span class="text-sm text-gray-500">Total événements</span>
                        <div class="text-2xl font-bold text-blue-600">{{ isset($events) ? count($events) : 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col xl:flex-row gap-8">
            
            <!-- Formulaire d'ajout - Version améliorée -->
            <div class="w-full xl:w-1/3">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-8 sticky top-4">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Nouvel Événement</h2>
                    </div>

                    <!-- Messages de notification améliorés -->
                    @if (session('success'))
                        <div class="bg-emerald-50 border-l-4 border-emerald-400 text-emerald-700 px-4 py-3 rounded-r-lg mb-6 shadow-sm" role="alert">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        </div>  
                    @endif
                    
                    @if (session('error'))
                        <div class="bg-red-50 border-l-4 border-red-400 text-red-700 px-4 py-3 rounded-r-lg mb-6 shadow-sm" role="alert">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                <span>{{ session('error') }}</span>
                            </div>
                        </div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-400 text-red-700 px-4 py-3 rounded-r-lg mb-6 shadow-sm" role="alert">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span class="font-medium">Erreurs de validation :</span>
                            </div>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Nom de l'événement -->
                        <div class="group">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-tag mr-2 text-blue-500"></i>
                                Nom de l'événement
                            </label>
                            <input type="text" id="name" name="name" 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"
                                placeholder="Entrez le nom de l'événement"
                                required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="group">
                            <label for="image" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-image mr-2 text-blue-500"></i>
                                Image de l'événement
                            </label>
                            <div class="relative">
                                <input type="file" id="image" name="image" 
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                    accept="image/*"
                                    required>
                            </div>
                            @error('image')
                                <p class="text-red-500 text-xs mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Catégorie -->
                        <div class="group">
                            <label for="category" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-list mr-2 text-blue-500"></i>
                                Catégorie
                            </label>
                            <select name="category" id="category_id" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white">
                                @if(isset($categories) && count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @else
                                    <option value="">Aucune catégorie trouvée</option>
                                @endif
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <!-- Lieu et Ville sur la même ligne -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="group">
                                <label for="lieu" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>
                                    Lieu
                                </label>
                                <input type="text" id="lieu" name="lieu" 
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"
                                    placeholder="Nom du lieu"
                                    required>
                                @error('lieu')
                                    <p class="text-red-500 text-xs mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="group">
                                <label for="ville" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-city mr-2 text-blue-500"></i>
                                    Ville
                                </label>
                                <input type="text" id="ville" name="ville" 
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"
                                    placeholder="Nom de la ville"
                                    required>
                                @error('ville')
                                    <p class="text-red-500 text-xs mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Dates sur la même ligne -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="group">
                                <label for="start_time" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-play mr-2 text-green-500"></i>
                                    Début
                                </label>
                                <input type="datetime-local" id="start_time" name="start_time" 
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"
                                    required>
                                @error('start_time')
                                    <p class="text-red-500 text-xs mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="group">
                                <label for="end_time" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-stop mr-2 text-red-500"></i>
                                    Fin
                                </label>
                                <input type="datetime-local" id="end_time" name="end_time" 
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"
                                    required>
                                @error('end_time')
                                    <p class="text-red-500 text-xs mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Capacité -->
                        <div class="group">
                            <label for="capacity" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-users mr-2 text-blue-500"></i>
                                Capacité maximale
                            </label>
                            <input type="number" id="capacity" name="capacity" min="0" step="1"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 focus:bg-white"
                                placeholder="Nombre de participants maximum"
                                required>
                            @error('capacity')
                                <p class="text-red-500 text-xs mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <!-- Bouton de soumission -->
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-4 px-6 rounded-xl transition duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                            <i class="fas fa-plus"></i>
                            <span>Créer l'événement</span>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Liste des événements - Version améliorée -->
            <div class="w-full xl:w-2/3">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-blue-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-calendar-alt text-white"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-800">Événements Créés</h2>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="text-sm text-gray-500">
                                    {{ isset($events) ? count($events) : 0 }} événement(s)
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="divide-y divide-gray-100">
                        @if(isset($events) && count($events) > 0)
                            @foreach ($events as $event)
                                <div class="p-8 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition duration-300 group">
                                    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-6">
                                        <div class="flex gap-6">
                                            <!-- Image de l'événement améliorée -->
                                            <div class="w-32 h-32 flex-shrink-0 relative">
                                                <img src="{{ Storage::url($event->image_path) }}"
                                                    class="w-full h-full object-cover rounded-2xl shadow-lg group-hover:shadow-xl transition duration-300 transform group-hover:scale-105">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                                            </div>
                                            
                                            <div class="flex-1">
                                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition duration-200">
                                                    {{ $event->name }}
                                                </h3>
                                                
                                                <div class="space-y-3">
                                                    <div class="flex items-center text-sm text-gray-600">
                                                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                            <i class="fas fa-play text-green-600 text-xs"></i>
                                                        </div>
                                                        <span class="font-medium">Début:</span>
                                                        <span class="ml-2">{{ \Carbon\Carbon::parse($event->start_time)->format('d/m/Y à H:i') }}</span>
                                                    </div>
                                                    
                                                    <div class="flex items-center text-sm text-gray-600">
                                                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                            <i class="fas fa-stop text-red-600 text-xs"></i>
                                                        </div>
                                                        <span class="font-medium">Fin:</span>
                                                        <span class="ml-2">{{ isset($event->end_time) ? \Carbon\Carbon::parse($event->end_time)->format('d/m/Y à H:i') : 'Non définie' }}</span>
                                                    </div>

                                                    <div class="flex items-center text-sm text-gray-600">
                                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                            <i class="fas fa-map-marker-alt text-blue-600 text-xs"></i>
                                                        </div>
                                                        <span class="font-medium">Lieu:</span>
                                                        <span class="ml-2">{{ isset($event->place) ? $event->place->name : 'Complexe Mohammed V' }}</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="flex flex-wrap gap-2 mt-4">
                                                    <span class="inline-flex items-center bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 text-sm px-3 py-1 rounded-full border border-blue-200">
                                                        <i class="fas fa-users mr-1 text-xs"></i>
                                                        Capacité: {{ $event->place->capacity ?? 'Non définie' }}
                                                    </span>
                                                    
                                                    <span class="inline-flex items-center bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 text-sm px-3 py-1 rounded-full border border-purple-200">
                                                        <i class="fas fa-user-tie mr-1 text-xs"></i>
                                                        {{ $event->organizer->name }}
                                                    </span>
                                                    <span class="inline-flex items-center bg-gradient-to-r from-yellow-100 to-orange-100 text-yellow-800 text-sm px-3 py-1 rounded-full border border-yellow-200">
                                                        <i class="fas fa-calendar-alt mr-1 text-xs"></i>
                                                        {{ $event->category->name ?? 'Non définie' }}
                                                    </span>
                                                    

                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Actions améliorées -->
                                        <div class="flex flex-row lg:flex-col gap-3">
                                            <a href="{{ route('admin.events.edit', $event->id) }}" 
                                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 text-white text-sm font-semibold rounded-lg transition duration-200 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                <i class="fas fa-edit mr-2 text-xs"></i>
                                                Modifier
                                            </a>
                                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white text-sm font-semibold rounded-lg transition duration-200 transform hover:scale-105 shadow-md hover:shadow-lg"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                                    <i class="fas fa-trash mr-2 text-xs"></i>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-12 text-center">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-calendar-plus text-gray-400 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Aucun événement créé</h3>
                                <p class="text-gray-500 mb-4">Commencez par créer votre premier événement</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animations personnalisées */
    .group:hover .group-hover\:scale-105 {
        transform: scale(1.05);
    }
    
    /* Effet de focus amélioré */
    input:focus, select:focus, textarea:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    /* Animation de chargement pour les boutons */
    button:active {
        transform: scale(0.98);
    }
    
    /* Effet de survol pour les cartes */
    .hover\:bg-gradient-to-r:hover {
        background-image: linear-gradient(to right, rgba(59, 130, 246, 0.05), rgba(99, 102, 241, 0.05));
    }
</style>
@endsection