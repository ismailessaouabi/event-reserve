<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket - {{$transaction->event->name }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            padding: 16px;
            min-height: 100vh;
        }
        
        @media (min-width: 768px) {
            body {
                padding: 32px;
            }
        }
        
        .container {
            max-width: 672px;
            margin: 0 auto;
        }
        
        .ticket-border {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2px;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .ticket-content {
            background: white;
            border-radius: 14px;
            padding: 32px;
        }
        
        /* Header Styles */
        .header {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .image-container {
            position: relative;
            display: inline-block;
        }
        
        .event-image {
            width: 128px;
            height: 128px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
        }
        
        .event-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .main-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }
        
        .subtitle {
            color: #6b7280;
            font-size: 14px;
        }
        
        /* User Info Section */
        .user-info {
            background: linear-gradient(90deg, #dbeafe 0%, #f3e8ff 100%);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
        }
        
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
        }
        
        .icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            color: #2563eb;
        }
        
        .user-details {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }
        
        @media (min-width: 768px) {
            .user-details {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        .detail-item {
            display: flex;
            align-items: center;
        }
        
        .detail-label {
            color: #4b5563;
            font-weight: 500;
            width: 64px;
            margin-right: 12px;
        }
        
        .detail-value {
            color: #1f2937;
            font-weight: 600;
        }
        
        .detail-value.email {
            font-size: 14px;
        }
        
        /* Separator */
        .dashed-line {
            border-top: 2px dashed #e2e8f0;
            position: relative;
            margin: 32px 0;
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
        
        /* Event Info */
        .event-info {
            margin-bottom: 32px;
        }
        
        .event-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            text-align: center;
            margin-bottom: 24px;
        }
        
        .event-details {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }
        
        @media (min-width: 768px) {
            .event-details {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        .info-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .info-card.price {
            background: #f0fdf4;
            border-color: #bbf7d0;
        }
        
        .info-header {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .info-header .icon {
            color: #7c3aed;
        }
        
        .info-header .icon.location {
            color: #dc2626;
        }
        
        .info-header .icon.price {
            color: #059669;
        }
        
        .info-label {
            font-weight: 600;
            color: #374151;
        }
        
        .info-value {
            color: #1f2937;
            font-weight: 500;
        }
        
        .price-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #059669;
        }
        
        /* QR Code */
        .qr-section {
            text-align: center;
            margin: 32px 0;
        }
        
        .qr-container {
            display: inline-block;
            padding: 16px;
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .qr-text {
            font-size: 12px;
            color: #6b7280;
            margin-top: 8px;
        }
        
        /* Footer */
        .footer {
            background: #f9fafb;
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            margin-top: 32px;
        }
        
        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }
        
        .brand-logo {
            width: 32px;
            height: 32px;
            background: linear-gradient(90deg, #2563eb 0%, #7c3aed 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }
        
        .brand-letter {
            color: white;
            font-weight: 700;
            font-size: 14px;
        }
        
        .brand-name {
            font-weight: 700;
            color: #1f2937;
            font-size: 18px;
        }
        
        .footer-description {
            color: #4b5563;
            font-size: 14px;
            margin-bottom: 8px;
        }
        
        .footer-contact {
            color: #6b7280;
            font-size: 12px;
        }
        
        /* Print Styles */
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                background: white;
                padding: 0;
            }
            
            .container {
                max-width: none;
            }
            
            .ticket-border {
                box-shadow: none;
            }
        }
        
        /* Responsive Adjustments */
        @media (max-width: 767px) {
            .ticket-content {
                padding: 24px;
            }
            
            .main-title {
                font-size: 1.75rem;
            }
            
            .event-name {
                font-size: 1.25rem;
            }
            
            .event-image {
                width: 96px;
                height: 96px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Ticket Container -->
        <div class="ticket-border">
            <div class="ticket-content">
                
                <!-- Header avec Logo -->
                <div class="header">
                    <div class="image-container">
                        <img src="{{ Storage::url($transaction->event->image_path) }}" 
                             alt="Event Image" 
                             class="event-image">
                        <div class="event-badge">
                            TICKET
                        </div>
                    </div>
                    <h1 class="main-title">Billet d'Entrée</h1>
                    <p class="subtitle">Votre pass pour une expérience inoubliable</p>
                </div>

                <!-- Informations Utilisateur -->
                <div class="user-info">
                    <h3 class="section-title">
                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Détenteur du Billet
                    </h3>
                    <div class="user-details">
                        <div class="detail-item">
                            <span class="detail-label">Nom:</span>
                            <span class="detail-value">{{$transaction->user->name}}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Email:</span>
                            <span class="detail-value email">{{$transaction->user->email}}</span>
                        </div>
                    </div>
                </div>

                <!-- Ligne de Séparation -->
                <div class="dashed-line"></div>

                <!-- Informations de l'Événement -->
                <div class="event-info">
                    <h2 class="event-name">{{$transaction->event->name}}</h2>
                    
                    <div class="event-details">
                        <!-- Date et Heure -->
                        <div class="info-card">
                            <div class="info-header">
                                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="info-label">Date & Heure</span>
                            </div>
                            <p class="info-value">{{$transaction->event->start_time}}</p>
                        </div>

                        <!-- Lieu -->
                        <div class="info-card">
                            <div class="info-header">
                                <svg class="icon location" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="info-label">Lieu</span>
                            </div>
                            <p class="info-value">{{$transaction->event->place->name}}</p>
                        </div>

                        <!-- Prix -->
                        <div class="info-card price">
                            <div class="info-header">
                                <svg class="icon price" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                <span class="info-label">Prix</span>
                            </div>
                            <p class="price-value">
                                @if($transaction->event->teckets->count() > 0)
                                    {{$transaction->event->teckets->first()->prix}} MAD
                                @else
                                    300 MAD
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- QR Code -->
                @if(isset($qrCode))
                    <div class="qr-section">
                        <div class="qr-container">
                            {!! $qrCode !!}
                            <p class="qr-text">Scannez ce code à l'entrée</p>
                        </div>
                    </div>
                @endif

                <!-- Footer -->
                <div class="footer">
                    <div class="brand">
                        <div class="brand-logo">
                            <span class="brand-letter">G</span>
                        </div>
                        <span class="brand-name">Guichet</span>
                    </div>
                    <p class="footer-description">
                        Plateforme de billetterie innovante pour les événements au Maroc
                    </p>
                    <p class="footer-contact">
                        Pour toute question, contactez-nous via notre FAQ ou service client
                    </p>
                </div>

            </div>
        </div>
    </div>
</body>
</html>