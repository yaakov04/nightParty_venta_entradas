@extends('layouts.web')

@section('content')
<livewire:header>
    <h2 id="checkout">Checkout</h2>
    <main>
        <div class="container checkout-section">
        <p>Usted esta adquiriendo una entrada para Night Party</p>
        <p>Costo: 	&#36;{{ $amount }}</p>
        <br>
        <x-link-button :linkButton="$linkButton" />
        <br>
        <br>
        <br>
        </div>
    </main>
<livewire:footer>
@endsection