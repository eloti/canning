<div id="commentModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <!-- Modal Dialog -->
    <div class="bg-white rounded-lg w-full max-w-3xl">

        <!-- Modal Header -->
        <div class="flex justify-between items-center p-4 border-b border-gray-300">
            <h4 class="text-lg font-semibold">Agregar Comentario: {{$client->legal_name}}</h4>
            <button id="closeModalButton3" class="text-gray-500 hover:text-gray-800">&times;</button>
        </div>

        <!-- Modal Form -->
        <form method="POST" id="contactModalForm" action="{{ route('comments.store') }}" autocomplete="off" class="p-4 space-y-6">
            @csrf
         
                <div class="grid grid-cols-1 gap-4">
                    <!-- Nombre y Apellido -->
                  

                    <!-- Puesto -->
                    <div class="col-span-1">
                        <label for="comment" class="block text-md font-medium text-gray-700">Comentario</label>
                        <textarea id="comment" name="comment" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3"></textarea>
                    </div>
                    
                    <!-- E-mail -->
    

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
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="submit" class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Agregar</button>
                    <button type="button" id="cancelModalButton" class="py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancelar</button>
                </div>

                <hr class="my-6">

                <!-- Footer Note -->
                <div class="text-center text-gray-500"><b>* Campos Obligatorios</b></div>
     
        </form>
    </div>
</div>


