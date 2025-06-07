<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Transaction;
use App\Models\Tecket;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;

class PayementController extends Controller
{
    
    public function createTransaction(Request $request, $id)
    {
        $event = Event::findOrFail($id); // Retirez first()
        return view('pages.payement', compact( 'event'));
    }

   
    public function processTransaction(Request $request, $id)
    {
        try {
            // Stockez les informations importantes en session
            session([
                'last_event_id' => $id,
                'nom' => $request->nom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'ville' => $request->ville,

            ]);
            
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $provider->setAccessToken($paypalToken);
            
            $event = Event::findOrFail($id);
            $teckt = Tecket::where('event_id', $event->id)->first();
            $prix = $teckt->prix;

    
            $order = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('payement.success', ['id' => $event->id]),
                    "cancel_url" => route('payement.cancel', ['id' => $event->id]),
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "EUR",
                            "value" => $prix,
                        ],
                        "description" => "Achat de billets",
                    ]
                ]
            ]);
            
            if (isset($order['id']) && $order['id'] != null) {
                foreach ($order['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
                
                return redirect()
                    ->route('payement.checkout', ['id' => $id])
                    ->with('error', 'Erreur lors de la création du paiement PayPal 1.');
            } else {
                return redirect()
                    ->route('payement.checkout', ['id' => $id])
                    ->with('error', $order['message'] ?? 'Erreur lors de la création du paiement PayPal 2.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('payement.checkout', ['id' => $id])
                ->with('error', $e->getMessage());
        }
    }
    
    public function successTransaction(Request $request)
    {
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $provider->setAccessToken($paypalToken);
            
            $response = $provider->capturePaymentOrder($request->token);
            
            
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                // Récupérez les données de session ou autres moyens de stockage temporaire
                $event = Event::where('id', session('last_event_id'))->first(); 
                if (!$event) {
                    return redirect()
                        ->route('payement.checkout', ['id' => session('last_event_id')])
                        ->with('error', 'Événement non trouvé.');
                }
                $user = User::where('email', session('email'))->first();
                if (!$user) {
                    // Si l'utilisateur n'existe pas, vous pouvez le créer ou gérer l'erreur
                    $neveauser = User::create([
                        'name' => session('nom'),
                        'email' => session('email'),
                        'telephone' => session('telephone'),
                        'password' => bcrypt('default_password'), // Assurez-vous de gérer le mot de passe correctement
                        'ville' => session('ville'),
                    ]);
                }
                // Créez une nouvelle transaction
                $transaction = Transaction::create([
                    'user_id' => $user->id ?? $neveauser->id, // Utilisez l'ID de l'utilisateur ou du nouvel utilisateur
                    'event_id' => $event->id,
                    'paypal_transaction_id' => $response['id'],
                    'payer_email' => $response['payer']['email_address'],
                    'quantity' => 1,
                    'total_price' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                    'status' => $response['status'],
                ]);              
                return redirect()
                    ->route('tecket.index', ['id' => $transaction->event_id])
                    ->with('success', 'Transaction complétée.');
            } else {
                return redirect()
                    ->route('payement.checkout', ['id' => session('last_event_id')]) // Redirigez vers une page générique
                    ->with('error', $response['message'] ?? 'Quelque chose s\'est mal passé.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('payement.checkout', ['id' => session('last_event_id')])
                ->with('error', $e->getMessage());
        }
    }


    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('payement.checkout', ['event_id' => $request->event_id])
            ->with('error', 'Vous avez annulé la transaction.');
    }

    public function index(string $id)
    {
        // Récupérer l'événement par ID

        $transaction = Transaction::where('event_id', $id)->first();
        $categories = Category::all();
        return view('pages.tecket', compact('transaction','categories'));
    }
   
    public function generateTicket(String $ticketId)
    {
        $categories = Category::all();
        $transaction = Transaction::with('event', 'user')->findOrFail($ticketId);
        $event = $transaction->event;
        $user = $transaction->user;
        
        $data = [
            'transaction' => $transaction,
            'event' => $event,
            'user' => $user,
            'categories' => $categories,
            //'qrCode' => $this->generateQrCode($ticket->code) // Optionnel
        ];
        
        // Générer le PDF
        $pdf = PDF::loadView('pages.pdf', $data);
        
        // Télécharger ou afficher le PDF
        return $pdf->download('ticket-'.$transaction->code.'.pdf');
        // ou return $pdf->stream(); pour afficher dans le navigateur
    }
    
   // protected function generateQrCode($code)
   // {
        // Implémentation optionnelle pour générer un QR code
        // Vous pouvez utiliser un package comme simplesoftwareio/simple-qrcode
        //return \QrCode::size(100)->generate($code);
    //}

    
}