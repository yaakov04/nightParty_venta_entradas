<div  class="container">
    <form action="{{ route('store') }}" method="post">
    @csrf
    @method('POST')
    <fieldset>
        <legend>Regístrate</legend>
        <div class="input">
            <label class="label" for="name">Nombre:</label>
            <input type="text" id="name" name="name" placeholder="Tu nombre" required>
        </div>
        <div class="input">
            <label class="label" for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="name" placeholder="Tu correo electrónico"required>
        </div>
        <div class="input">
            <label class="label" for="event">Elige el Evento</label>
            <div class="select">
                <select name="event_id" id="event" required>
                    <option value="" selected disabled>--Elige una opción--</option>
                    @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->datetime }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="input-paymentMethod">
            <p class="label">Seleccione su método de pago:</p>
            <div class="">
                <div class="paymentMethod">
                    <label for="paypal">
                        <img src="{{ asset('img/PayPal.png') }}" alt="Logo de Paypal">
                    </label>
                    <input type="radio" name="paymentMethod" id="paypal" value="paypal" required>
                </div>
                <div class="paymentMethod">
                    <label for="mercadoPago">
                    <img src="{{ asset('img/mercadopago.jpg') }}" alt="Logo de Paypal">
                    </label>
                    <input type="radio" name="paymentMethod" id="mercadoPago" value="mercadoPago"required>
                </div>
            </div>
        </div>
    </fieldset>
    <button class="hero__btn btn-submit" type="submit">Registrarse</button>
    </form>
</div>
