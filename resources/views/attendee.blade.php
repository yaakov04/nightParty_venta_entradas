@extends('layouts.web')

@section('content')
<livewire:header>
    <main>
       <div id="ticket" class="container attendee-section">
        @if (session('status'))
                <div class="status" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h2>Entrada</h2>
            <div class="">
                <h3>
                    Nombre:
                    {{ $attendee->name }}
                </h3>
                <h3>
                    Correo electrónico:
                    {{ $attendee->email }}
                </h3>
                <h3>
                    Fecha:
                    {{ $datetimeEvent }}
                </h3>
                <h3>
                    Direccion:
                    {{ $addressEvent }}
                </h3>
                <h3>
                    Qr:
                    <div class="figure-container">
                        <figure>
                            <img src="{{ $attendee->qr }}" alt="Código Qr">
                        </figure>
                    </div>
                </h3>
            </div>
       </div>
    </main>
<livewire:footer>
@endsection