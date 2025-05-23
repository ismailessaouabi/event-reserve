<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Transaction;
use App\Models\Ticket;
use App\Models\Category;

class PayementController extends Controller
{
    /**
     * Préparer la transaction PayPal
     */
    public function createTransaction()
    {
        return view('pages.payement');
    }

    /**
     * Traiter le paiement PayPal
     */
    public function processTransaction(Request $request)
    {
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $provider->setAccessToken($paypalToken);

            // Créer l'ordre
            $order = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('payement.success'),
                    "cancel_url" => route('payement.cancel'),
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "EUR",
                            "value" => 34.99,
                        ],
                        "description" => "Achat sur Mon Site Web",
                    ]
                ]
            ]);

            // Rediriger vers PayPal pour paiement
            if (isset($order['id']) && $order['id'] != null) {
                foreach ($order['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
                
                return redirect()
                    ->route('payement.checkout')
                    ->with('error', 'Erreur lors de la création du paiement PayPal.');
            } else {
                return redirect()
                    ->route('payement.checkout')
                    ->with('error', $order['message'] ?? 'Erreur lors de la création du paiement PayPal.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('payement.checkout')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Succès de la transaction PayPal
     */
    public function successTransaction(Request $request)
    {
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $provider->setAccessToken($paypalToken);
            
            $response = $provider->capturePaymentOrder($request->token);
            
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                // Ici, vous enregistrez la transaction dans votre base de données
                // Par exemple:
                $transaction = Transaction::create([
                    'user_id' => 1, // Ou l'ID utilisateur de votre système
                    'event_id' => 1, // L'ID de l'événement acheté
                    'paypal_transaction_id' => $response['id'], // Nouveau champ
                    'payer_email' => $response['payer']['email_address'], // Nouveau champ
                    'quantity' => 1, // Doit être un entier
                    'total_price' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                    'status' => $response['status'],
                ]);
                
                return redirect()
                    ->route('tecket.index', ['id' => $transaction->event_id])
                    ->with('success', 'Transaction complétée.');
            } else {
                return redirect()
                    ->route('payement.checkout')
                    ->with('error', $response['message'] ?? 'Quelque chose s\'est mal passé.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('payement.checkout')
                ->with('error', $e->getMessage());
        }
    }

    
    /**
     * Annulation de la transaction PayPal
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('payement.checkout')
            ->with('error', 'Vous avez annulé la transaction.');
    }

    public function index(string $id)
    {
        // Récupérer l'événement par ID

        $transaction = Transaction::where('event_id', $id)->first();
        $categories = Category::all();
        return view('pages.tecket', compact('transaction','categories'));
    }
    /**
     * Générer le PDF du ticket
     */
    public function generateTicket(String $ticketId)
    {
        // Récupérer les données du ticket et de l'événement
        $categories = Category::all();
        $transaction = Transaction::with('event', 'user')->findOrFail($ticketId);
        $event = $transaction->event;
        $user = $transaction->user;
        
        // Données à passer à la vue
        $data = [
            'transaction' => $transaction,
            'event' => $event,
            'user' => $user,
            'categories' => $categories,
            //'qrCode' => $this->generateQrCode($ticket->code) // Optionnel
        ];
        
        // Générer le PDF
        $pdf = PDF::loadView('pages.tecket', $data);
        
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