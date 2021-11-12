<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.footer',[
            'linkButton'=>[
                'url'=>"http://localhost:5500/register#form",
                'innerText'=>'Quiero entrar'
            ]
        ]);
    }
}
