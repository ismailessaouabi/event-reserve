<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-600 via-blue-600 to-indigo-800">
    <div class="min-h-screen flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
            <div class="mx-auto w-16 h-16 bg-white rounded-full flex items-center justify-center mb-6 shadow-lg">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
            </div>
            <h2 class="text-4xl font-bold text-white mb-2">
                Formulaire de paiement
            </h2>
            <p class="text-indigo-200">Complétez vos informations pour continuer</p>
        </div>

        <!-- Payment Form -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl px-8 py-10 border border-white/20">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('payement.process',$event->id) }}" class="space-y-6">
                    <!-- Nom -->
                    @csrf
                    <div class="space-y-2">
                        <label for="nom" class="block text-sm font-semibold text-gray-700">
                            Votre Nom
                        </label>
                        <input 
                            type="text" 
                            name="nom" 
                            id="nom"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white"
                            placeholder="Entrez votre nom complet"
                            required>
                    </div>

                    <!-- Téléphone -->
                    <div class="space-y-2">
                        <label for="telephone" class="block text-sm font-semibold text-gray-700">
                            Votre Téléphone
                        </label>
                        <input 
                            type="tel" 
                            name="telephone" 
                            id="telephone"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white"
                            placeholder="+33 1 23 45 67 89"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">
                            Votre Email
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white"
                            placeholder="votre@email.com"
                            required>
                    </div>

                    <!-- Quantité -->
                    <div class="space-y-2">
                        <label for="quantity" class="block text-sm font-semibold text-gray-700">
                            Nombre de tickets
                        </label>
                        <input 
                            type="number" 
                            name="quantity" 
                            id="quantity"
                            min="1"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:border-gray-300 bg-gray-50 focus:bg-white"
                            placeholder="1"
                            value="{{ $quantity }}"
                            required>
                    </div>

                    <!-- Méthode de paiement -->
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-gray-700">
                            Méthode de paiement
                        </label>
                        
                        <!-- Stripe Option -->
                        <div class="relative">
                            <input 
                                type="radio" 
                                id="stripe" 
                                name="payment_method" 
                                value="stripe" 
                                class="sr-only peer"
                                checked>
                            <label 
                                for="stripe" 
                                class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-indigo-300 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all duration-300">
                                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.976 9.15c-2.172-.806-3.356-1.426-3.356-2.409 0-.831.683-1.305 1.901-1.305 2.227 0 4.515.858 6.09 1.631l.89-5.494C18.252.975 15.697 0 12.165 0 9.667 0 7.589.654 6.104 1.872 4.56 3.147 3.757 4.992 3.757 7.218c0 4.039 2.467 5.76 6.476 7.219 2.585.92 3.445 1.574 3.445 2.583 0 .98-.84 1.545-2.354 1.545-1.875 0-4.965-.921-6.99-2.109l-.9 5.555C5.175 22.99 8.385 24 11.714 24c2.641 0 4.843-.624 6.328-1.813 1.664-1.305 2.525-3.236 2.525-5.732 0-4.128-2.524-5.851-6.591-7.305h0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-900">Stripe</div>
                                    <div class="text-sm text-gray-500">Paiement sécurisé par carte</div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-indigo-500 peer-checked:bg-indigo-500 transition-all duration-300"></div>
                                </div>
                            </label>
                        </div>

                        <!-- PayPal Option -->
                        <div class="relative">
                            <input 
                                type="radio" 
                                id="paypal" 
                                name="payment_method" 
                                value="paypal" 
                                class="sr-only peer">
                            <label 
                                for="paypal" 
                                class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-indigo-300 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 transition-all duration-300">
                                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.3.3 0 0 0-.114-.004c-3.055.45-5.132 1.222-6.934 2.674a6.16 6.16 0 0 0-1.704 2.413l-.774 4.905h2.864c.524 0 .968-.382 1.05-.9l.731-4.63c.081-.518.525-.9 1.05-.9h1.344c2.42 0 4.28-.543 5.69-1.81.515-.464.926-1.043 1.304-1.748z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-900">PayPal</div>
                                    <div class="text-sm text-gray-500">Paiement via PayPal</div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-indigo-500 peer-checked:bg-indigo-500 transition-all duration-300"></div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Payer maintenant
                            </span>
                        </button>
                    </div>

                    <!-- Security Notice -->
                    <div class="flex items-center justify-center pt-4">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm text-gray-600">Paiement 100% sécurisé</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Animation pour les radio buttons
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('label[for^="stripe"], label[for^="paypal"]').forEach(label => {
                    label.classList.remove('ring-2', 'ring-indigo-500');
                });
                
                if(this.checked) {
                    document.querySelector(`label[for="${this.id}"]`).classList.add('ring-2', 'ring-indigo-500');
                }
            });
        });

        // Initialiser la sélection par défaut
        document.addEventListener('DOMContentLoaded', function() {
            const defaultChecked = document.querySelector('input[name="payment_method"]:checked');
            if(defaultChecked) {
                document.querySelector(`label[for="${defaultChecked.id}"]`).classList.add('ring-2', 'ring-indigo-500');
            }
        });
    </script>
</body>
</html>