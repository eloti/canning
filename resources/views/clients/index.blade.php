@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

@inject('industries', 'App\Services\Industries')
@inject('countries', 'App\Services\Countries')

<div class="container eagle-container">

  <div class="bg-gray-100 ">
    <div class="flex justify-between items-center p-4">
      <h1 class="text-2xl font-bold">Clientes</h1>
      <div class="flex space-x-2">
        <!--<a href="/clients/create" class="bg-rental text-white font-bold py-2 px-4 rounded hover:bg-rentallight">Nuevo</a>-->
        <button id="openModalButton" class="bg-rental text-white font-bold py-2 px-4 rounded hover:bg-rentallight">Agregar Cliente</button>
      </div>
    </div>
  </div>
  

  <div class="row eagle-row-clean" style="position: relative; top: 3.5rem; height: 50vh">

    <div class="col-12 container"> <!-- 2nd column -->
      <table class="min-w-full bg-white">
        <thead class="border-b-2 h-10">
            <tr class="text-center">
                <th class="model_table w-1/12">ID</th>
                <th class="model_table w-1/3">Razón Social</th>
                <th class="model_table w-1/4">Nombre Comercial</th>
                <th class="model_table w-1/12">Tipo ID</th>
                <th class="model_table w-1/5">Num</th>
            </tr>
        </thead>
    
        
        <tbody>
          @foreach($clients as $oneClient)
          <tr class="{{ $loop->even ? 'bg-gray-100' : '' }}">
              <td class="model_table w-1/12"><a class="eagle-link " href="/clients/{{$oneClient->id}}">{{$oneClient->id}}</a></td>
              <td class="model_table w-1/3"><a class="eagle-link " href="/clients/{{$oneClient->id}}">{{$oneClient->legal_name}}</a></td>
              <td class="model_table w-1/4"><a class="eagle-link " href="/clients/{{$oneClient->id}}">{{$oneClient->commercial_name}}</a></td>
              <td class="model_table w-1/12">
                  @if($oneClient->cuit_type === 1)
                  <a class="eagle-link " href="/clients/{{$oneClient->id}}">CUIT</a>
                  @elseif($oneClient->cuit_type === 2)
                  <a class="eagle-link " href="/clients/{{$oneClient->id}}">CUIL</a>
                  @elseif($oneClient->cuit_type === 3)
                  <a class="eagle-link " href="/clients/{{$oneClient->id}}">RUT</a>
                  @endif
              </td>
              <td class="model_table w-1/5">
                  <a class="eagle-link " href="/clients/{{$oneClient->id}}">{{$oneClient->cuit_num}}</a>
              </td>
              <td class="model_table w-1/12 py-3">
                  <div class="flex justify-center">
                      <a href="/clients/{{$oneClient->id}}/edit" class="rounded-md mr-2 bg-rental px-3 py-1 text-sm font-semibold text-white shadow-sm hover:bg-rentallight focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Editar</a>
                     <!-- <form action="/clients/{{$oneClient->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="rounded-md bg-red-600 px-3 py-1 text-sm font-semibold text-white shadow-sm hover:text-red-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Eliminar</button>
                      </form> -->
                  </div>
              </td>
          </tr>
          @endforeach
      </tbody>
      
      
    
    </table>
    
      
    </div> <!-- end of 2nd column -->

  </div> <!--end of main row -->



<!-- add client modal -->
<!-- Modal Background -->
<div id="modalAddClient" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
  <!-- Modal Dialog -->
  <div class="bg-white rounded-lg w-full max-w-3xl">

      <!-- Modal Header -->
      <div class="flex justify-between items-center p-4 border-b border-gray-300">
          <h4 class="text-lg font-semibold">Agregar Cliente</h4>
          <button id="closeModalButton" class="text-gray-500 hover:text-gray-800">&times;</button>
      </div>

      <!-- Modal Form -->
      <form method="POST" action="{{ route('clients.store') }}" autocomplete="off" class="p-4">
          {{ csrf_field() }}
          
          <div class="space-y-4">
              <div class="flex flex-col space-y-2">
                  <label for="legal_name" class="font-medium">Razón Social*:</label>
                  <input type="text" id="legal_name" name="legal_name" value="{{ old('legal_name') }}" class="form-input w-full border border-gray-300 rounded p-2{{ $errors->has('legal_name') ? ' border-red-500' : '' }}">
                  @if ($errors->has('legal_name'))
                  <span class="text-red-500 text-sm">Debe especificar la razón social del cliente.</span>
                  @endif
              </div>

              <div class="flex flex-col space-y-2">
                  <label for="commercial_name" class="font-medium">Nombre Comercial:</label>
                  <input type="text" id="commercial_name" name="commercial_name" value="{{ old('commercial_name') }}" class="form-input w-full border border-gray-300 rounded p-2">
              </div>

              <div class="flex flex-col space-y-2">
                <label for="cuit_type" class="font-medium">Tipo de ID Fiscal*:</label>
                <select id="cuit_type" name="cuit_type" class="form-select w-full border border-gray-300 rounded p-2{{ $errors->has('cuit_type') ? ' border-red-500' : '' }}">
                    @foreach($cuit_typeArray as $index => $onecuit_typeArray)
                        <option value="{{ $index }}" {{ old('vat_status') == $onecuit_typeArray ? 'selected' : '' }}>{{ $onecuit_typeArray }}</option>
                    @endforeach
                </select>
                @if ($errors->has('cuit_type'))
                    <span class="text-red-500 text-sm">Debe ingresar tipo de ID fiscal.</span>
                @endif
            </div>
            

              <div class="flex flex-col space-y-2">
                  <label for="cuit_num" class="font-medium">CUIT/RUT*:</label>
                  <input type="text" id="cuit_num" name="cuit_num" value="{{ old('cuit_num') }}" class="form-input w-full border border-gray-300 rounded p-2{{ $errors->has('cuit_num') ? ' border-red-500' : '' }}">
                  @if ($errors->has('cuit_num'))
                  <span class="text-red-500 text-sm">Debe especificar el CUIT del cliente y no debe estar repetido.</span>
                  @endif
              </div>

              <div class="flex flex-col space-y-2">
                  <label for="vat_status" class="font-medium">Condición frente al IVA*:</label>
                  <select id="vat_status" name="vat_status" class="form-select w-full border border-gray-300 rounded p-2{{ $errors->has('vat_status') ? ' border-red-500' : '' }}">
                      @foreach($vatArray as $index => $oneVatArray)
                      <option value="{{ $index }}" {{ old('vat_status') == $oneVatArray ? 'selected' : '' }}>{{ $oneVatArray }}</option>
                      @endforeach
                  </select>
                  @if ($errors->has('vat_status'))
                  <span class="text-red-500 text-sm">Debe especificar la condición frente al IVA del cliente.</span>
                  @endif
              </div>

              <div class="flex flex-col space-y-2">
                  <label for="sales_tax_rate" class="font-medium">Perc. IIBB [%]*:</label>
                  <input type="text" id="sales_tax_rate" name="sales_tax_rate" value="{{ old('sales_tax_rate') }}" class="form-input w-full border border-gray-300 rounded p-2{{ $errors->has('sales_tax_rate') ? ' border-red-500' : '' }}">
                  @if ($errors->has('sales_tax_rate'))
                  <span class="text-red-500 text-sm">Debe especificar alícuota de IIBB.</span>
                  @endif
              </div>

              <div class="flex flex-col space-y-2">
                  <label for="payment_terms" class="font-medium">Condición de Venta*:</label>
                  <select id="payment_terms" name="payment_terms" class="form-select w-full border border-gray-300 rounded p-2{{ $errors->has('payment_terms') ? ' border-red-500' : '' }}">
                      @foreach($payment_termsArray as $index => $onePayment_termsArray)
                      <option value="{{ $index }}" {{ old('payment_terms') == $onePayment_termsArray ? 'selected' : '' }}>{{ $onePayment_termsArray }}</option>
                      @endforeach
                  </select>
                  @if ($errors->has('payment_terms'))
                  <span class="text-red-500 text-sm">Debe especificar la condición de venta.</span>
                  @endif
              </div>
          </div>

          <div class="flex justify-between items-center mt-4">
              <span class="text-sm font-medium">* Campos Obligatorios</span>
              <div class="space-x-2">
                  <button type="submit" class="bg-rental text-white font-bold py-2 px-4 rounded hover:bg-rentallight">Agregar</button>
                  <button type="button" id="cancelModalButton" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-700">Cancelar</button>
              </div>
          </div>
      </form>

  </div>
</div>

</div> <!-- end container -->

@endsection

@section ('script')


<script>
  document.getElementById('openModalButton').addEventListener('click', function() {
      document.getElementById('modalAddClient').classList.remove('hidden');
  });

  document.getElementById('closeModalButton').addEventListener('click', function() {
      document.getElementById('modalAddClient').classList.add('hidden');
  });

  document.getElementById('cancelModalButton').addEventListener('click', function() {
      document.getElementById('modalAddClient').classList.add('hidden');
  });

  // Show modal if there are validation errors
  @if ($errors->has('legal_name') || $errors->has('cuit_num') || $errors->has('vat_status') || $errors->has('sales_tax_rate') || $errors->has('payment_terms'))
  document.getElementById('modalAddClient').classList.remove('hidden');
  @endif
</script>

@endsection


