@extends('layouts.web')

@section('content')
<livewire:header>
    <main>
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
                <img src="{{ $attendee->qr }}" alt="Código Qr">
            </h3>
        </div>
        
    </main>
<livewire:footer>
@endsection