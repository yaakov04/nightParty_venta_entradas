@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="mx-4 my-3 p-3 bg-white rounded-md shadow text-gray-500 text-xl flex">
    <i class="fas fa-ticket-alt pt-1 mr-5"></i>
    <h3 class="mr-1">Entradas vendidas:</h3>
    <span class="mr-1">52</span>
</div>
<div class="mx-4 my-3 p-3 bg-white rounded-md shadow text-gray-500 text-xl flex">
    <i class="fas fa-users pt-1 mr-5"></i>
    <h3 class="mr-1">Personas registradas:</h3>
    <span class="mr-1">52</span>
</div>

<div class="mx-4 my-3 p-3 bg-white rounded-md shadow text-gray-500 text-xl flex">
    <i class="fas fa-dollar-sign pt-1 mr-5"></i>
    <h3 class="mr-1">Ganancias totales:</h3>
    <span class="mr-1">$ 5389.89</span>
</div>

<a href="{{ route('attendee.index') }}" class="block m-4 p-3 bg-blue-500 rounded-md text-center text-white text-lg cursor-pointer">Ver Registrados</a>
@endsection
   