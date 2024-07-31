@extends('layouts.app')

@section('title', 'Cliente')

@section('content')

@inject('industries', 'App\Services\Industries')

<div class="bg-gray-100 flex justify-center min-h-screen">

<div class="bg-white rounded-lg w-full max-w-3xl">
  
  <div class="flex justify-between items-center p-2 border-b border-gray-300">
    <h4 class="text-lg font-semibold">Agregar Cliente</h4>
  </div>


  <form class="col-12 rental-form" action="{{ route('clients.store') }}" method="POST" autocomplete="off" id="formulario">
    {{ csrf_field() }} 
    <section class="col-12 row" style="margin: 0; padding: 0">

      <input name="origin" value="{{ $origin }}" hidden>

      <div class="row col-12">

        <div class="row eagle-row-clean col-6 p-2 mx-auto">
          <label for="commercial_name" class="eagle-label col-12">Nombre Comercial*:</label>
          
            <input type="text" id="commercial_name" name="commercial_name" value="{{ old('commercial_name') }}" class="mac-form-control w-100">
         
            <span class="invalid-feedback d-none text-center w-100" role="alert" style="padding: 0">
              <strong>Ingrese el nombre comercial.</strong>
            </span>  
          
        </div>

        <div class="row eagle-row-clean col-6 p-2">
          <label for="legal_name" class="eagle-label col-12">Razón Social:</label>
          <input type="text" id="legal_name" name="legal_name" value="{{ old('legal_name') }}" class="mac-form-control col-12">             
        </div>

        <div class="row eagle-row-clean col-6 p-2">
          <label for="cuit_type" class="eagle-label col-12">Tipo de ID Fiscal:</label>
          <select id="cuit_type" name="cuit_type" class="mac-form-control col-12">
            @foreach($cuit_typeArray as $index => $onecuit_typeArray)
              <option value="{{ $index }}" {{ old('vat_status') == $onecuit_typeArray ? 'selected' : '' }}>{{ $onecuit_typeArray }}</option>
            @endforeach
          </select>             
        </div>

        <div class="row eagle-row-clean col-6 p-2">
          <label for="cuit_num" class="eagle-label col-12">CUIT/RUT:</label>
          <input type="text" id="cuit_num" name="cuit_num" value="{{ old('cuit_num') }}" class="mac-form-control col-12">  
        </div>

      </div>
         

      <div class="row col-12">
         
        <div class="row eagle-row-clean col-6 p-2">
          <label for="rubro" class="eagle-label col-12">Rubro</label>
          <select name="rubro" id="rubro" class="mac-form-control col-12">
            @foreach($industries->get() as $index => $industry)            
              <option value="{{ $index }}" {{ old('industry') == $index ? 'selected' : '' }}>{{ $industry }}</option>
            @endforeach
          </select>
        </div>

        <div class="row eagle-row-clean col-6 p-2">
          <label for="vat_status" class="eagle-label col-12">Condición frente al IVA:</label>
          <select id="vat_status" name="vat_status" class="mac-form-control col-12">
            @foreach($vatArray as $index => $oneVatArray)
              <option value="{{ $index }}" {{ old('vat_status') == $oneVatArray ? 'selected' : '' }}>{{ $oneVatArray }}</option>
            @endforeach
          </select>              
        </div>

        <div class="row eagle-row-clean col-6 p-2">
          <label for="sales_tax_rate" class="eagle-label col-12">Perc. IIBB [%]:</label>
          <input type="text" id="sales_tax_rate" name="sales_tax_rate" value="{{ old('sales_tax_rate') }}" class="mac-form-control col-12">             
        </div>

        <div class="row eagle-row-clean col-6 p-2">
          <label for="payment_terms" class="eagle-label col-12">Condición de Venta:</label>
          <input id="payment_terms" name="payment_terms" class="mac-form-control col-12">            
        </div>

      </div>


      <div class="row col-12 pt-4">
        <span class="text-sm font-medium col-4">* Campos Obligatorios</span>
        <div class="col-4">
          <button type="submit" class="bg-rental text-white font-bold py-2 px-4 rounded hover:bg-rentallight">Agregar</button>
        </div>
        <div class="col-4">
          <a type="button" href="{{URL::previous()}}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-700">Cancelar</a>
        </div>
      </div>

    </section>
  </form>

</div>
</div>


@endsection

@section('script')

  <script type="text/javascript">

    $(document).ready(function() {

      $("#formulario").on('submit', function(event) {
       event.preventDefault();

        var pass = true;

        $(".is-invalid").removeClass('is-invalid');

        $(".invalid-feedback").addClass('d-none');

        if(!$("#commercial_name").val()) {
          $("#commercial_name").addClass('is-invalid');
          $("#commercial_name").parent().find('.invalid-feedback').removeClass('d-none').css('display', 'block');
          pass = false;
        }

        if (pass) {
          this.submit();
        } else {
          console.log('Validation failed');
        }

      });

    });
  
</script>

@endsection