@extends('layouts.app')

@section('title', 'Cliente')

@section('content')

@inject('industries', 'App\Services\Industries')
@inject('countries', 'App\Services\Countries')

<div class="container eagle-container">
  
  <div class="col d-flex justify-content-center" style="margin-top: 0.5rem">
      <div class="card eagle-card col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">    

          <div class="card-header eagle-card-header">
              <h3 class="eagle-h3">Alta de Cliente</h3>
          </div>

          <form method="POST" action="{{ route('clients.store') }}" autocomplete="off" novalidate>
            {{csrf_field()}}

            <div class="card-body eagle-card-body">
                  <div class="container-fluid">

            <div class="row eagle-row-clean col-12">
              <label for="legal_name" class="mac-label col-4 col-sm-4 col-md-4 col-lg-4">Razón Social*:</label>
              <input class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control{{ $errors->has('legal_name') ? ' is-invalid' : '' }}" id="legal_name" name="legal_name" value="{{ old('legal_name') }}">
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
              @if ($errors->has('legal_name'))
                <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                  <strong style="font-size: 0.7rem;">Debe especificar la razón social del cliente.</strong>
                </span>
              @endif
            </div>

            <div class="row eagle-row-clean col-12">
              <label for="commercial_name" class="mac-label col-4 col-sm-4 col-md-4 col-lg-4">Nombre Comercial*:</label>
              <input class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control{{ $errors->has('commercial_name') ? ' is-invalid' : '' }}" id="commercial_name" name="commercial_name" value="{{ old('commercial_name') }}">
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
              @if ($errors->has('commercial_name'))
                <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                  <strong style="font-size: 0.7rem;">Debe especificar el nombre comercial del cliente.</strong>
                </span>
              @endif
            </div>

 

            <div class="row eagle-row-clean col-12">
              <label for="cuit_type" class="mac-label col-4 col-sm-4 col-md-4 col-lg-4">Tipo de ID Fiscal*:</label>
                <select class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control{{ $errors->has('cuit_type') ? ' is-invalid' : '' }}" id="cuit_type" name="cuit_type"> 
                  @foreach($cuit_typeArray as $index => $onecuit_typeArray)
                  <option value="{{ $index }}" {{ old('vat_status') == $onecuit_typeArray ? 'selected' : '' }}>{{ $onecuit_typeArray }}</option>
                @endforeach
                </select>
                  <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                  @if ($errors->has('cuit_type'))
                    <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                      <strong style="font-size: 0.7rem;">Debe ingresar tipo de ID fiscal</strong>           
                    </span>
                  @endif
            </div>        

            <div class="row eagle-row-clean col-12">
              <label for="cuit_num" class="mac-label col-4 col-sm-4 col-md-4 col-lg-4">CUIT/RUT*:</label>
              <input class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control{{ $errors->has('cuit_num') ? ' is-invalid' : '' }}" id="cuit_num" name="cuit_num" value="{{ old('cuit_num') }}">
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                @if ($errors->has('cuit_num'))
                  <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                    <strong style="font-size: 0.7rem;">Debe ingresar el CUIT del cliente, no debe estar repetido.</strong>
                  </span>
                @endif
            </div>

            <div class="row eagle-row-clean col-12">
              <label for="vat_status" class="mac-label col-4 col-sm-4 col-md-4 col-lg-4">Condición frente al IVA*:</label>
              <select class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control{{ $errors->has('vat_status') ? ' is-invalid' : '' }}" id="vat_status" name="vat_status" data-old="{{ old('vat_status') }}">
                @foreach($vatArray as $index => $oneVatArray)
                  <option value="{{ $index }}" {{ old('vat_status') == $oneVatArray ? 'selected' : '' }}>{{ $oneVatArray }}</option>
                @endforeach
              </select>
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
              @if ($errors->has('vat_status'))
                <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                  <strong style="font-size: 0.7rem;">Debe especificar la condición frente al IVA del cliente.</strong>
                </span>
              @endif                    
            </div>

            <div class="row eagle-row-clean col-12">
              <label for="sales_tax_rate" class="mac-label col-4 col-sm-4 col-md-4 col-lg-4">Perc. IIBB [%]*:</label>
              <input class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control{{ $errors->has('sales_tax_rate') ? ' is-invalid' : '' }}" id="sales_tax_rate" name="sales_tax_rate" value="{{ old('sales_tax_rate') !== null ? old('sales_tax_rate') : 0 }}" >
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                @if ($errors->has('sales_tax_rate'))
                  <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                    <strong style="font-size: 0.7rem;">Debe especificar alícuota de IIBB.</strong>
                  </span>
                @endif
            </div>

            <div class="row eagle-row-clean col-12">
              <label for="payment_terms" class="mac-label col-4 col-sm-4 col-md-4 col-lg-4">Condición de Venta*:</label>
              <select class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control{{ $errors->has('payment_terms') ? ' is-invalid' : '' }}" id="payment_terms" name="payment_terms" data-old="{{ old('payment_terms') }}">
                @foreach($payment_termsArray as $index => $onePayment_termsArray)
                  <option value="{{ $index }}" {{ old('payment_terms') == $onePayment_termsArray ? 'selected' : '' }}>{{ $onePayment_termsArray }}</option>
                @endforeach
              </select>
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
              @if ($errors->has('payment_terms'))
                <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                  <strong style="font-size: 0.7rem;">Debe especificar la condición de venta.</strong>
                </span>
              @endif              
            </div>

            <input type="hidden" name="what_blade" value="{{$origin['what_blade']}}" readonly>
            <input type="hidden" name="what_unit" value="{{$origin['what_unit']}}" readonly>

            <br>

          </div> <!-- end of container -->
        </div> <!-- end of modal body -->

        <br>

        <div class="card-footer row eagle-row" style="background-color: white; border: none">
          <div class="col-3"></div>
          <button class="btn eagle-button col-2" type="submit">Agregar</button>
          <div class="col-2"></div>
          <a type="button" class="btn eagle-button col-2" href="{{ url()->previous() }}">Cancelar</a>
          <div class="col-3"></div>
        </div>

        <hr>

        <div class="eagle-button-container col-12"><b>* Campos Obligatorios</b></div>

        <br>

      </form>




    </div>
  </div>
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