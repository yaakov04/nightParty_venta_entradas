<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class RegisterForm extends Component
{
    public function render()
    {
        return view('livewire.register-form',[
            'events'=>Event::where('active', 1)->take(5)->get()
        ]);
    }
}
