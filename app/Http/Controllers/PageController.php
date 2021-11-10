<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendeeRequest;
use App\Models\Attendee;
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
        
        return redirect()->route('checkout',['registerID'=>$registerID,'paymentMethod'=>$paymentMethod]);
    }

    public function checkout()
    {
        echo 'checo';
    }

    public function attendee(Attendee $attendee)
    {
        $event=$attendee->eventToAttend()[0];
        $datetimeEvent=$event->datetime;
        $addressEvent=isLessToHour(3,$datetimeEvent)?$event->address:'no disponible';
        
        return view('attendee',[
            'attendee'=>$attendee,
            'datetimeEvent'=> $datetimeEvent,
            'addressEvent'=>$addressEvent
        ]);
    }
}
