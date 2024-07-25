@extends('layouts.app')

@section('title', 'Cliente')

@section('content')

@inject('industries', 'App\Services\Industries')
@inject('countries', 'App\Services\Countries')

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

         <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col space-y-2">
                <label for="commercial_name" class="font-medium">Nombre Comercial*:</label>
                <input type="text" id="commercial_name" name="commercial_name" value="{{ old('commercial_name') }}" class="form-input w-full border border-gray-300 rounded p-2">
            </div>
            <div class="flex flex-col space-y-2">
              <label for="legal_name" class="font-medium">Razón Social:</label>
              <input type="text" id="legal_name" name="legal_name" value="{{ old('legal_name') }}" class="form-input w-full border border-gray-300 rounded p-2{{ $errors->has('legal_name') ? ' border-red-500' : '' }}">
              @if ($errors->has('legal_name'))
              <span class="text-red-500 text-sm">Debe especificar la razón social del cliente.</span>
              @endif
          </div>
          <div class="flex flex-col space-y-2">
            <label for="cuit_type" class="font-medium">Tipo de ID Fiscal:</label>
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
              <label for="cuit_num" class="font-medium">CUIT/RUT:</label>
              <input type="text" id="cuit_num" name="cuit_num" value="{{ old('cuit_num') }}" class="form-input w-full border border-gray-300 rounded p-2{{ $errors->has('cuit_num') ? ' border-red-500' : '' }}">
              @if ($errors->has('cuit_num'))
              <span class="text-red-500 text-sm">Debe especificar el CUIT del cliente y no debe estar repetido.</span>
              @endif
          </div>
         </div>
         
         <div class="flex flex-col space-y-2">
            <label for="rubro">Rubro</label>
            <select name="rubro" id="rubro" class="form-control">
                <option value="">Seleccione un rubro</option>
                <option value="Banco/Financiera">Banco/Financiera</option>
                <option value="Electricidad, Gas y Agua">Electricidad, Gas y Agua</option>
                <option value="Comercio Mayorista">Comercio Mayorista</option>
                <option value="Minorista/Supermercado">Minorista/Supermercado</option>
                <option value="Minería">Minería</option>
                <option value="Pesca">Pesca</option>
                <option value="Agricultura y Ganadería">Agricultura y Ganadería</option>
                <option value="Hotelería y Restaurantes">Hotelería y Restaurantes</option>
                <option value="Otras Manufacturas">Otras Manufacturas</option>
                <option value="Alimenticia">Alimenticia</option>
                <option value="Automotriz">Automotriz</option>
                <option value="Siderurgia">Siderurgia</option>
                <option value="Construcción">Construcción</option>
                <option value="Oil & Gas">Oil & Gas</option>
                <option value="Telecomunicaciones">Telecomunicaciones</option>
                <option value="Transporte Público">Transporte Público</option>
                <option value="Alquiler de Maquinaria">Alquiler de Maquinaria</option>
                <option value="Logística">Logística</option>
                <option value="Salud">Salud</option>
                <option value="Administración Pública">Administración Pública</option>
                <option value="Centro Comercial">Centro Comercial</option>
                <option value="Otros Servicios">Otros Servicios</option>
                <option value="Ingeniería/Instalaciones">Ingeniería/Instalaciones</option>
                <option value="Entretenimiento/Espectáculos">Entretenimiento/Espectáculos</option>
                <option value="Consorcio">Consorcio</option>
            </select>
        </div>
          <div class="flex flex-col space-y-2">
              <label for="vat_status" class="font-medium">Condición frente al IVA:</label>
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
              <label for="payment_terms" class="font-medium">Condición de Venta:</label>
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


@endsection

@section('script')

  <script type="text/javascript">

    $(document).ready(function(){

      function cuit_mask() {
        var country = $('#country').val();

        if (country == 1) {
          $('#cuit_num').mask('99-99999999-9');
        } else if (country == 2) {
          $('#cuit_num').mask('999999999999');
        }

      }

      cuit_mask();
      $('#country').on('change', cuit_mask);

    }); // end of document ready function
  
</script>

@endsection