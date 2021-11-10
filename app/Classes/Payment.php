<?php

namespace App\Classes;

use App\Interface\PaymentProcessor;

class Payment 
{
    protected $paymentProcessor;
    protected $idItem;
    protected $currency;
    protected $amount;
    protected $linkSuccess;
    protected $linkFailure;
    

    public function __construct(PaymentProcessor $paymentProcessor, Array $arg)
    {
       $this->paymentProcessor = $paymentProcessor;
       $this->idItem = $arg['id'];
       $this->amount = $arg['amount'];
       $this->currency = $arg['currency'];
       $this->linkSuccess = $arg['linkSuccess'];
       $this->linkFailure = $arg['linkFailure'];
    }

    public function pay()
    {
        $this->paymentProcessor->pay();
    }

}