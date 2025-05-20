<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayementController extends Controller
{
    /**
     * Préparer la transaction PayPal
     */
    public function createTransaction(Request $request)
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
                // Transaction::create([
                //     'payment_id' => $response['id'],
                //     'payer_email' => $response['payer']['email_address'],
                //     'amount' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                //     'currency' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
                //     'payment_status' => $response['status'],
                // ]);
                
                return redirect()
                    ->route('payement.checkout')
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
}