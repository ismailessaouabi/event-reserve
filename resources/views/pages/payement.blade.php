<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>



<div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Formulaire de paiement
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form method="POST" action="{{ route('payment.process') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">
                        Montant à payer
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">€</span>
                        </div>
                        <input type="text" name="amount" id="amount" 
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                            placeholder="0.00"
                            aria-describedby="price-currency"
                            value="{{ old('amount') }}"
                            required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm" id="price-currency">EUR</span>
                        </div>
                    </div>
                    
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        Description du paiement
                    </label>
                    <div class="mt-1">
                        <input type="text" name="description" id="description"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            value="{{ old('description') }}">
                    </div>
                    
                </div>

                <div>
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">
                        Méthode de paiement
                    </label>
                    <select id="payment_method" name="payment_method" 
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="card">Carte bancaire</option>
                        <option value="transfer">Virement bancaire</option>
                        <option value="paypal">PayPal</option>
                    </select>
                    
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" 
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" required>
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        J'accepte les <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">conditions générales</a>
                    </label>
                </div>

                <div>
                    <button type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Payer maintenant
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>