<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function register()
    {
        echo 'registrarse';
    }

    public function checkout()
    {

    }

    public function attendee(Request $request, $payerID)
    {
        return view('attendee');
    }
}
