
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ticket - {{$transaction->event->name }}</title>
    <style>
        /* Styles CSS pour le PDF */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #ffffff;
            background-color: #474f57;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 150px;
        }
        .header h1 {
            font-size: 28px;
            color: #ffffff;
            margin: 10px 0;
        }
        .ticket-title {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
            margin: 10px 0;
        }
        .user-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .event-info {
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #7f8c8d;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ Storage::url($transaction->event->image_path) }}" alt="event-reserve Logo">
        <div class="ticket-title"># Ticket</div>
    </div>

    <div class="user-info">
        <p><strong>Nom:</strong> {{$transaction->user->name}}</p>
        <p><strong>Email:</strong> {{$transaction->user->email}}</p>
    </div>

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Ticket</h1>
            <p>{{$transaction->user->name}}</p>
            <p>{{$transaction->event->name}}</p>
            <p>{{$transaction->event->start_time}}</p>
            <p>{{$transaction->event->place->name}}</p>
            @if($transaction->event->teckets->count() > 0)
            <p>{{$transaction->event->teckets->first()->prix}} MAD</p>
            @else
            <p>300 MAD</p>
            @endif
            
        </div>
</div>

    @if(isset($qrCode))
        <div class="qr-code">
            {!! $qrCode !!} <!-- Affiche le QR code si généré -->
        </div>
    @endif

    <div class="footer">
        <p>event-reserve est une plateforme de billetterie innovante pour les événements au Maroc.</p>
        <p>Pour toute question, contactez-nous via notre FAQ ou service client.</p>
    </div>
</body>
</html>
    