@extends('layouts.admin')

@section('title', 'Eventos')

@section('content')

@if (session('status'))
    <div class="py-2 m-4 bg-green-500 rounded shadow text-white font-bold text-center" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="mx-4 my-3 p-3 bg-white rounded-md shadow flex justify-end">
    <a href="{{ route('event.create') }}" class="px-4 py-1 mr-3 bg-blue-500 rounded shadow text-white"><i class="fas fa-plus"></i></a>
</div>

@foreach ($events as $event)

<div class="m-4 p-3 bg-white rounded-md shadow flex items-center text-gray-500 text-base">
    <div class="w-1/3 text-7xl text-center">
        <i class="fas fa-star"></i>
    </div>
    <div class="w-2/3">
        <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Dirección:</h3>
            <span>{{ $event->address }}</span>
        </div>
        <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Fecha:</h3>
            <span>{{ $event->datetime }}</span>
        </div>
        <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Precio:</h3>
            <span>$ {{ $event->price }}</span>
        </div>
        <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Activo:</h3>
            @if ($event->active)
            <span class="text-green-500">
                <i class="far fa-check-square"></i>
            </span>
            @else
                <span class="text-red-500">
                    <i class="far fa-times-circle"></i>
                </span>
            @endif
            
        </div>
        <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Asistentes:</h3>
            <span>{{ $attendees }}</span>
        </div>
      
        <div class="flex flex-wrap overflow-hidden mt-3">
            <a href="#" class="px-4 py-1 mr-3 bg-blue-500 rounded shadow text-white"><i class="fas fa-edit"></i></a>
            <form action="" method="post">
            @csrf
            @method('DELETE')
                <button type="submit" onclick="return confirm('¿Deseas eliminar este registro?')" class="px-4 py-1 bg-red-500 rounded shadow text-white"><i class="fas fa-trash"></i></button>
            </form>
        </div>

    </div>
</div>
    
@endforeach


@endsection