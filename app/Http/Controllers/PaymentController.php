<?php

namespace App\Http\Controllers;

use App\Classes\Payment;
use App\Http\Requests\AttendeeRequest;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $payment;
   

    public function checkout(Request $request)
    {
        $registerID=$request->registerID;
        $amount = Event::where('id',$request->event)->get()[0]->price;
        $paymentMethod =paymentMethod($request->paymentMethod);
        $paymentprocessor = new $paymentMethod;
        $payment = new Payment($paymentprocessor);
        $payment->setPayment([
            'brandName' => 'Night Party Eventos',
            'titleOrder' => 'Night Party',
            'id'=> $registerID,
            'descriptionItem'=> 'Entrada para Night Party',
            'amount'=> $amount,
            'currency'=>'MXN',
            'linkSuccess'=> route('finishing', [
                'registerID'=>$registerID,
                'paymentMethod'=>$request->paymentMethod
            ]),
            'linkFailure'=>''
        ]);
        var_dump($payment->pay());
    }

    public function finishing(Request $request)
    {
        $registerID = $request->registerID;
        $paymentMethod = paymentMethod($request->paymentMethod);
        $paymentprocessor = new $paymentMethod;
        $payment = new Payment($paymentprocessor);
        $response = $payment->finalizing($request);
        if ($response['status']) {
            $attendee = Attendee::where('id', $registerID)->get()[0];
            $attendee->update([
                'paid'=>1,
                'payerID'=>$response['token'],
            ]);
            $attendee->save();
            return redirect("http://localhost:5500/attendee/{$response['token']}")->with('status', 'Transaccion exitosa');
        }
    }

    
}
