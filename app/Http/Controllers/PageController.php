<?php

namespace App\Http\Controllers;

use App\Classes\Payment;
use App\Http\Requests\AttendeeRequest;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(AttendeeRequest $request)
    {
        $paymentMethod=$request->paymentMethod;
        $attendee = Attendee::create($request->all());
        $attendee->save();
        $registerID=$attendee->id;
        $event = $attendee->event_id;
        
        return redirect()->route('checkout',[
            'registerID'=>$registerID,
            'paymentMethod'=>$paymentMethod, 
            'event'=>$event
        ]);
    }

    public function checkout(Request $request)
    {
        $registerID=$request->registerID;
        $amount = Event::where('id',$request->event)->get()[0]->price;
        $paymentMethod ="App\Classes\PaymentProcessor\\$request->paymentMethod";
        $paymentprocessor = new $paymentMethod;
        $payment = new Payment($paymentprocessor, [
            'brandName' => 'Night Party Eventos',
            'titleOrder' => 'Night Party',
            'id'=> $registerID,
            'descriptionItem'=> 'Entrada para Night Party',
            'amount'=> $amount,
            'currency'=>'MXN',
            'linkSuccess'=> route('success', ['registerID'=>$registerID ]),
            'linkFailure'=>''
        ]);
        $payment->pay();
    }

    public function success(Request $request)
    {
        //echo 'Transacción exitosa';
        echo '<br>';
        var_dump($request->token);
        echo '</br>';
        $payerID = $request->token;
        
    }

    public function attendee(Attendee $attendee)
    {
        $event=$attendee->eventToAttend()[0];
        $datetimeEvent=$event->datetime;
        $addressEvent=isLessToHour(3,$datetimeEvent)?$event->address:'no disponible';//pasar esto a una funcion
        
        return view('attendee',[
            'attendee'=>$attendee,
            'datetimeEvent'=> $datetimeEvent,
            'addressEvent'=>$addressEvent
        ]);
    }
}
