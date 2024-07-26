<!-- resources/views/contacts/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Editar Contacto')

@section('content')

<div id="contactModal" class=" inset-0  flex justify-center items-center  border-gray-500">
    <!-- Modal Dialog -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="bg-white rounded-lg w-full max-w-3xl">

        <!-- Modal Header -->
        <div class="flex justify-between items-center p-4 border-b border-gray-300">
            <h4 class="text-lg font-semibold">Editar Contacto: {{$contact->name}}</h4>
            <button id="closeModalButton" class="text-gray-500 hover:text-gray-800">&times;</button>
        </div>

        <!-- Modal Form -->
        <form method="POST" action="/contacts/{{$contact->id}}/edit" novalidate class="p-4 space-y-6">
            @method('PUT')
            @csrf
            <section>
                <div class="grid grid-cols-1 gap-4">
                    <!-- Nombre y Apellido -->
                    <div class="col-span-1">
                        <label for="name" class="block text-md font-medium text-gray-700">Nombre y Apellido*</label>
                        <input id="name" type="text" name="name" value="{{$contact->name}}" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 {{ $errors->has('name') ? 'border-red-500' : '' }}">
                        @if ($errors->has('name'))
                            <span class="text-red-500 text-sm mt-2"><strong>Debe ingresar el nombre</strong></span>
                        @endif
                    </div>

                    <!-- Puesto -->
                    <div class="col-span-1">
                        <label for="position" class="block text-md font-medium text-gray-700">Puesto</label>
                        <input id="position" type="text" name="position" value="{{$contact->position}}" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3">
                    </div>

                    <!-- E-mail -->
                    <div class="col-span-1">
                        <label for="email" class="block text-md font-medium text-gray-700">E-mail</label>
                        <input id="email" type="email" name="email" value="{{$contact->email}}" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3">
                    </div>

                    <!-- Celular -->
                    <div class="col-span-1">
                        <label for="cell_phone" class="block text-md font-medium text-gray-700">Celular</label>
                        <input id="cell_phone" type="text" name="cell_phone" value="{{$contact->cell_phone}}" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3">
                    </div>

                    <!-- Teléfono fijo -->
                    <div class="col-span-1">
                        <label for="phone" class="block text-md font-medium text-gray-700">Teléfono fijo</label>
                        <input id="phone" type="text" name="phone" value="{{$contact->phone}}" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3">
                    </div>

                    <!-- Interno -->
                    <div class="col-span-1">
                        <label for="extension" class="block text-md font-medium text-gray-700">Interno</label>
                        <input id="extension" type="text" name="extension" value="{{$contact->extension}}" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3">
                    </div>

                    <!-- Desactivar Contacto -->
                    <div class="col-span-1">
                        <label for="deactivate" class="block text-md font-medium text-gray-700">Desactivar Contacto</label>
                        <input id="deactivate" type="checkbox" name="deactivate" value="1" {{ $contact->deactivate ? 'checked' : '' }} class="mt-1 block border border-gray-300 rounded-md py-2 px-3">
                    </div>
                    
                    <!-- Hidden Fields -->
                    @if(isset($origin->what_blade))
                        <input type="hidden" name="what_blade" value="{{$origin->what_blade}}">
                    @endif

                    <input type="hidden" name="client_id" value="{{$contact->client_id}}">

                    @if(isset($origin->unit_id))
                        <input type="hidden" name="unit_id" value="{{$origin->unit_id}}">
                    @endif

                    @if(isset($origin->address_id))
                        <input type="hidden" name="address_id" value="{{$origin->address_id}}">
                    @endif
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="submit" class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Actualizar</button>
                    <a type="button" class="py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2" href="{{ url()->previous() }}">Cancelar</a>
                </div>

                <hr class="my-6">

                <!-- Footer Note -->
                <div class="text-center text-gray-500"><b>* Campos Obligatorios</b></div>
            </section>
        </form>
    </div>
</div>

@endsection
