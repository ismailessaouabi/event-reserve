<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#051529]">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <!-- En-tête -->
            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Finaliser votre commande</h1>
            </div>

            <!-- Détails de la commande -->
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold mb-4">Récapitulatif de la commande</h2>
                
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span>Produit 1</span>
                        <span class="font-medium">25,00 €</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Produit 2</span>
                        <span class="font-medium">35,00 €</span>
                    </div>
                    <div class="flex justify-between border-t pt-4">
                        <span class="font-bold">Total</span>
                        <span class="font-bold text-blue-600">60,00 €</span>
                    </div>
                </div>
            </div>

            <!-- Formulaire de paiement -->
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Informations de paiement</h2>
                
                <form action="#" method="POST" id="payment-form">
                    @csrf
                    
                    <!-- Informations de la carte -->
                    <div class="mb-6">
                        <label for="card-element" class="block text-sm font-medium text-gray-700 mb-2">
                            Carte de crédit
                        </label>
                        <div id="card-element" class="p-3 border border-gray-300 rounded-md">
                            <!-- Un élément Stripe sera inséré ici -->
                        </div>
                        <div id="card-errors" role="alert" class="text-red-500 text-sm mt-2"></div>
                    </div>

                    <!-- Adresse de facturation -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium mb-3">Adresse de facturation</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                                <input type="text" id="name" name="name" required 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" required 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                                <input type="text" id="address" name="address" required 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                                <input type="text" id="city" name="city" required 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="postal_code" class="block text-sm font-medium text-gray-700">Code postal</label>
                                <input type="text" id="postal_code" name="postal_code" required 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700">Pays</label>
                                <select id="country" name="country" required 
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="FR">France</option>
                                    <option value="BE">Belgique</option>
                                    <option value="CH">Suisse</option>
                                    <option value="LU">Luxembourg</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="flex justify-end">
                        <button type="submit" id="submit-button" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            Payer 60,00 €
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts Stripe (exemple) -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Configuration Stripe
        const stripe = Stripe('{{ env("STRIPE_KEY") }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        // Gestion des erreurs
        cardElement.addEventListener('change', function(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Soumission du formulaire
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            
            const submitButton = document.getElementById('submit-button');
            submitButton.disabled = true;
            submitButton.textContent = 'Traitement en cours...';

            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    address: {
                        line1: document.getElementById('address').value,
                        city: document.getElementById('city').value,
                        postal_code: document.getElementById('postal_code').value,
                        country: document.getElementById('country').value
                    }
                }
            });

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
                submitButton.disabled = false;
                submitButton.textContent = 'Payer 60,00 €';
            } else {
                // Ajouter le paymentMethod.id au formulaire
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'payment_method_id');
                hiddenInput.setAttribute('value', paymentMethod.id);
                form.appendChild(hiddenInput);

                // Soumettre le formulaire
                form.submit();
            }
        });
    </script>
</body>
</html>