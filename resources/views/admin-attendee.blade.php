@extends('layouts.admin')

@section('title', 'Registrados')

@section('content')

@if (session('status'))
    <div class="py-2 m-4 bg-green-500 rounded shadow text-white font-bold text-center" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="mx-4 my-3 p-3 bg-white rounded-md shadow flex justify-end">
    <a href="{{ route('attendee.create') }}" class="px-4 py-1 mr-3 bg-blue-500 rounded shadow text-white"><i class="fas fa-plus"></i></a>
</div>

@foreach($attendees as $attendee)

<div class="m-4 p-3 bg-white rounded-md shadow flex items-center text-gray-500 text-base">
    <div class="w-1/3 text-7xl text-center">
        <i class="fas fa-user"></i>
    </div>
    <div class="w-2/3">
        <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Nombre:</h3>
            <span>{{ $attendee->name }}</span>
        </div>
        <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Email:</h3>
            <span>{{ $attendee->email }}</span>
        </div>
        <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Pagado:</h3>
                @if($attendee->paid)
                <span class="text-green-500">
                    <i class="far fa-check-square"></i>
                </span>
                @else
                <span class="text-red-500">
                    <i class="far fa-times-circle"></i>
                </span>
                @endif
        </div>
       @if($attendee->payerID)
       <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Payer ID:</h3>
            <span><a href="{{ route('attendee', $attendee).'#ticket' }}">{{ $attendee->payerID }}</a></span>
        </div>
       @endif
        @if($attendee->datetime)
        <div class="flex flex-wrap overflow-hidden">
            <h3 class="mr-3 font-bold">Fecha de entrada:</h3>
            <span>$attendee->datetime</span>
        </div>
        @endif
        <div class="flex flex-wrap overflow-hidden mt-3">
            <a href="{{ route('attendee.edit', $attendee) }}" class="px-4 py-1 mr-3 bg-blue-500 rounded shadow text-white"><i class="fas fa-edit"></i></a>
            <form action="{{ route('attendee.destroy', $attendee) }}" method="post">
            @csrf
            @method('DELETE')
                <button type="submit" onclick="return confirm('¿Deseas eliminar este registro?')" class="px-4 py-1 bg-red-500 rounded shadow text-white"><i class="fas fa-trash"></i></button>
            </form>
        </div>

    </div>
</div>

@endforeach

<div class="mx-4">
    {{ $attendees }}
</div>

@endsection