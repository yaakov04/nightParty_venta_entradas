@extends('layouts.admin')

@section('title', 'Editar Asistente')

@section('content')

<div class="mx-4 p-3 bg-white rounded-md shadow">
    <form action="{{ route('attendee.update', $attendee) }}" method="post">
        @csrf
        @method('PUT')
        <div class="my-3 flex flex-col">
            <label class="font-bold" for="name">Nombre:</label>
            <input class="rounded-md border-gray-300" id="name" name="name" type="text" required>
        </div>
        <div class="my-3 flex flex-col">
            <label class="font-bold" for="email">Email:</label>
            <input class="rounded-md border-gray-300" id="email" name="email" type="email" required>
        </div>
        <div class="my-3 flex flex-col">
            <label class="font-bold" for="event">Evento:</label>
            <select class="text-center rounded-md border-gray-300" name="event_id" id="event" required>
                <option value="" selected disabled>-- Seleccione un evento --</option>
                <option value="1">2021-11-09 22:00:00</option>
            </select>
        </div>
        <div class="my-3 flex items-center">
            <label class="font-bold" for="paid">Pagado:</label>
            <input class="ml-4" type="checkbox" name="paid" id="paid" value="1" required>
        </div>
        <button type="submit">Guardar</button>

    </form>
</div>

@endsection