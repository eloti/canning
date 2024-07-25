@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="bg-gray-100 ">
    <div class="flex justify-between items-center p-4">
      <h1 class="text-2xl font-bold">Usuarios</h1>
      <div class="flex space-x-2">
        <!--<a href="/clients/create" class="bg-rental text-white font-bold py-2 px-4 rounded hover:bg-rentallight">Nuevo</a>-->
        <div class="flex justify-end">
            <button class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" onclick="toggleModal()">Agregar Usuario</button>
        </div>
      </div>
    </div>
  </div>
@if (session('success'))
<div class="bg-rentallight text-white p-4 rounded mb-4 mt-4">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="bg-red-500 text-white p-4 rounded mb-4">
    {{ session('error') }}
</div>
@endif
<div id="tab-contactos" class="tab-content">
    <div id="contactos" class=" p-4 bg-white shadow-md rounded-lg">
      <div class="flex justify-end mb-6">

        
    </div>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-50">
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Nombre</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Apellido</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Email</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Teléfono</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Rol</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Estado</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="text-center border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-2 px-4 text-sm text-gray-600">{{ $user->firstname }}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">{{ $user->lastname }}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">{{ $user->email }}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">{{ $user->cell }}</td>
                   
                    <td class="py-2 px-4 text-sm text-gray-600">
                   {{$user->role}}

                    </td>
                    <td class="py-2 px-4 text-sm text-gray-600">
                        @if ( $user->active == true )
                        Activo
                     @else
                    Inactivo
                     @endif

                    </td>
                    <td class="py-2 px-4 text-sm text-gray-600">
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="inline-block text-rental hover:text-indigo-900 text-xs font-medium">Ver/Editar</a>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
     
    
@include('users.admin.partials.register_user_modal')
  </div>
@endsection

@section('script')

<script>
    function toggleModal() {
        const modal = document.getElementById('contactModal');
        modal.classList.toggle('hidden');
    }

    document.querySelector("#closeModalButton").onclick = function() {
      const modal = document.getElementById('contactModal');
        modal.classList.toggle('hidden');
}
</script>
@endsection