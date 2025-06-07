<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket - {{$transaction->event->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .ticket-border {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2px;
            border-radius: 16px;
        }
        
        .ticket-content {
            background: white;
            border-radius: 14px;
        }
        
        .dashed-line {
            border-top: 2px dashed #e2e8f0;
            position: relative;
        }
        
        .dashed-line::before,
        .dashed-line::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #f8fafc;
            border-radius: 50%;
            top: -10px;
        }
        
        .dashed-line::before {
            left: -10px;
        }
        
        .dashed-line::after {
            right: -10px;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .event-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
<body class="bg-gray-50 p-4 md:p-8">
    <div class="max-w-2xl mx-auto">
        <!-- Ticket Container -->
        <div class="ticket-border">
            <div class="ticket-content p-8">
                
                <!-- Header avec Logo -->
                <div class="text-center mb-8">
                    <div class="relative inline-block">
                        <img src="{{ Storage::url($transaction->event->image_path) }}" 
                             alt="Event Image" 
                             class="w-32 h-32 object-cover rounded-2xl shadow-lg mx-auto mb-4">
                        <div class="absolute -top-2 -right-2 event-badge text-white px-3 py-1 rounded-full text-xs font-semibold">
                            TICKET
                        </div>
                    </div>
                    <h1 class="text-3xl font-bold gradient-text mb-2">Billet d'Entrée</h1>
                    <p class="text-gray-500 text-sm">Votre pass pour une expérience inoubliable</p>
                </div>

                <!-- Informations Utilisateur -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Détenteur du Billet
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <span class="text-gray-600 font-medium w-16">Nom:</span>
                            <span class="text-gray-800 font-semibold">{{$transaction->user->name}}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-600 font-medium w-16">Email:</span>
                            <span class="text-gray-800 text-sm">{{$transaction->user->email}}</span>
                        </div>
                    </div>
                </div>

                <!-- Ligne de Séparation -->
                <div class="dashed-line my-8"></div>

                <!-- Informations de l'Événement -->
                <div class="space-y-6">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{$transaction->event->name}}</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Date et Heure -->
                        <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-semibold text-gray-700">Date & Heure</span>
                            </div>
                            <p class="text-gray-800 font-medium">{{$transaction->event->start_time}}</p>
                        </div>

                        <!-- Lieu -->
                        <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="font-semibold text-gray-700">Lieu</span>
                            </div>
                            <p class="text-gray-800 font-medium">{{$transaction->event->place->name}}</p>
                        </div>

                        <!-- Prix -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                <span class="font-semibold text-gray-700">Prix</span>
                            </div>
                            <p class="text-2xl font-bold text-green-600">
                                @if($transaction->event->teckets->count() > 0)
                                    {{$transaction->event->teckets->first()->prix}} MAD
                                @else
                                    300 MAD
                                @endif
                            </p>
                        </div>

                        <!-- Bouton de Téléchargement -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-center mb-3">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="font-semibold text-gray-700">Téléchargement</span>
                            </div>
                            <a href="{{route('tickets.download', $transaction->id)}}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Télécharger le Billet
                            </a>
                        </div>
                    </div>
                </div>

                <!-- QR Code -->
                @if(isset($qrCode))
                    <div class="text-center my-8">
                        <div class="inline-block p-4 bg-white border-2 border-gray-200 rounded-xl shadow-sm">
                            {!! $qrCode !!}
                            <p class="text-xs text-gray-500 mt-2">Scannez ce code à l'entrée</p>
                        </div>
                    </div>
                @endif

                <!-- Footer -->
                <div class="bg-gray-50 rounded-xl p-6 mt-8 text-center">
                    <div class="flex items-center justify-center mb-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-sm">G</span>
                        </div>
                        <span class="font-bold text-gray-800 text-lg">Guichet</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-2">
                        Plateforme de billetterie innovante pour les événements au Maroc
                    </p>
                    <p class="text-gray-500 text-xs">
                        Pour toute question, contactez-nous via notre FAQ ou service client
                    </p>
                </div>

            </div>
        </div>
    </div>
</body>
</html>