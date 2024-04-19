@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

@inject('industries', 'App\Services\Industries')
@inject('countries', 'App\Services\Countries')

<div class="container eagle-container">

  <div class="jumbotron mac-jumbotron">    
    <h4 class="col-4 col-sm-4 col-md-8 col-lg-8 col-xl-8 eagle-h4">Clientes</h4>
  </div> <!-- end of junbotron -->

  <div class="row eagle-row-clean fixed-row">

    <div class="col-2 sidebar-container"> <!-- 1st column -->

      <div class="mac-button-container">
        <a type="button" class="btn eagle-button col-8" href="/clients/create">Nuevo</a>
      </div>

      <hr>      

      <form action="{{ route('clients.index')}}">                  

          <div class="row eagle-row-clean col-12">
            <div class="col-4 mac-label"><b>Buscar:</b></div>
            <input class="col-8 mac-form-control" type="search" name="q" value="{{ $q }}" placeholder="Ingresar primeras letras">
          </div>

          <br>

          <div class="row eagle-row-clean col-12">
            <div class="col-4 mac-label"><b>Filtrar por:</b></div>
            <select name="countryFilter" class="col-8 mac-form-control" value="{{ $countryFilter }}">
              @foreach($countries->get() as $key => $col)
                <option @if($key == $countryFilter) selected @endif value="{{ $key }}">{{ $col }}</option>
              @endforeach
            </select>
          </div>

          <div class="row eagle-row-clean col-12">
            <div class="col-4 mac-label"><b>o por:</b></div>
            <select name="industryFilter" class="col-8 mac-form-control" value="{{ $industryFilter }}">
              @foreach($industries->get() as $key => $col)
                <option @if($key == $industryFilter) selected @endif value="{{ $key }}">{{ $col }}</option>
              @endforeach
            </select>
          </div>

          <br>

          <div class="row eagle-row-clean col-12">
            <div class="col-4 mac-label"><b>Ordenar por:</b></div>
            <select name="sortBy" class="col-8 mac-form-control" value="{{ $sortBy }}">
              @foreach($sortFieldsArray as $key => $col)
                <option @if($key == $sortBy) selected @endif value="{{ $key }}">{{ $col }}</option>
              @endforeach
            </select>
          </div>

          <div class="row eagle-row-clean col-12">
            <div class="col-4 mac-label"><b>de manera:</b></div>
            <select name="orderBy" class="col-8 mac-form-control" value="{{ $orderBy }}">
              @foreach(['asc', 'desc'] as $order)
                <option @if($order == $orderBy) selected @endif value="{{ $order }}">{{ ucfirst($order) }}</option>
              @endforeach
            </select>
          </div>

          <div class="mac-button-container col-12">
            <button type="submit" class="btn eagle-button col-8">Filtrar/ Ordenar</button>
          </div>
        
      </form>     

      <hr>

      <form action="{{ route('clients.index')}}">          
        <div class="mac-button-container col-12">
          <button type="submit" class="btn eagle-button col-8">Quitar Filtros</button>
        </div>                    
      </form>

    </div> <!-- end of 1st column -->  
     

    <div class="col-10 table-container"> <!-- 2nd column -->
      <table class="table mac-table">

        <thead>
          <tr style="text-align: center">
            <th width=3% class="model_table">ID</th>
            <th width=10% class="model_table">País</th>
            <th width=36% class="model_table">Razón Social</th>
            <th width=25% class="model_table">Nombre Comercial</th>
            <th width=10% class="model_table">Industria/Rubro</th>
            <th width=5% class="model_table">Tipo ID</th>
            <th width=11% class="model_table">Num</th>

          </tr>
        </thead>

        @if($countryFilter === null)
          <tbody>
            @foreach($clients as $oneClient)
                <tr>
                  <td width=3% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->id}}</a></td>
                  <td width=10% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->country->value}}</a></td>
                  <td width=36% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->legal_name}}</a></td>
                  <td width=25% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->commercial_name}}</a></td>
                  <td width=10% class="model_table">
                    @if ($oneClient->industry_id === null || $oneClient->industry_id === "")
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">--</a>
                    @else
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->industry->value}}</a>
                    @endif
                  </td>
                  <td width=5% class="model_table">
                    @if($oneClient->cuit_type === 1)
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">CUIT</a>
                    @elseif($oneClient->cuit_type === 2)
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">CUIL</a>
                    @elseif($oneClient->cuit_type === 3)
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">RUT</a>
                    @endif
                  </td>
                  <td width=11% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->cuit_num}}</a></td>
                </tr>
            @endforeach
          </tbody>
        @else
          <tbody>
            @foreach($clients as $oneClient)
              @if(isset($oneClient->country))
                <tr>
                  <td width=3% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->id}}</a></td>
                  <td width=10% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->country->value}}</a></td>
                  <td width=36% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->legal_name}}</a></td>
                  <td width=25% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->commercial_name}}</a></td>
                  <td width=10% class="model_table">
                    @if ($oneClient->industry_id === null || $oneClient->industry_id === "")
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">--</a>
                    @else
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->industry->value}}</a>
                    @endif
                  </td>
                  <td width=5% class="model_table">
                    @if($oneClient->cuit_type === 1)
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">CUIT</a>
                    @elseif($oneClient->cuit_type === 2)
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">CUIL</a>
                    @elseif($oneClient->cuit_type === 3)
                      <a class="eagle-link" href="/clients/{{$oneClient->id}}">RUT</a>
                    @endif
                  </td>
                  <td width=11% class="model_table"><a class="eagle-link" href="/clients/{{$oneClient->id}}">{{$oneClient->cuit_num}}</a></td>
                </tr>
              @endif  
            @endforeach
          </tbody>
        @endif

      </table>
      
    </div> <!-- end of 2nd column -->

  </div> <!--end of main row -->



<!-- add client modal -->
<div class="modal" id="modalAddClient">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header eagle-modal-header">
        <h4 class="modal-title">Agregar Cliente</h4>
      </div>

      <form method="POST" action="{{ route('clients.store') }}" autocomplete="off">
        {{csrf_field()}}

        <div class="modal-body modal-form">
          <div class="container-fluid eagle-container">

            <div class="form-group row eagle-row-flex">
              <label for="legal_name" class="col-form-label form-label-modal col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">Razón Social*:</label>
              <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control form-control-modal{{ $errors->has('legal_name') ? ' is-invalid' : '' }}" id="legal_name" name="legal_name" value="{{ old('legal_name') }}">
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
              @if ($errors->has('legal_name'))
                <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                  <strong>Debe especificar la razón social del cliente.</strong>
                </span>
                <script>
                  $(document).ready(function(){
                    $('#modalAddClient').modal({show: true});
                  });
                </script>
              @endif
            </div>

            <div class="form-group row eagle-row-flex">
              <label for="commercial_name" class="col-form-label form-label-modal col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">Nombre Comercial:</label>
              <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control form-control-modal" id="commercial_name" name="commercial_name" value="{{ old('commercial_name') }}">
            </div>

            <div class="form-group row eagle-row-flex">
              <label for="industry" class="col-form-label form-label-modal col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">Rubro / Industria*:</label>
              <select class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control form-control-modal{{ $errors->has('industry_id') ? ' is-invalid' : '' }}" id="industry_id" name="industry_id">
                @foreach($industries->get() as $index => $industry)
                  <option value="{{ $index }}" {{ old('industry_id') == $index ? 'selected' : '' }}>{{ $industry }}</option>
                @endforeach
              </select>
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
              @if ($errors->has('industry_id'))
                <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                  <strong>Debe especificar el rubro del cliente.</strong>
                </span>
                <script>
                  $(document).ready(function(){
                    $('#modalAddClient').modal({show: true});
                  });
                </script>
              @endif
            </div>

            <div class="form-group row eagle-row-flex">
              <label for="cuit_num" class="col-form-label form-label-modal col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">CUIT/RUT*:</label>
              <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control form-control-modal{{ $errors->has('cuit_num') ? ' is-invalid' : '' }}" id="cuit_num" name="cuit_num" value="{{ old('cuit_num') }}">
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                @if ($errors->has('cuit_num'))
                  <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                    <strong>Debe especificar el CUIT del cliente y no debe estar repetido.</strong>
                  </span>
                  <script>
                    $(document).ready(function(){
                      $('#modalAddClient').modal({show: true});
                    });
                  </script>
                @endif
            </div>

            <div class="form-group row eagle-row-flex">
              <label for="vat_status" class="col-form-label form-label-modal col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">Condición frente al IVA*:</label>
              <select class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control form-control-modal{{ $errors->has('vat_status') ? ' is-invalid' : '' }}" id="vat_status" name="vat_status" data-old="{{ old('vat_status') }}">
                @foreach($vatArray as $index => $oneVatArray)
                  <option value="{{ $index }}" {{ old('vat_status') == $oneVatArray ? 'selected' : '' }}>{{ $oneVatArray }}</option>
                @endforeach
              </select>
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
              @if ($errors->has('vat_status'))
                <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                  <strong>Debe especificar la condición frente al IVA del cliente.</strong>
                </span>
                <script>
                  $(document).ready(function(){
                    $('#modalAddClient').modal({show: true});
                  });
                </script>
              @endif                    
            </div>

            <div class="form-group row eagle-row-flex">
              <label for="sales_tax_rate" class="col-form-label form-label-modal col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">Perc. IIBB [%]*:</label>
              <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control form-control-modal{{ $errors->has('sales_tax_rate') ? ' is-invalid' : '' }}" id="sales_tax_rate" name="sales_tax_rate" value="{{ old('sales_tax_rate') }}">
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                @if ($errors->has('sales_tax_rate'))
                  <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                    <strong>Debe especificar alícuota de IIBB.</strong>
                  </span>
                  <script>
                    $(document).ready(function(){
                      $('#modalAddClient').modal({show: true});
                    });
                  </script>
                @endif
            </div>

            <div class="form-group row eagle-row-flex">
              <label for="payment_terms" class="col-form-label form-label-modal col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">Condición de Venta*:</label>
              <select class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control form-control-modal{{ $errors->has('payment_terms') ? ' is-invalid' : '' }}" id="payment_terms" name="payment_terms" data-old="{{ old('payment_terms') }}">
                @foreach($payment_termsArray as $index => $onePayment_termsArray)
                  <option value="{{ $index }}" {{ old('payment_terms') == $onePayment_termsArray ? 'selected' : '' }}>{{ $onePayment_termsArray }}</option>
                @endforeach
              </select>
              <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
              @if ($errors->has('payment_terms'))
                <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                  <strong>Debe especificar la condición de venta.</strong>
                </span>
                <script>
                  $(document).ready(function(){
                    $('#modalAddClient').modal({show: true});
                  });
                </script>
              @endif              
            </div>

          </div> <!-- end of container -->
        </div> <!-- end of modal body -->

        <div class="modal-footer">
          <div class="col-8" style="text-align: center;"><b>* Campos Obligatorios</b></div>
          <button class="btn eagle-button col-2" type="submit">Agregar</button>
          <button type="button" class="btn eagle-button col-2" data-dismiss="modal">Cancelar</button>
        </div>

      </form>

    </div>
  </div>
</div> <!-- end of modal -->

</div> <!-- end container -->

@endsection
