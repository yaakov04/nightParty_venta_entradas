<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendeeRequest;
use App\Models\Attendee;


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
        
       return redirect()->to(route('checkout',[
        'registerID'=>$registerID,
        'paymentMethod'=>$paymentMethod, 
        'event'=>$event
    ]).'#checkout');
        //return redirect('http://localhost:5500/checkout#checkout')
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
