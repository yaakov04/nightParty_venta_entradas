@extends('layouts.web')

@section('content')
<livewire:header>
    <h2>Una experiencia inolvidable</h2>
    <main>
        <form action="" method="">
            <fieldset>
                <legend>Regístrate</legend>
                <div class="">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" placeholder="Tu nombre">
                </div>
                <div class="">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" name="email" id="name" placeholder="Tu correo electrónico">
                </div>
                <div class="">
                    <p>Seleccione su método de pago:</p>
                    <div class="">
                        <label for="paypal">Paypal</label>
                        <input type="radio" name="paymentMethod" id="paypal" value="paypal">
                    </div>
                    <div class="">
                        <label for="mercadoPago">Mercado Pago</label>
                        <input type="radio" name="paymentMethod" id="mercadoPago" value="mercadoPago">
                    </div>
                </div>
            </fieldset>
            <button type="submit">Registrarse</button>
        </form>
    </main>
<livewire:footer>
@endsection