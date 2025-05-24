<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Transaction;
use App\Models\Tecket;
use App\Models\Category;
use App\Models\Event;

class PayementController extends Controller
{
    
    public function createTransaction(Request $request, $id)
    {
        $quantity = $request->input('quantity_tickets');
        $event = Event::findOrFail($id); // Retirez first()
        return view('pages.payement', compact('quantity', 'event'));
    }

   
    public function processTransaction(Request $request, $id)
    {
        try {
            // Stockez les informations importantes en session
            session([
                'last_event_id' => $id,
                'nom' => $request->input('nom'),
                'email' => $request->input('email'),
                'telephone' => $request->input('telephone'),

                'last_quantity' => $request->input('quantity')

            ]);
            
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $provider->setAccessToken($paypalToken);
            
            $event = Event::findOrFail($id);

    
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
                            "value" => $request->input('amount') * $request->input('quantity'),
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
                    ->with('error', 'Erreur lors de la création du paiement PayPal.');
            } else {
                return redirect()
                    ->route('payement.checkout', ['id' => $id])
                    ->with('error', $order['message'] ?? 'Erreur lors de la création du paiement PayPal.');
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
                $quantity = session('last_quantity');
               
                
                
                
                $transaction = Transaction::create([
                    'user_id' => 2,
                    'event_id' => $event->id,
                    'paypal_transaction_id' => $response['id'],
                    'payer_email' => $response['payer']['email_address'],
                    'quantity' => $quantity,
                    'total_price' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                    'status' => $response['status'],
                ]);
                
                // Nettoyez la session
                session()->forget(['last_event_id', 'last_quantity']);
                
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
                ->route('home')
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