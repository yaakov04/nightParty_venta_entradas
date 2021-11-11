<?php

namespace App\Classes\PaymentProcessor;

use App\Classes\Payment;
use App\Interface\PaymentProcessor;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;

class paypal implements PaymentProcessor
{
    protected  $environment;
    protected  $client;
    protected $request;
    protected $response;
    protected $payment;

    public function __construct()
    {
       $this->environment = new SandboxEnvironment(config('paypal.clientId'),config('paypal.clientSecret'));
       $this->client = new PayPalHttpClient($this->environment);
       $this->request = new OrdersCreateRequest();
    }

    public function execute()
    {
        try {
            $this->response = $this->client->execute($this->request);
        }catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function buildOrder()
    {
      
        $this->request->prefer('return=representation');
        $this->request->body=[
            "intent"=>"CAPTURE",
            'application_context' => [
                'return_url' => $this->payment->getLinkSuccess(),
                'cancel_url' => $this->payment->getLinkFailure(),
                'brand_name' => $this->payment->getbrandName(),
                'locale' => 'es-MX',
                'user_action' => 'PAY_NOW',
            ],
            "purchase_units" => [[
                "reference_id" =>$this->payment->getID(),
                'description' => $this->payment->getTitleOrder(),   
                "amount" => [
                    "value" => $this->payment->getAmount(),          
                    "currency_code" => $this->payment->getCurrency(),
                    'breakdown' => [
                        'item_total' => [
                            "value" => $this->payment->getAmount(),          
                            "currency_code" => $this->payment->getCurrency(),
                        ]
                    ]
                        ],//amount
                'items' => [
                    [
                        'name' => $this->payment->getTitleOrder(),
                        'description' => $this->payment->getDescriptionItem(),
                        
                        'unit_amount' =>
                            array(
                                "value" => $this->payment->getAmount(),          
                                "currency_code" => $this->payment->getCurrency(),
                            ),
                        
                        'quantity' => '1',
                        
                    ]
                ]
            ]]
        ];
    }

    public function pay(Payment $payment)
    {
        $this->payment = $payment;
        $this->buildOrder();
        $this->execute();
        return $this->response->result->links[1]->href;
    }
}