@extends('layouts.app')

@section('title', 'Editar Coti')

@section('content')

@inject('cotiItems', 'App\Services\CotiItems')
@inject('clients', 'App\Services\Clients')
@inject('argCurr', 'App\Services\ArgCurr')
@inject('salesTermsCoti', 'App\Services\SalesTermsCoti')
@inject('regimes', 'App\Services\Regime')
@inject('units', 'App\Services\Units')
@inject('frequencies', 'App\Services\Frequency')
@inject('cotiOps', 'App\Services\CotiOptionals')


<div class="container eagle-container">

  <div class="jumbotron eagle-jumbotron-2">
    <div class="row eagle-row" style="margin: 0; padding: 0 1rem 0 1rem">
      <h1 class="col-10 eagle-h2" style="display: flex; align-items: center; padding: 0">Editar Cotización Nº {{$coti->id}}</h1>
      <div class="eagle-button-container col-2">
        <a class="col-8 btn eagle-button" href="{{ url()->previous() }}">Volver</a>
      </div>
    </div>
  </div>
  

  <div class="row eagle-row" style="font-size: 0.8rem">

    <form class="col-12" style="padding: 0" action="/cotis/update/{{$coti->id}}" method="POST" autocomplete="off" id="formulario">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <section class="col-12 row" style="margin: 0; padding: 0">

        <div class="col-2 sidebar-container"> <!-- 1st column -->

          <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>

          <div class="row eagle-row-clean col-12">
            <label for="client" class="mac-label col-4">Cliente:</label>
            <input class="col-8 form-control mac-form-control" value="{{ $coti->client->legal_name }}" readonly style="font-weight: bold;">
          </div> 

          <div class="row eagle-row-clean col-12">
            <label for="contact" class="mac-label col-4">Contacto:</label>
            <select id="contact" data-old="{{ old('contact_id') }}" name="contact_id" class="col-8 form-control mac-form-control">
              @foreach ($contacts as $oneContact)
                <option value="{{$oneContact->id}}" {{ $coti->contact_id == $oneContact->id ? 'selected' : '' }}>{{$oneContact->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="row eagle-row-clean col-12">
            <label for="address" class="mac-label col-4">Dirección de entrega:</label>
            <select id="address" data-old="{{ old('address_id') }}" name="address_id" class="col-8 form-control mac-form-control" >
              @foreach ($addresses as $oneAddress)
                <option value="{{$oneAddress->id}}" {{ $coti->address_id == $oneAddress->id ? 'selected' : '' }}>{{$oneAddress->line1}}</option>
              @endforeach
            </select>
          </div>

          <hr style="margin: 0.25rem 0"> 

          <div class="row eagle-row-clean col-12">         
            <label class="mac-label col-5">Fecha Cotización:</label> 
            <input type="date" id="date" name="date" class="col-7 form-control mac-form-control" value="{{ $coti->date }}">
              <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                <strong>Ingrese fecha de cotización.</strong>
              </span>                         
          </div>   

          <div class="row eagle-row-clean col-12">         
            <label class="mac-label col-5">Validez [días]:</label> 
            <input id="validez" name="validez" class="col-7 form-control mac-form-control" value="{{ $coti->validez }}"> 
              <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                <strong>Ingrese validez de la cotización.</strong>
              </span>   
          </div>

          <div class="row eagle-row-clean col-12">         
            <label class="mac-label col-5">Entrega:</label> 
            <input type="date" id="delivery_date" name="delivery_date" class="col-7 form-control mac-form-control" value="{{ $coti->delivery_date}}">
            <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
              <strong>Ingrese fecha de entrega.</strong>
            </span> 
          </div>      
          
          <hr style="margin: 0.25rem 0">   

          <div class="row eagle-row-clean col-12">
            <label class="mac-label col-5">Moneda:</label>
            <select id="quote_curr" name="quote_curr" class="col-7 form-control mac-form-control">
              @foreach($argCurr->get() as $index => $curr)            
                <option value="{{ $index }}" {{ $coti->quote_curr == $index ? 'selected' : '' }}>
                  {{ $curr }}
                </option>
              @endforeach          
            </select>
            <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
              <strong>Debe ingresar la moneda de cotización</strong> 
            </span>
          </div>

          <hr style="margin: 0.25rem 0">  

          <div class="row eagle-row-clean col-12">
            <label class="mac-label col-5">Forma de Pago:</label>
            <select id="payment_terms" name="payment_terms" class="col-7 form-control mac-form-control">
              @foreach($salesTermsCoti->get() as $index => $oneSalesTermsCoti)            
                <option value="{{ $index }}" {{ $coti->payment_terms == $index ? 'selected' : '' }}>
                  {{ $oneSalesTermsCoti }}
                </option>
              @endforeach
            </select>
            <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
              <strong>Debe ingresar condiciones de venta</strong>  
            </span>
          </div>

          <div class="row eagle-row-clean col-12">
            <label class="mac-label col-5">Descripción (opcional):</label>
            <input type="text" id="terms_desc" name="terms_desc" class="col-7 form-control mac-form-control" value="{{ $coti->terms_desc }}">       
          </div>

          <hr style="margin: 0.25rem">

          <div class="row eagle-row-clean col-12">
            <label class="mac-label col-4">Obs:</label>
            <input type="text" id="obs" name="obs" class="col-8 form-control mac-form-control" value="{{ $coti->obs }}">       
          </div>
          
        </div> <!-- end of 1st column --> 

        <div class="col-10 right-of-sidebar-container"><!-- 2nd column -->
          <!--div class="row"-->

            <div class="col-12 no-marg no-pad">

              <table class="table" style="font-size: 0.75rem">

                <thead>
                  <tr style="height: 2.5rem; text-align: center; background-color: rgb(186, 202, 211)">
                    <th width=6% class="model_table">Item</th>
                    <th width=6% class="model_table">Cantidad</th>
                    <th width=39% class="model_table">Descripción</th>                    
                    <!--th width=4% class="model_table">Potencia [kVA]</th-->
                    <!--th width=6% class="model_table">Régimen (solo Alq)</th-->                
                    <!--th width=4% class="model_table">Un Tiempo</th-->
                    <th width=6% class="model_table">Días<p class="no-marg no-pad small">Sólo Alq</p></th>
                    <!--th width=6% class="model_table">Frecuencia (solo Serv)</th-->
                    <th width=6% class="model_table">Precio Lista</th>
                    <th width=6% class="model_table">Precio Of</th>
                    <th width=6% class="model_table">IVA [%]</th>
                    <th width=6% class="model_table">Precio Inc. IVA</th>
                    <th width=2% class="model_table"><a href="#" class="addRow"><i class="fas fa-plus-square"></i></a></th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($cotiDets as $cotiDet)
                  <tr>

                    <td class="eagle-td">
                      <select name="item[]" class="form-control mac-form-control item">
                        @foreach($cotiItems->get() as $index => $cotiItem)            
                          <option value="{{ $index }}" {{ $cotiDet->item == $index ? 'selected' : '' }}>{{ $cotiItem }}</option>
                        @endforeach
                      </select>
                      <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                        <strong>Debe seleccionar ítem</strong>
                      </span>
                    </td>

                    <td class="eagle-td">
                      <input name="cant[]" class="form-control mac-form-control-right cant" value = "{{ $cotiDet->cant }}">
                      <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                        <strong>Ingrese cantidad</strong>
                      </span>   
                    </td>

                    <td class="eagle-td">
                      <textarea rows="3" name="desc[]" class="form-control mac-form-control desc" style="resize: vertical; min-height: 50px">{{ $cotiDet->description }}</textarea>
                      <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                        <strong>Incluya una descripción</strong>
                      </span> 
                    </td>

                    <td class="eagle-td">
                      <input name="days[]" class="form-control mac-form-control-right days" value = "{{ $cotiDet->days }}">
                      <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                        <strong>Ingrese días</strong>
                      </span>   
                    </td>                   

                    <td class="eagle-td">
                      <input name="list_price[]" class="form-control mac-form-control-right list_price" value="{{ $cotiDet->list_price }}"> 
                    </td>

                    <td class="eagle-td">
                      <input name="of_price[]" class="form-control mac-form-control-right of_price" value="{{ $cotiDet->of_price }}">
                      <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                        <strong>Debe especificar el precio ofrecido</strong>
                      </span> 
                    </td>

                    <td class="eagle-td">
                      <select id="vat_rate" name="vat_rate[]" class="form-control mac-form-control vat_rate">
                        <option value="">Sel</option>
                        <!--option value=27 {{ $cotiDet->vat_rate == 27 ? 'selected' : '' }}>27.0</option-->
                        <option value=21 {{ $cotiDet->vat_rate == 21 ? 'selected' : '' }}>21.0</option>
                        <!--option value=10.5 {{ $cotiDet->vat_rate == 10.5 ? 'selected' : '' }}>10.5</option>
                        <option value=5 {{ $cotiDet->vat_rate == 5 ? 'selected' : '' }}>5.0</option>
                        <option value=2.5 {{ $cotiDet->vat_rate == 2.5 ? 'selected' : '' }}>2.5</option-->
                        <option value=0 {{ $cotiDet->vat_rate == 0 ? 'selected' : '' }}>0.0</option>
                      </select>
                    </td>   

                    <td class="eagle-td">
                      <input name="of_price_plus_IVA[]" class="of_price_plus_IVA" value="{{$cotiDet->of_price_plus_IVA}}" hidden>
                      <input class="form-control mac-form-control-right of_price_plus_IVA_form" value="{{ $cotiDet->of_price_plus_IVA }}">
                    </td>

                    <td style="text-align: center"><a href="#" class="remove"><i class="fas fa-minus-square"></a></td>

                  </tr>   
                  @endforeach               
                </tbody>

              </table>

            </div><!-- end of table container -->        

          <!--/div--><!-- end of row -->

        </div><!--end 2nd column-->

        <div class="col-12 bordered-container row no-marg" style="margin-top: 0.25rem;"><!--3rd column-->
          <div class="col-12 row no-marg">
            <div class="col-12"><b>INCLUYE:</b></div>

            <div class="col-1" style="display: flex; justify-content: flex-end">
              <input class="chbx" type="checkbox" name="op1" id="op1" {{$coti->op1 === 1 ? 'checked' : ''}}>
            </div>
            <div class="col-2" style="display: flex; justify-content: flex-start; align-items: center ;">
              <label style="margin: 0">{{$cotiOps->show('1')}}</label>
            </div>

            <div class="col-1" style="display: flex; justify-content: flex-end">
              <input class="chbx" type="checkbox" name="op2" id="op2" {{$coti->op2 === 1 ? 'checked' : ''}}>
            </div>
            <div class="col-2" style="display: flex; justify-content: flex-start; align-items: center ;">
              <label style="margin: 0">{{$cotiOps->show('2')}}</label>
            </div>

            <div class="col-1" style="display: flex; justify-content: flex-end">
              <input class="chbx" type="checkbox" name="op3" id="op3" {{$coti->op3 === 1 ? 'checked' : ''}}>
            </div>
            <div class="col-2" style="display: flex; justify-content: flex-start; align-items: center ;">
              <label style="margin: 0">{{$cotiOps->show('3')}}</label>
            </div>

            <div class="col-1" style="display: flex; justify-content: flex-end">
              <input class="chbx" type="checkbox" name="op4" id="op4" {{$coti->op4 === 1 ? 'checked' : ''}}>
            </div>
            <div class="col-2" style="display: flex; justify-content: flex-start; align-items: center ;">
              <label style="margin: 0">{{$cotiOps->show('4')}}</label>
            </div>

          </div>
          

        </div>

        <div class="mac-button-container col-10">
        </div>

        <div class="mac-button-container col-2">          
          <button class="col-8 btn eagle-button" type="submit">Guardar</button>
        </div>    
  
      </section>
    </form>

  </div> <!-- end of row -->

</div> <!-- end container -->

@endsection

@section('script')

  <script>

    $(document).ready(function(){
//------------------------------------------------------------------------------
      function loadContact() {
          var client_id = $('#client').val();
          var cont = $('#cont').val();

          if ($.trim(client_id) != '') {
              $.get('/rentals/contacts', {client_id: client_id}, function (contacts) {

                  var old = $('#contact').data('old') != '' ? $('#contact').data('old') : '';

                  $('#contact').empty();
                  $('#contact').append("<option value=''>Seleccione Contacto</option>");

                  if ($.trim(cont) != '') {
                    $.each(contacts, function (index, value) {
                      $('#contact').append("<option value='" + index + "'" + (cont == index ? 'selected' : '') + ">" + value +"</option>");
                    })
                  } else {
                    $.each(contacts, function (index, value) {
                      $('#contact').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                    })
                  }
              });
          }
      }
      loadContact();
      $('#client').on('change', loadContact);
//------------------------------------------------------------------------------
      function loadAddress() {
          var client_id = $('#client').val();
          var addr = $('#addr').val();

          if ($.trim(client_id) != '') {
              $.get('/rentals/addresses', {client_id: client_id}, function (addresses) {

                  var old = $('#address').data('old') != '' ? $('#address').data('old') : '';

                  $('#address').empty();
                  $('#address').append("<option value=''>Seleccione Dirección</option>");

                  if ($.trim(addr) != '') {
                    $.each(addresses, function (index, value) {
                      $('#address').append("<option value='" + index + "'" + (addr == index ? 'selected' : '') + ">" + value +"</option>");
                    })
                  } else {
                    $.each(addresses, function (index, value) {
                      $('#address').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                    })
                  }
              });
          }
      }
      loadAddress();
      $('#client').on('change', loadAddress);

//------------------------------------------------------------------------------

    

//------------------------------------------------------------------------------

   
    
//------------------------------------------------------------------------------
    });// end of document ready function

// -----------------------------------------------------------------------------

     $('tbody').on('change', '.of_price, .vat_rate', 
      function() {       

        var tr = $(this).parent().parent();
        
        //Calc set 1:
        //get variables:
        var of_price = tr.find('.of_price').val();
        var vat_rate = tr.find('.vat_rate').val();
        //console.log(invoice_currency);
        //console.log(quote_currency);

        //calculations:    
        var of_price_plus_IVA = of_price * (1 + vat_rate / 100);

        //send calculated values to inputs:
        tr.find('.of_price_plus_IVA').val(of_price_plus_IVA);

        //show formatted values in HTML:  
        var of_price_plus_IVA_form = new Number(of_price_plus_IVA).toLocaleString("es-ES", {maximumFractionDigits: 2, minimumFractionDigits: 2});
        tr.find('.of_price_plus_IVA_form').val(of_price_plus_IVA_form);

    });  
// -----------------------------------------------------------------------------

    var prices = document.querySelectorAll(".price")
    prices.forEach(function(price){
      price.innerText = Number(price.innerText).toFixed(0)
      price.innerText = Number(price.innerText).toLocaleString("es-ES")
    });

    var onedecs = document.querySelectorAll(".onedec")
    onedecs.forEach(function(onedec){
        onedec.innerText = Number(onedec.innerText).toLocaleString("es-ES",{ maximumFractionDigits: 1, minimumFractionDigits: 1})
    });

// Validaciones --------------------------------------------------------------------------------------------

    $("#formulario").on('submit', function(event) {
     event.preventDefault();

      var pass = true;

      $(".is-invalid").each(function(index, el) {
        $(this).removeClass('is-invalid');
      });

      $(".invalid-feedback").each(function(index, el) {
        $(this).addClass('d-none');
      });

      if(!$("#date").val()) {
        $("#date").addClass('is-invalid');
        $("#date").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }

      if(!$("#quote_curr").val()) {
        $("#quote_curr").addClass('is-invalid');
        $("#quote_curr").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }

      if(!$("#validez").val()) {
        $("#validez").addClass('is-invalid');
        $("#validez").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }

      if(!$("#delivery_date").val()) {
        $("#delivery_date").addClass('is-invalid');
        $("#delivery_date").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }      

      if(!$("#payment_terms").val()) {
        $("#payment_terms").addClass('is-invalid');
        $("#payment_terms").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }

      $(".item").each(function(index, el) {
        if (!$(this).val()) {
          $(this).addClass('is-invalid');
          $(this).parent().find('.invalid-feedback').removeClass('d-none');
          pass = false;
        }         
      });

      $(".desc").each(function(index, el) {
        if (!$(this).val()) {
          $(this).addClass('is-invalid');
          $(this).parent().find('.invalid-feedback').removeClass('d-none');
          pass = false;
        }         
      });

      $(".cant").each(function(index, el) {
        if (!$(this).val()) {
          $(this).addClass('is-invalid');
          $(this).parent().find('.invalid-feedback').removeClass('d-none');
          pass = false;
        }         
      });

      $(".of_price").each(function(index, el) {
        if (!$(this).val()) {
          $(this).addClass('is-invalid');
          $(this).parent().find('.invalid-feedback').removeClass('d-none');
          pass = false;
        }         
      });  

      if (pass) {
        $(this).off('submit');
        $(this).submit();
      }

    });

// ---------------------------------------------------------------------------------------------

$('.addRow').on('click', function(){
      addRow();
    });
    function addRow(){
      var tr = '<tr>'+
        '<td class="eagle-td"><select name="item[]" class="form-control mac-form-control item">@foreach($cotiItems->get() as $index => $cotiItem)<option value="{{ $index }}">{{ $cotiItem }}</option>@endforeach</select><span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0"><strong>Debe seleccionar ítem</strong></span></td>'+
        '<td class="eagle-td"><input name="cant[]" class="form-control mac-form-control-right cant"><span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0"><strong>Ingrese cantidad</strong></span></td>'+
        '<td class="eagle-td"><textarea rows="3" name="desc[]" class="form-control mac-form-control desc" style="resize: vertical; min-height: 50px"></textarea><span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0"><strong>Incluya una descripción</strong></span></td>'+
        '<td class="eagle-td"><input name="days[]" class="form-control mac-form-control-right days"><span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0"><strong>Ingrese días</strong></span></td>'+
        '<td class="eagle-td"><input name="list_price[]" class="form-control mac-form-control-right list_price"></td>'+
        '<td class="eagle-td"><input name="of_price[]" class="form-control mac-form-control-right of_price"><span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0"><strong>Debe especificar el precio ofrecido</strong></span></td>'+
        '<td class="eagle-td"><select id="vat_rate" name="vat_rate[]" class="form-control mac-form-control vat_rate"><option value="">Sel</option><option value=21>21.0</option><option value=0>0.0</option></select></td>'+
        '<td class="eagle-td"><input name="of_price_plus_IVA[]" class="of_price_plus_IVA"value="{{$cotiDet->of_price_plus_IVA}}" hidden><input class="form-control mac-form-control-right of_price_plus_IVA_form"></td>'+
        '<td style="text-align: center"><a href="#" class="remove"><i class="fas fa-minus-square"></a></td>'+
        '</tr>';
      $('tbody:first').append(tr);
    };
// -------------------------------------------------------------------------------------------
    $(document).on('click', '.remove', function(){
      var last=$('tbody tr').length;
      if(last==1){
        alert("La cotización debe contener al menos una fila.");
      } else {
        $(this).closest("tr").remove();
      };
    });
// -------------------------------------------------------------------------------------------   

  </script>

@endsection
