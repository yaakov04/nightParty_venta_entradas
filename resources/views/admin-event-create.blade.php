@extends('layouts.admin')

@section('title', 'Nuevo Evento')

@section('content')

<div class="max-w-7xl mx-auto">

    @if (session('status'))
        <div class="py-2 m-4 bg-green-500 rounded shadow text-white font-bold text-center" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="mx-4 p-3 bg-white rounded-md shadow">
        <form action="{{ route('event.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="my-3 flex flex-col">
                <label class="font-bold" for="address">Dirección:</label>
                <input class="rounded-md border-gray-300" id="address" name="address" type="text" required>
            </div>
            <div class="my-3 flex flex-col">
                <label class="font-bold" for="date">Fecha:</label>
                <input class="rounded-md border-gray-300" id="date" name="date" type="date" required>
            </div>
            <div class="my-3 flex flex-col">
                <label class="font-bold" for="time">Hora:</label>
                <input class="rounded-md border-gray-300" id="time" name="time" type="time" required>
            </div>
            <div class="my-3 flex flex-col">
                <label class="font-bold" for="price">Precio:</label>
                <input class="rounded-md border-gray-300" id="price" name="price" type="number" min="1" step="any" required>
            </div>
            <div class="my-3 flex items-center">
                <label class="font-bold" for="paid">Activo:</label>
                <input class="ml-4" type="checkbox" name="paid" id="paid" value="1">
            </div>
            
            <button class="w-full px-3 py-1 my-3 bg-blue-500 rounded shadow text-center text-white" type="submit">Guardar</button>

        </form>
    </div>

</div>

@endsection