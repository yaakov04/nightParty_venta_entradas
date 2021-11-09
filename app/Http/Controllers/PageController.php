<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use DateTime;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function checkout()
    {

    }

    public function attendee(Attendee $attendee)
    {
        $event=$attendee->eventToAttend()[0];
        $datetimeEvent=$event->datetime;
        $addressEvent=isLessToHour(3,$datetimeEvent)?$event->address:'no disponible';//$event->datetime;
        
        return view('attendee',[
            'attendee'=>$attendee,
            'datetimeEvent'=> $datetimeEvent,
            'addressEvent'=>$addressEvent
        ]);
    }
}
