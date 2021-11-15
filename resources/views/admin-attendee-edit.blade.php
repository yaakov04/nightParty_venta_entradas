@extends('layouts.admin')

@section('title', 'Editar Asistente')

@section('content')

@if (session('status'))
    <div class="py-2 m-4 bg-green-500 rounded shadow text-white font-bold text-center" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="mx-4 p-3 bg-white rounded-md shadow">
    <form action="{{ route('attendee.update', $attendee) }}" method="post">
        @csrf
        @method('PUT')
        <div class="my-3 flex flex-col">
            <label class="font-bold" for="name">Nombre:</label>
            <input class="rounded-md border-gray-300" id="name" name="name" type="text" required value="{{ old('name', $attendee->name) }}">
        </div>
        <div class="my-3 flex flex-col">
            <label class="font-bold" for="email">Email:</label>
            <input class="rounded-md border-gray-300" id="email" name="email" type="email" required value="{{ old('name', $attendee->email) }}">
        </div>
        <div class="my-3 flex flex-col">
            <label class="font-bold" for="event">Evento:</label>
            <select class="text-center rounded-md border-gray-300" name="event_id" id="event" required>
                <option value="" disabled>-- Seleccione un evento --</option>
                @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->datetime }}</option>
                @if ($event->id === $eventToAttend->id)
                <option selected value="{{ $event->id }}">{{ $event->datetime }}</option>
                @else
                <option value="{{ $event->id }}">{{ $event->datetime }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="my-3 flex items-center">
            <label class="font-bold" for="paid">Pagado:</label>
            @if ($attendee->paid)
            <input checked class="ml-4" type="checkbox" name="paid" id="paid" value="1" >
            @else
            <input class="ml-4" type="checkbox" name="paid" id="paid" value="1" >
            @endif
        </div>
        <button class="w-full px-3 py-1 my-3 bg-blue-500 rounded shadow text-center text-white" type="submit">Guardar</button>

    </form>
</div>

@endsection