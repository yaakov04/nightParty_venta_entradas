<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.header',[
            'linkButton'=>[
                'url'=>route('register')."#form",
                'innerText'=>'Quiero entrar'
            ]
        ]);
    }
}
