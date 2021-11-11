<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'email',
        'paid',
        'payerID',
        'qr',
        'attended',
        'datetime'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function eventToAttend()
    {
        return Event::where('id', $this->event_id)->get();
    }
}
