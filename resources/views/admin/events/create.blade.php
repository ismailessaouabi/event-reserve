@extends('admin.layouts')

@section('content')
    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 min-h-screen py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- En-tête -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-2">Créer un événement</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">Remplissez les informations ci-dessous pour créer un nouvel événement. Tous les champs marqués d'un astérisque (*) sont obligatoires.</p>
            </div>
            
            <!-- Carte principale -->
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                    <!-- Barre supérieure décorative -->
                    <div class="h-2 bg-gradient-to-r from-indigo-600 to-purple-600"></div>
                    
                    <div class="p-8">
                        <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <!-- Champ nom -->
                            <div>
                                <label for="name" class="flex items-center text-gray-700 font-semibold mb-2">
                                    <span>Nom de l'événement</span>
                                    <span class="text-red-500 ml-1">*</span>
                                    <svg class="ml-1.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name" 
                                        placeholder="Ex: Conférence annuelle" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                                        required
                                    >
                                </div>
                                <p class="mt-1 text-sm text-gray-500">Donnez un nom clair et descriptif à votre événement.</p>
                            </div>
                            
                            <!-- Champ date -->
                            <div>
                                <label for="date" class="flex items-center text-gray-700 font-semibold mb-2">
                                    <span>Date de l'événement</span>
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="date" 
                                        id="date" 
                                        name="date" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                                        required
                                    >
                                </div>
                            </div>
                            
                            <!-- Champ lieu -->
                            <div>
                                <label for="location" class="flex items-center text-gray-700 font-semibold mb-2">
                                    <span>Lieu</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        id="location" 
                                        name="location" 
                                        placeholder="Ex: Centre de conférences" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                                    >
                                </div>
                            </div>
                            
                            <!-- Champ description -->
                            <div>
                                <label for="description" class="flex items-center text-gray-700 font-semibold mb-2">
                                    <span>Description</span>
                                </label>
                                <textarea 
                                    id="description" 
                                    name="description" 
                                    rows="4" 
                                    placeholder="Décrivez votre événement..." 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                                ></textarea>
                            </div>
                            
                            <!-- Boutons actions -->
                            <div class="flex items-center justify-between pt-4">
                                <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    Retour
                                </a>
                                <button 
                                    type="submit" 
                                    class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200"
                                >
                                    <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Créer l'événement
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Carte d'aide -->
                <div class="mt-8 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6 shadow-md">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-gray-800">Besoin d'aide ?</h3>
                            <div class="mt-2 text-sm text-gray-600">
                                <p>Consultez notre <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium">guide de création d'événements</a> pour plus d'informations ou contactez l'équipe d'assistance.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection