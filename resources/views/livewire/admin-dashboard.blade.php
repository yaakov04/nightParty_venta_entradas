<div class="max-w-7xl mx-auto">
    <div class="grid_card">
        <div class="mx-4 my-3 p-3 bg-white rounded-md shadow text-gray-500 text-xl flex">
            <i class="fas fa-ticket-alt pt-1 mr-5"></i>
            <h3 class="mr-1">Entradas vendidas:</h3>
            <span class="mr-1">{{ $ticketsSold }}</span>
        </div>
        <div class="mx-4 my-3 p-3 bg-white rounded-md shadow text-gray-500 text-xl flex">
            <i class="fas fa-users pt-1 mr-5"></i>
            <h3 class="mr-1">Personas registradas:</h3>
            <span class="mr-1">{{ $registered }}</span>
        </div>
    
        <div class="mx-4 my-3 p-3 bg-white rounded-md shadow text-gray-500 text-xl flex">
            <i class="fas fa-dollar-sign pt-1 mr-5"></i>
            <h3 class="mr-1">Ganancias totales:</h3>
            <span class="mr-1">{{ $earnings }}</span>
        </div>
    </div>

    <div class="lg:flex justify-end">
        <a href="{{ route('attendee.index') }}" class="lg:w-52 block m-4 p-3 bg-blue-500 rounded-md text-center text-white text-lg cursor-pointer">Ver Registrados</a>
        <a href="{{ route('event.index') }}" class="lg:w-52 block m-4 p-3 bg-green-500 rounded-md text-center text-white text-lg cursor-pointer">Ver Eventos</a>
    </div>
</div>
