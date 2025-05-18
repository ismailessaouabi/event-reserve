@extends('dashboard.organizer.layouts')

@section('content')
<section class="py-12 bg-gray-900">
    <div class="container mx-auto px-4">
        <!-- Titre de la section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">Créer un Nouvel Événement</h2>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Remplissez les informations ci-dessous pour créer votre nouvel événement.</p>
        </div>

        <!-- Formulaire de création d'événement -->
        <div class="max-w-4xl mx-auto bg-gray-800 rounded-xl shadow-lg p-8">
            <form action="{{route('organizer.events.store')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- Affichage des erreurs -->
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Informations générales -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-4 text-white">Informations générales</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Titre de l'événement -->
                        <div class="col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-300 mb-1">Titre de l'événement *</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white"
                                placeholder="Entrez le titre de votre événement">
                        </div>
                        
                        <!-- Description -->
                        <div class="col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-1">Description *</label>
                            <textarea id="description" name="description" rows="4" required
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white"
                                placeholder="Décrivez votre événement (minimum 50 caractères)">{{ old('description') }}</textarea>
                        </div>
                        
                        <!-- Catégorie -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-300 mb-1">Catégorie *</label>
                            <select id="category_id" name="category_id" required
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                                <option value="">Sélectionnez une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Image de couverture -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-300 mb-1">Image de couverture *</label>
                            <div class="flex items-center">
                                <input type="file" id="image" name="image" accept="image/*" required
                                    class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Format recommandé: JPG, PNG (max 2MB)</p>
                        </div>
                    </div>
                </div>

                <!-- Date et heure -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-4 text-white">Date et heure</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Date de début -->
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-300 mb-1">Date de début *</label>
                            <input type="datetime-local" id="start_date" name="start_date" value="{{ old('start_date') }}" required
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                        </div>
                        
                        
                        
                        <!-- Date de fin -->
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-300 mb-1">Date de fin *</label>
                            <input type="datetime-local" id="end_date" name="end_date" value="{{ old('end_date') }}" required
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                        </div>
                        
                        
                    </div>
                </div>

                <!-- Lieu -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-4 text-white">Lieu</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Lieu -->
                        <div class="col-span-2">
                            <label for="location" class="block text-sm font-medium text-gray-300 mb-1">Lieu *</label>
                            <input type="text" id="location" name="location" value="{{ old('location') }}" required
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white"
                                placeholder="Adresse complète du lieu">
                        </div>
                        
                        <!-- Ville -->
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-300 mb-1">Ville *</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}" required
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white"
                                placeholder="Ville">
                        </div>
                        
                        <!-- Type d'événement (en présentiel/en ligne) -->
                        <div>
                            <label for="capacity" class="block text-sm font-medium text-gray-300 mb-1">Type d'événement *</label>
                            <input type="number" name="capacity" id="capacity" value="{{ old('capacity') }}" class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                        </div>
                        
                        <!-- Lien d'événement en ligne (conditionnel) -->
                        <div id="online_link_container" class="col-span-2 hidden">
                            <label for="online_link" class="block text-sm font-medium text-gray-300 mb-1">Lien de l'événement en ligne</label>
                            <input type="url" id="online_link" name="online_link" value="{{ old('online_link') }}"
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white"
                                placeholder="https://...">
                        </div>
                    </div>
                </div>

                <!-- Paramètres de billets -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-4 text-white">Paramètres de billets</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nombre maximum de participants -->
                        <div>
                            <label for="max_participants" class="block text-sm font-medium text-gray-300 mb-1">Nombre maximum de participants *</label>
                            <input type="number" id="max_participants" name="max_participants" value="{{ old('max_participants') }}" min="1" 
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white"
                                placeholder="Nombre de places disponibles">
                        </div>
                        
                        <!-- Prix du billet -->
                        <div>
                            <label for="ticket_price" class="block text-sm font-medium text-gray-300 mb-1">Prix du billet (MAD) *</label>
                            <input type="number" id="ticket_price" name="ticket_price" value="{{ old('ticket_price', 0) }}" min="0" step="0.01" 
                                class="w-full px-4 py-2 rounded-lg bg-gray-600 border border-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white"
                                placeholder="0.00 pour un événement gratuit">
                        </div>
                        
                        <!-- Type de billet -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Type de billet *</label>
                            <div class="flex flex-wrap gap-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="ticket_type" value="free" {{ old('ticket_type', 'free') == 'free' ? 'checked' : '' }}
                                        class="form-radio h-5 w-5 text-blue-600">
                                    <span class="ml-2 text-gray-300">Gratuit</span>
                                </label>
                                
                                <label class="inline-flex items-center">
                                    <input type="radio" name="ticket_type" value="paid" {{ old('ticket_type') == 'paid' ? 'checked' : '' }}
                                        class="form-radio h-5 w-5 text-blue-600">
                                    <span class="ml-2 text-gray-300">Payant</span>
                                </label>
                                
                                <label class="inline-flex items-center">
                                    <input type="radio" name="ticket_type" value="donation" {{ old('ticket_type') == 'donation' ? 'checked' : '' }}
                                        class="form-radio h-5 w-5 text-blue-600">
                                    <span class="ml-2 text-gray-300">Don (prix suggéré)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Options supplémentaires -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-4 text-white">Options supplémentaires</h3>
                    
                    <div class="space-y-4">
                        <!-- Publication immédiate -->
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="is_published" name="is_published" type="checkbox" value="1" {{ old('is_published') ? 'checked' : '' }}
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_published" class="font-medium text-gray-300">Publier immédiatement</label>
                                <p class="text-gray-400">Si non coché, l'événement sera enregistré comme brouillon.</p>
                            </div>
                        </div>
                        
                        <!-- Événement privé -->
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="is_private" name="is_private" type="checkbox" value="1" {{ old('is_private') ? 'checked' : '' }}
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_private" class="font-medium text-gray-300">Événement privé</label>
                                <p class="text-gray-400">Si coché, l'événement sera visible uniquement via un lien d'invitation.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-4 pt-4">
                    <button type="button" onclick="window.location=''" 
                        class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-200">
                        Annuler
                    </button>
                    
                    <button type="submit" name="save_draft" value="1"
                        class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                        Enregistrer comme brouillon
                    </button>
                    
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        Créer l'événement
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // Afficher/masquer le champ de lien en ligne selon le type d'événement
    document.addEventListener('DOMContentLoaded', function() {
        const eventTypeSelect = document.getElementById('event_type');
        const onlineLinkContainer = document.getElementById('online_link_container');
        
        function toggleOnlineLink() {
            const selectedValue = eventTypeSelect.value;
            if (selectedValue === 'online' || selectedValue === 'hybrid') {
                onlineLinkContainer.classList.remove('hidden');
                document.getElementById('online_link').setAttribute('required', 'required');
            } else {
                onlineLinkContainer.classList.add('hidden');
                document.getElementById('online_link').removeAttribute('required');
            }
        }
        
        // Initialiser l'état au chargement
        toggleOnlineLink();
        
        // Ajouter l'écouteur d'événement pour les changements
        eventTypeSelect.addEventListener('change', toggleOnlineLink);
        
        // Gérer l'affichage du prix selon le type de billet
        const ticketTypeRadios = document.querySelectorAll('input[name="ticket_type"]');
        const ticketPriceInput = document.getElementById('ticket_price');
        
        function toggleTicketPrice() {
            const selectedValue = document.querySelector('input[name="ticket_type"]:checked').value;
            if (selectedValue === 'free') {
                ticketPriceInput.value = '0';
                ticketPriceInput.setAttribute('readonly', 'readonly');
            } else {
                ticketPriceInput.removeAttribute('readonly');
            }
        }
        
        // Initialiser l'état au chargement
        toggleTicketPrice();
        
        // Ajouter les écouteurs d'événement pour les changements
        ticketTypeRadios.forEach(radio => {
            radio.addEventListener('change', toggleTicketPrice);
        });
    });
</script>
@endsection