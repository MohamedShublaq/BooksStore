<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class PaymobService
{
    protected $apiKey;
    protected $integrationIds;
    protected $iframeId;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('PAYMOB_API_KEY');
        $this->integrationIds = explode(",",env('PAYMOB_INTEGRATION_ID'));
        $this->iframeId = env('PAYMOB_IFRAME_ID');
        $this->baseUrl = env('PAYMOB_URL');
    }

    // Step 1: Get authentication token
    public function processPayment($order){
        $amountCent = $order->total * 100;
        $authToken = $this->getAuthToken();
        $data = $this->createOrder($authToken, $amountCent, $order);
        return $data;
    }

    public function getAuthToken()
    {
        $response = Http::post($this->baseUrl.'/auth/tokens', [
            'api_key' => $this->apiKey,
        ]);
        return $response->json()['token'] ?? null;
    }

    // Step 2: Register order
    public function createOrder($authToken, $amountCents, $order)
    {
        $response = Http::post($this->baseUrl.'/ecommerce/orders', [
            'auth_token' => $authToken,
            'api_source' => 'INVOICE',
            'delivery_needed' => false,
            'amount_cents' => $amountCents,
            'integrations' => $this->integrationIds,
            'currency' => 'EGP',
            'shipping_data' => [
                'first_name' => $order->user->first_name,
                'last_name' => $order->user->last_name,
                'email' => $order->user->email,
                'phone_number' => $order->user->phone,
            ],
        ]);

        return $response->json();
    }

    // Step 3: Get Payment URL
    public function getPaymentUrl($paymentKey)
    {
        return "{$this->baseUrl}/acceptance/iframes/{$this->iframeId}?payment_token={$paymentKey}";
    }
}
