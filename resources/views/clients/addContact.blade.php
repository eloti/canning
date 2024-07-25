@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

<div class="container eagle-container">
  
  <div class="col d-flex justify-content-center" style="margin-top: 0.5rem">
    <div class="card eagle-card col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">    

        <div class="card-header eagle-card-header">
          <h3 class="eagle-h3">Agregar Contacto: {{$client->legal_name}}</h3>
        </div>

        <form method="POST" id="contactModalForm" action="{{ route('contacts.store') }}" autocomplete="off" class="space-y-6 bg-white p-2 rounded-lg shadow-md">
            @csrf
            <section>
                <div class="grid grid-cols-1 gap-2">
                    <!-- Nombre y Apellido -->
                    <div class="col-span-1">
                        <label for="name" class="block text-md font-medium text-gray-700">Nombre y Apellido*</label>
                        <input id="name" type="text" name="name" class="mt-2 block w-full  border-black py-1 px-3 border-2 rounded-md  max-w-72  sm:text-md {{ $errors->has('name') ? 'border-red-500' : '' }}">
                        @if ($errors->has('name'))
                            <span class="text-red-500 text-sm mt-2"><strong>Debe ingresar el nombre</strong></span>
                        @endif
                    </div>
                    
                    <!-- Puesto -->
                    <div class="col-span-1">
                        <label for="position" class="block text-md font-medium text-gray-700">Puesto</label>
                        <input id="position" type="text" name="position" class="mt-2 block w-full  border-black py-1 px-3 border-2 rounded-md  max-w-72  sm:text-md">
                    </div>
        
                    <!-- E-mail -->
                    <div class="col-span-1">
                        <label for="email" class="block text-md font-medium text-gray-700">E-mail</label>
                        <input id="email" type="email" name="email" class="mt-2 block w-full  border-black py-1 px-3 border-2 rounded-md  max-w-72  sm:text-md">
                    </div>
        
                    <!-- Celular -->
                    <div class="col-span-1">
                        <label for="cell_phone" class="block text-md font-medium text-gray-700">Celular</label>
                        <input id="cell_phone" type="text" name="cell_phone" class="mt-2 block w-full  border-black py-1 px-3 border-2 rounded-md  max-w-72  sm:text-md">
                    </div>
        
                    <!-- Teléfono fijo -->
                    <div class="col-span-1">
                        <label for="phone" class="block text-md font-medium text-gray-700">Teléfono fijo</label>
                        <input id="phone" type="text" name="phone" class="mt-2 block w-full  border-black py-1 px-3 border-2 rounded-md  max-w-72  sm:text-md">
                    </div>
        
                    <!-- Interno -->
                    <div class="col-span-1">
                        <label for="extension" class="block text-md font-medium text-gray-700">Interno</label>
                        <input id="extension" type="text" name="extension" class="mt-2 block w-full  border-black py-1 px-3 border-2 rounded-md  max-w-72  sm:text-md">
                    </div>
        
                    <div class="col-span-1">
                        <label for="comment" class="block text-md font-medium text-gray-700">Comentario</label>
                        <input id="comment" type="text" name="comment" class="mt-2 block w-full  border-black py-1 px-3 border-2 rounded-md  max-w-72  sm:text-md">
                    </div>

                    <!-- Hidden Fields -->
                    @if(isset($origin->what_blade))
                        <input type="hidden" name="what_blade" value="{{$origin->what_blade}}">
                    @endif
        
                    <input type="hidden" name="client_id" value="{{$client->id}}">
        
                    @if(isset($origin->unit_id))
                        <input type="hidden" name="unit_id" value="{{$origin->unit_id}}">
                    @endif
        
                    @if(isset($origin->address_id))
                        <input type="hidden" name="address_id" value="{{$origin->address_id}}">
                    @endif
                </div>
                
                <!-- Form Actions -->
                <div class="flex justify-start space-x-4 mt-6">
                    <button type="submit" class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2  focus:ring-offset-2">Agregar</button>
                    <a href="{{ url()->previous() }}" class="py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancelar</a>
                </div>
        
                <hr class="my-6">
        
                <!-- Footer Note -->
                <div class="text-center text-gray-500"><b>* Campos Obligatorios</b></div>
            </section>
        </form>
        
      

    </div>
</div>



@endsection