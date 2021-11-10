<form action="{{ route('checkout') }}" method="post">
   
    @csrf
    @method('POST')
    <fieldset>
        <legend>Regístrate</legend>
        <div class="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" placeholder="Tu nombre" required>
        </div>
        <div class="">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="name" placeholder="Tu correo electrónico"required>
        </div>
        <div class="">
            <label for="event">Elige el Evento</label>
            <select name="event_id" id="event" required>
                <option value="" selected disabled>--Elige una opción--</option>
                @foreach($events as $event)
                <option value="{{ $event->id }}">{{ $event->datetime }}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>Seleccione su método de pago:</p>
            <div class="">
                <label for="paypal">Paypal</label>
                <input type="radio" name="paymentMethod" id="paypal" value="paypal" required>
            </div>
            <div class="">
                <label for="mercadoPago">Mercado Pago</label>
                <input type="radio" name="paymentMethod" id="mercadoPago" value="mercadoPago required">
            </div>
        </div>
    </fieldset>
    <button type="submit">Registrarse</button>
</form>
