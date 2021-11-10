<?php

namespace App\Classes;

use App\Interface\PaymentProcessor;

class Payment 
{
    protected $paymentProcessor;
    protected $idItem;
    protected $currency;
    protected $amount;
    protected $success;
    protected $failure;

    public function __construct(PaymentProcessor $paymentProcessor)
    {
       $this->paymentProcessor = $paymentProcessor;
    }

    public function pay()
    {
        $this->paymentProcessor->pay();
    }

    public function setItem(Array $item)
    {
        $this->idItem = $item['id'];
        $this->amount = $item['amount'];
    }

    public function setCurrency(String $currency)
    {
        $this->currency = $currency;
    }

    public function setLinks(String $success, String $failure)
    {
        $this->success = $success;
        $this->failure = $failure;
    }
}