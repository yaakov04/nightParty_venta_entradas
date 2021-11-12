<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.footer',[
            'linkButton'=>[
                'url'=>route('register'),
                'innerText'=>'Quiero entrar'
            ]
        ]);
    }
}
