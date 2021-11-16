<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'datetime',
        'address',
        'price',
        'active',
    ];

    public function getDate()
    {
        $datetime = new DateTime($this->datetime);
        $date = $datetime->format('Y-m-d');
        return $date;
    }

    public function getTime()
    {
        $datetime = new DateTime($this->datetime);
        $time = $datetime->format('H:i:s');
        return $time;
    }

    public function getAttendees()
    {
        $attendees = Attendee::select('event_id')->where('event_id', $this->id)->count();
        return $attendees;
    }

    public function earnings()
    {
        $attendees = Attendee::select('event_id')->where('event_id', $this->id)->count();
        $price = $this->price;
        return $attendees * $price;
    }
}
