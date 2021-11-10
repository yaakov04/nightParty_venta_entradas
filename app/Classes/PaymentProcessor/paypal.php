<?php

namespace App\Classes\PaymentProcessor;

use App\Interface\PaymentProcessor;

class paypal implements PaymentProcessor
{
    public function __construct()
    {
       
    }

    public function pay()
    {
        echo 'pagar';
    }
}