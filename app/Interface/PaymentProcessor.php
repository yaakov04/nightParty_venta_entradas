<?php

namespace App\Interface;

use App\Classes\Payment;

interface PaymentProcessor
{
    public function pay(Payment $payment);
}