<?php

namespace App\Classes\PaymentProcessor;

use App\Classes\Payment;
use App\Interface\PaymentProcessor;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class mercadoPago implements PaymentProcessor
{
    protected $preference;
    protected $payment;
    
    public function __construct()
    {
        SDK::setAccessToken(config('mercadopago.token'));
        $this->preference= new Preference();
    }

    public function pay(Payment $payment)
    {
        $this->payment = $payment;
        $this->buildOrder();
        $this->execute();
        return $this->preference->sandbox_init_point;
    }

    public function finalizing($request)
    {
        $token = $request->payment_id;
        $status = $request->status;
        return [
            'status' => $status  == 'approved',
            'token' => $token
        ];
    }

    public function execute()
    {
        $this->preference->auto_return = "approved";
        $this->preference->save();
    }

    public function buildOrder()
    {
        $item1 = new Item();
        $item1->id = $this->payment->getID();
        $item1->title = $this->payment->getDescriptionItem();
        $item1->description=$this->payment->getDescriptionItem();
        $item1->quantity = 1;
        $item1->currency_id =$this->payment->getCurrency();
        $item1->unit_price = $this->payment->getAmount();

        $this->preference->items=[$item1];
        $this->preference->back_urls=[
            'success'=>$this->payment->getLinkSuccess(),
            'failure'=>$this->payment->getLinkFailure()
        ];
    }
}