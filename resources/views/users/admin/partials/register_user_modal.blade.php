
<div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center  @if ($errors->any()) @else hidden @endif">
    <!-- Modal Dialog -->
    <div class="bg-white rounded-lg w-full max-w-3xl">

        <!-- Modal Header -->
        <div class="flex justify-between items-center p-4 border-b border-gray-300">
            <h4 class="text-lg font-semibold">Registrar Usuario</h4>
            <button id="closeModalButton" class="text-gray-500 hover:text-gray-800">&times;</button>
        </div>

<form method="POST" action="{{ route('register') }}" class="p-4">
    {{csrf_field()}}
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="space-y-4">
    
  
      <div class="border-b border-gray-900/10 pb-4">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Informacion Personal</h2>

  
        <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">Nombre*</label>
            <div class="mt-2">
              <input type="text" name="firstname" id="firstname" autocomplete="given-name"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3
" >
@error('firstname')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Apellido*</label>
            <div class="mt-2">
              <input type="text" name="lastname" id="lastname"  autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3
" >
@error('lastname')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="company" class="block text-sm font-medium leading-6 text-gray-900">Compañía</label>
            <div class="mt-2">
                <input type="text" name="company" id="company"  autocomplete="family-name" class=" input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                @error('company')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="sm:col-span-3">
            <label for="rank" class="block text-sm font-medium leading-6 text-gray-900">Puesto</label>
            <div class="mt-2">
                <input type="text" name="rank" id="rank" autocomplete="family-name" class=" input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                @error('rank')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
          <div class="sm:col-span-3">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email*</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" autocomplete="email"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3
" >
@error('email')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="cell" class="block text-sm font-medium leading-6 text-gray-900">Teléfono</label>
            <div class="mt-2">
                <input id="cell" name="cell" type="tel" autocomplete="tel" placeholder="{{ $user->cell }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3
" >
@error('cell')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
            </div>
        </div>
        <div class="sm:col-span-3">
          <label for="landline" class="block text-sm font-medium leading-6 text-gray-900">Teléfono Laboral</label>
          <div class="mt-2">
              <input id="landline" name="landline" type="tel" autocomplete="tel" placeholder="{{ $user->landline }}" value="{{ $user->landline }}" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
              @error('landline')
                  <span class="text-sm text-red-600">{{ $message }}</span>
              @enderror
          </div>
      </div>


      <div class="sm:col-span-3">
        <label for="role" class="block text-md font-medium text-gray-700">Rol:</label>
        <select id="role" name="role" class="mt-1 block w-full border border-gray-300 rounded-md py-1.5 px-3">
            <option value="Administración">Administración</option>
            <option value="Comercial">Comercial</option>
            <option value="Dirección">Dirección</option>
            <option value="Logística">Logística</option>
            <option value="Servicio Técnico">Servicio Técnico</option>
        </select>
    </div>


        <div class="sm:col-span-3">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña*</label>
            <div class="mt-2">
                <input type="password" name="password" id="password" autocomplete="new-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-3">
            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Repetir Contraseña*</label>
            <div class="mt-2">
                <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3">
            </div>
        </div>
        </div>
      </div>
  
   <input type="hidden" name="clearance" value="2">
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">

      <button type="submit" class="rounded-md bg-rental px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rentallight focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
    </div>
  </form>

</div>
</div>