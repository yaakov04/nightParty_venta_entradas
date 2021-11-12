<?php

namespace App\Http\Controllers;

use App\Classes\Payment;
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
        //var_dump($payment->pay());
        return view('checkout', [
            'amount'=> $amount,
            'linkButton'=>[
                'url'=>$payment->pay(),
                'innerText'=>'Pagar'
            ]
        ]);
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
            $qr = getQr("public/qr", $response['token']);
            $attendee->update([
                'paid'=>1,
                'payerID'=>$response['token'],
                'qr' => $qr
            ]);
            $attendee->save();
            return redirect("http://localhost:5500/attendee/{$response['token']}#ticket")->with('status', 'Transaccion exitosa');
        }
    }

    
}
