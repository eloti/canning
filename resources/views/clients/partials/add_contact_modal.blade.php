<div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <!-- Modal Dialog -->
    <div class="bg-white rounded-lg w-full max-w-3xl">

        <!-- Modal Header -->
        <div class="flex justify-between items-center p-1 border-b border-gray-300">
            <h4 class="text-lg font-semibold">Agregar Contacto: {{$client->legal_name}}</h4>
            <button id="closeModalButton" class="text-gray-500 hover:text-gray-800">&times;</button>
        </div>

        <!-- Modal Form -->
        <form method="POST" id="contactModalForm" action="{{ route('contacts.store') }}" autocomplete="off" class="p-1 space-y-6">
            @csrf
            <section>
                <div class="grid grid-cols-1 gap-4">
                    <!-- Nombre y Apellido -->
                    <div class="col-span-1">
                        <label for="name" class="mb-0 block text-md font-medium text-gray-700">Nombre y Apellido*</label>
                        <input id="name" type="text" name="name" class="mt-1 block w-full border border-gray-300 rounded-md py-1 px-3 {{ $errors->has('name') ? 'border-red-500' : '' }}">
                        @if ($errors->has('name'))
                            <span class="text-red-500 text-sm mt-2"><strong>Debe ingresar el nombre</strong></span>
                        @endif
                    </div>

                    <!-- Puesto -->
                    <div class="col-span-1">
                        <label for="position" class="mb-0 block text-md font-medium text-gray-700">Puesto</label>
                        <input id="position" type="text" name="position" class="mt-1 block w-full border border-gray-300 rounded-md py-1 px-3">
                    </div>

                    <!-- E-mail -->
                    <div class="col-span-1">
                        <label for="email" class="mb-0 block text-md font-medium text-gray-700">E-mail</label>
                        <input id="email" type="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md py-1 px-3">
                    </div>

                    <!-- Celular -->
                    <div class="col-span-1">
                        <label for="cell_phone" class="mb-0 block text-md font-medium text-gray-700">Celular</label>
                        <input id="cell_phone" type="text" name="cell_phone" class="mt-1 block w-full border border-gray-300 rounded-md py-1 px-3">
                    </div>

                    <!-- Teléfono fijo -->
                    <div class="col-span-1">
                        <label for="phone" class="mb-0 block text-md font-medium text-gray-700">Teléfono fijo</label>
                        <input id="phone" type="text" name="phone" class="mt-1 block w-full border border-gray-300 rounded-md py-1 px-3">
                    </div>

                    <!-- Interno -->
                    <div class="col-span-1">
                        <label for="extension" class="mb-0 block text-md font-medium text-gray-700">Interno</label>
                        <input id="extension" type="text" name="extension" class="mt-1 block w-full border border-gray-300 rounded-md py-1 px-3">
                    </div>
                    <div class="col-span-1">
                        <label for="comment" class="mb-0 block text-md font-medium text-gray-700">Comentario</label>
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
                <div class="flex justify-end space-x-4 mt-2">
                    <button type="submit" class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Agregar</button>
                    <button type="button" id="cancelModalButton" class="py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancelar</button>
                </div>

                <hr class="my-2">

                <!-- Footer Note -->
                <div class="text-center text-gray-500"><b>* Campos Obligatorios</b></div>
            </section>
        </form>
    </div>
</div>




<script>

  document.getElementById('cancelModalButton').addEventListener('click', function() {
      document.getElementById('contactModal').classList.add('hidden');
  });

  document.getElementById('cancelModalButton').addEventListener('click', function() {
      document.getElementById('contactModal').classList.add('hidden');
  });

  // Show modal if there are validation errors
  @if ($errors->has('legal_name') || $errors->has('cuit_num') || $errors->has('vat_status') || $errors->has('sales_tax_rate') || $errors->has('payment_terms'))
  document.getElementById('modalAddClient').classList.remove('hidden');
  @endif
</script>

