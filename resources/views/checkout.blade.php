@extends('layouts.web')

@section('content')
<livewire:header>
    <h2>Checkout</h2>
    <main>
        <h3>Usted esta adquiriendo una entrada para Night Party</h3>
        <h3>Costo: 	&#36;{{ $amount }}</h3>
        <br>
        <x-link-button :linkButton="$linkButton" />
        <br>
        <br>
        <br>
    </main>
<livewire:footer>
@endsection