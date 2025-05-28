<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col items-center justify-center bg-gray-900">
    <h1>Formulaire de Paiement</h1>
    <form action="{{ route('payement.process', $event->id) }}" method="GET" class="w-[80%] bg-gray-800 p-4 flex flex-col items-center mt-8">
        <div>
            <label for="">
                votre nom
                <input type="text" name="" id="">
            </label>

            <label for="">
                votre Email
                <input type="text" name="" id="">
            </label>
        </div>

        <div>
            <label for="">
                votre numéro de téléphone
                <input type="text" name="" id="">
            </label>

            <label for="">
                quantité de tickets
                <input type="text" name="" id="">
            </label>
        </div>
    </form>

    
   
</body>
</html>