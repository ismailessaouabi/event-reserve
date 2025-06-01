<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-blue-900 to-gray-900 flex items-center justify-center p-4">
    <div class="w-full max-w-2xl">
        <!-- En-tête -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white mb-2">Formulaire de Paiement</h1>
            <p class="text-gray-300">Complétez vos informations pour finaliser votre commande</p>
        </div>

        <!-- Formulaire -->
        <form action="{{ route('payement.process', $event->id) }}" method="POST" class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 shadow-2xl border border-white/20">
            @csrf
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
            <!-- Section Informations Personnelles -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-white mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Informations Personnelles
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom -->
                    <div class="space-y-2">
                        <label for="nom" class="block text-sm font-medium text-gray-200">
                            Nom complet *
                        </label>
                        <input 
                            type="text" 
                            name="nom" 
                            id="nom" 
                            required
                            class="w-full px-4 py-3 bg-white/5 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="Entrez votre nom complet"
                        >
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-200">
                            Adresse email *
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            required
                            class="w-full px-4 py-3 bg-white/5 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="exemple@email.com"
                        >
                    </div>
                </div>
            </div>

            <!-- Section Commande -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-white mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                    </svg>
                    Détails de la Commande
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Téléphone -->
                    <div class="space-y-2">
                        <label for="telephone" class="block text-sm font-medium text-gray-200">
                            Numéro de téléphone *
                        </label>
                        <input 
                            type="tel" 
                            name="telephone" 
                            id="telephone" 
                            required
                            class="w-full px-4 py-3 bg-white/5 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="+212 6XX XXX XXX"
                        >
                    </div>

                   
                    <!-- Ville -->
                    <div class="space-y-2">
                        <label for="ville" class="block text-sm font-medium text-gray-200">
                            ville*
                        </label>
                        <input 
                            type="text" 
                            name="ville" 
                            id="ville" 
                            required
                            class="w-full px-4 py-3 bg-white/5 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="saisie ville"
                        >
                    </div>
                    
                </div>
            </div>

            <!-- Résumé de la commande -->
            <div class="mb-8 p-6 bg-white/5 rounded-lg border border-gray-600">
                <h3 class="text-lg font-semibold text-white mb-4">Résumé de la commande</h3>
                
                <hr class="my-4 border-gray-600">
                <div class="flex justify-between items-center text-white text-lg font-bold">
                    <span>PRIX:</span>
                    <span id="total-price">{{ $event->teckets->first()->prix }} MAD</span>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="flex flex-col sm:flex-row gap-4">
                <button 
                    type="button" 
                    onclick="history.back()" 
                    class="flex-1 px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition duration-200 flex items-center justify-center"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour
                </button>
                
                <button 
                    type="submit" 
                    class="flex-1 px-6 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-lg transition duration-200 transform hover:scale-105 flex items-center justify-center shadow-lg"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    Procéder au Paiement
                </button>
            </div>

            <!-- Note de sécurité -->
            <div class="mt-6 p-4 bg-green-900/20 border border-green-500/30 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm text-green-300">Vos informations sont sécurisées et protégées</span>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Calcul dynamique du prix total
        const quantityInput = document.getElementById('quantite');
        const quantityDisplay = document.getElementById('quantity-display');
        const totalPrice = document.getElementById('total-price');
        const pricePerTicket = 200;

        quantityInput.addEventListener('input', function() {
            const quantity = parseInt(this.value) || 1;
            const total = quantity * pricePerTicket;
            
            quantityDisplay.textContent = quantity;
            totalPrice.textContent = total + ' MAD';
        });

        // Animation au focus des inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('transform', 'scale-105');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('transform', 'scale-105');
            });
        });
    </script>
</body>
</html>