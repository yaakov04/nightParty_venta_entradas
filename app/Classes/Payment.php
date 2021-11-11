<?php

namespace App\Classes;

use App\Interface\PaymentProcessor;

class Payment 
{
    protected $paymentProcessor;
    protected $brandName;
    protected $titleOrder;
    protected $idItem;
    protected $descriptionItem;
    protected $currency;
    protected $amount;
    protected $linkSuccess;
    protected $linkFailure;
    

    public function __construct(PaymentProcessor $paymentProcessor, Array $arg)
    {
       $this->paymentProcessor = $paymentProcessor;
       $this->brandName = $arg['brandName'];
       $this->titleOrder = $arg['titleOrder'];
       $this->idItem = $arg['id'];
       $this->descriptionItem = $arg['descriptionItem'];
       $this->amount = $arg['amount'];
       $this->currency = $arg['currency'];
       $this->linkSuccess = $arg['linkSuccess'];
       $this->linkFailure = $arg['linkFailure'];
    }

    public function pay()
    {
        var_dump($this->paymentProcessor->pay($this));
    }

    public function getTitleOrder()
    {
        return $this->titleOrder;
    }

    public function getDescriptionItem()
    {
        return $this->descriptionItem;
    }

    public function getbrandName()
    {
        return $this->brandName;
    }

    public function getID()
    {
        return $this->idItem;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getLinkSuccess()
    {
        return $this->linkSuccess;
    }

    public function getLinkFailure()
    {
        return $this->linkFailure;
    }

}