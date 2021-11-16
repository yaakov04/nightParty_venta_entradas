<?php

namespace App\Http\Livewire;

use App\Models\Attendee;
use App\Models\Event;
use Livewire\Component;
use NumberFormatter;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard',[
            'ticketsSold'=>Attendee::select('*')->where('paid', 1)->count(),
            'registered'=>Attendee::count(),
            'earnings'=>$this->earnings()
        ]);
    }

    public function earnings(){
        $fmt = new NumberFormatter('es_MX', NumberFormatter::CURRENCY);
        $earnings=[];
        $events = Event::all();
        foreach($events as $event){
              array_push($earnings, $event->earnings());
        }
        $totalEarnings = array_sum($earnings);
        return $fmt->formatCurrency($totalEarnings, 'MXN');
        
    }
}
