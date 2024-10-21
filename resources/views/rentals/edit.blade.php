@extends('layouts.app')

@section('title', 'Editar Alquiler')

@section('content')

    @inject('families', 'App\Services\Family')
    @inject('families', 'App\Services\Subfamily')
    @inject('brands', 'App\Services\Brand')
    @inject('clients', 'App\Services\Clients')

<div class="container eagle-container">

  <div class="jumbotron eagle-jumbotron-2">
    <div class="row eagle-row" style="margin: 0; padding: 0 1rem 0 1rem">
      <h1 class="col-11 eagle-h2" style="display: flex; align-items: center; padding: 0">Editar Alquiler Nº {{$rental->id}}</h1>
      <div class="mac-button-container col-1">
        <a class="col-12 btn eagle-button" href="{{ url()->previous() }}">Volver</a>
      </div>
    </div>
  </div>

  <br>

  <form class="col-12 rental-form" method="POST" action="/rentals/update/{{$rental->id}}" autocomplete="off" id="formulario">
    {{method_field('PUT')}}
    {{csrf_field()}}

    <div class="row rental-row"> <!-- start of form row -->

      <div class="col-3">

        <div class="form-group row" style="display: none">
          <input id="rental_type" name="rental_type" value="{{$rental->rental_type}}">
          <input id="previous_rental_id" name="previous_rental_id" value="{{$rental->previous_rental_id}}">
          <input id="user_id" name="user_id" value="{{auth()->user()->id}}">
          <input id="unit_model_id_bis" name="unit_model_id_bis" value="{{$rental->unit_model_id}}">

        </div>

        <div class="row eagle-row-clean col-12">
          <label for="client" class="mac-label-left col-4">Cliente:</label>
          <select id="client" name="client_id" class="col-8 form-control mac-form-control">
            @foreach($clients->get() as $index => $client)
              <option value="{{ $rental->client_id }}" {{ $rental->client_id == $index ? 'selected' : '' }}>
                {{ $client }}
              </option>
            @endforeach
          </select>
          <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
            <strong>Seleccione un cliente.</strong>
          </span>
        </div>

        <div class="row eagle-row-clean col-12">
          <label for="contact" class="mac-label-left col-4">Contacto:</label>
          <select id="contact" data-old="{{ old('contact_id') }}" name="contact_id" class="col-8 form-control mac-form-control{{ $errors->has('contact_id') ? ' is-invalid' : '' }}">
            @foreach ($contacts as $oneContact)
              <option value="{{$oneContact->id}}" {{ $rental->contact_id == $oneContact->id ? 'selected' : '' }}>{{$oneContact->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="row eagle-row-clean col-12">
          <label for="address" class="mac-label-left col-4">Dirección de entrega:</label>
          <select id="address" data-old="{{ old('address_id') }}" name="address_id" class="col-8 form-control mac-form-control{{ $errors->has('address_id') ? ' is-invalid' : '' }}">
            @foreach ($addresses as $oneAddress)
              <option value="{{$oneAddress->id}}" {{ $rental->address_id == $oneAddress->id ? 'selected' : '' }}>{{$oneAddress->line1}}</option>
            @endforeach
          </select>
        </div>

        <br>
        <hr>
        <br>

        <div class="row eagle-row-clean col-12">
          <label for="address" class="mac-label-left col-4">Comentarios:</label>
          <textarea id="aux" type="text" name="aux" class="col-8 form-control mac-form-control textarea-desc" value="{{old('aux')}}">{{$rental->aux}}</textarea>
        </div>

      </div> <!-- end of 1st column -->

      <div class="col-3"> <!-- 2nd column -->

          <div class="row eagle-row-clean col-12">
            <label for="family" class="mac-label-left col-4">Familia:</label>
            <select id="family" name="family_id" class="col-8 form-control mac-form-control">
              @foreach($families->get() as $index => $family)
                <option value="{{ $index }}" {{ $rental->unitModel->family_id == $index ? 'selected' : '' }}>
                  {{ $family }}
                </option>
              @endforeach
            </select>
            <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
              <strong>Seleccione una familia</strong>
            </span>
          </div>

          <div class="row eagle-row-clean col-12">
            <label for="unit_model" class="mac-label-left col-4">Modelo:</label>
            <select id="unit_model" name="unit_model_id" class="col-8 form-control mac-form-control"></select>
              <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                <strong>Seleccione un modelo</strong>
              </span>
          </div>



          <br>

          <div class="row eagle-row-clean col-12">

            <div class="row eagle-row-clean col-6">
              <label for="available" class="mac-label-left col-6">Disponibles:</label>
              <input id="available" type="text" name="available" class="mac-form-control-readonly col-4" style="text-align: center;" value="{{$availableUnits}}" readonly>
              <div class="col-2"></div>
            </div>

            <div class="row eagle-row-clean col-6">
              <label for="quantity" class="mac-label-left col-6">Cantidad:</label>
              <input id="quantity" type="text" name="quantity" class="form-control mac-form-control col-4" value="{{$rental->quantity}}"> 
              <div class="col-2"></div>
              <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                <strong>Ingrese la cantidad de unidades</strong>
              </span>
            </div> 

          </div>

          <div class="row eagle-row-clean col-12">

            <div class="row eagle-row-clean col-6">
              <label for="days" class="mac-label-left col-6">Días:</label>
              <input id="days" type="text" name="days" class="form-control mac-form-control col-4" value="{{$rental->days}}">
              <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
                <strong>Ingrese la cantidad de días</strong>
              </span>
            </div>

            <div class="row eagle-row-clean col-6">
              <label for="period" class="mac-label-left col-6">Tarifa:</label>
              <input id="period" type="text" name="period" class="mac-form-control-readonly col-4" style="text-align: center;"readonly>
            </div>
          </div>

          <br>

          <div class="row eagle-row-clean col-12">
            <label for="start_date" class="mac-label-left col-6">Fecha Inicio:</label>
            <input id="start_date" type="date" name="start_date" class="form-control mac-form-control col-5" value="{{$rental->start_date}}">
            <span class="col-12 invalid-feedback d-none text-center" role="alert" style="padding: 0">
              <strong>Ingrese fecha de inicio</strong>
            </span>
          </div>

          <div class="row eagle-row-clean col-12">
            <label for="end_date" class="mac-label-left col-6">Fecha Final:</label>
            <input id="end_date" type="date" name="end_date" class="mac-form-control-readonly col-5" readonly>
          </div>



        </div> <!-- end of 2nd column -->


        <div class="col-5"> <!-- 3rd column -->

          <div class="form-group row">
            <div class="col-md-3 mac-label-center">Tarifas</div>
            <label for="list_price" class="col-md-3 mac-label-center">Diaria</label>
            <label for="list_price" class="col-md-3 mac-label-center">Semanal</label>
            <label for="list_price" class="col-md-3 mac-label-center">Mensual</label>
          </div>

          <div class="row eagle-row-clean col-12">
            <label class="col-md-3 mac-label-right">Precios de Lista [pesos]:</label>
              <input id="price_1" name="price_1" class="mac-form-control-readonly col-md-3 listprice" style="text-align: center;" readonly value="{{$rental->price_1}}">
              <input id="price_7" name="price_7" class="mac-form-control-readonly col-md-3 listprice" style="text-align: center;" readonly value="{{$rental->price_7}}">
              <input id="price_30" name="price_30" class="mac-form-control-readonly col-md-3 listprice" style="text-align: center;" readonly value="{{$rental->price_30}}">
          </div>

          <br>
          <hr>
          <br>

          <div class="form-group row">
            <div class="col-md-4"></div>
            <label class="col-md-2 mac-label-center">Precio Lista</label>
            <label class="col-md-2 mac-label-center">Precio Ofrecido</label>
            <label class="col-md-2 mac-label-center">Bonificación %</label>
            <label class="col-md-2 mac-label-center">Precio Neto</label>
          </div>
          <div class="form-group row">
            <label class="col-md-4 mac-label-right">Alquiler:</label>
            <input id="rental_list_price" type="text" name="rental_list_price" class="form-control col-md-2 rental-price" value="{{$rental->rental_list_price}}" readonly>

            <div class="col-md-2" style="margin: 0; padding: 0">
              <input id="rental_offered_price" type="text" name="rental_offered_price" class="form-control col-md-12 price  rental-price" value="{{$rental->rental_offered_price}}">
              <span class="invalid-feedback d-none text-center" role="alert" style="padding: 0">
                <strong>Debe ingresar el precio acordado</strong>
              </span> 
            </div>

            <input id="discount_offered_price" type="text" name="discount_offered_price" class="form-control col-md-2 discount" value="{{$rental->discount_offered_price}}">           
            <input id="net_rental_price" type="text" name="net_rental_price" class="form-control col-md-2 price rental-price" value="{{$rental->net_rental_price}}" readonly>
          </div>

          <div class="form-group row">
            <label class="col-md-4 mac-label-right">Transporte:</label>
            <div class="col-md-2"></div>

            <div class="col-md-2" style="margin: 0; padding: 0">
              <input id="transport_offered_price" type="text" name="transport_offered_price" class="form-control col-md-12 price rental-price" value="{{$rental->transport_offered_price}}">
              <span class="invalid-feedback d-none text-center" role="alert" style="padding: 0">
                <strong>Debe ingresar el precio acordado</strong>
              </span>
            </div>

            <input id="discount_transport_price" type="text" name="discount_transport_price" class="form-control col-md-2 discount" value="{{$rental->discount_transport_price}}">
            <input id="net_transport_price" type="text" name="net_transport_price" class="form-control col-md-2 price rental-price" value="{{$rental->net_transport_price}}" readonly>
          </div>
          <div class="form-group row">
            <label class="col-md-4 mac-label-right">Otros:</label>
            <input id="other" type="text" name="other" class="form-control col-6" style="font-size: 0.7rem; text-align: left;" value="{{$rental->other}}">
            <input id="other_price" type="text" name="other_price" class="form-control col-md-2 price rental-price" value="{{$rental->other_price}}">
          </div>

          <div class="form-group row">
            <label class="col-md-4 mac-label-right">Total:</label>
            <div class="col-md-2"></div>
            <input id="gross_offered_price" type="text" name="gross_offered_price" class="form-control col-md-2 price rental-price" value="{{$rental->gross_offered_price}}" readonly>
            <input id="net_discount" type="text" name="net_discount" class="form-control col-md-2 price rental-price" value="{{$rental->rental}}"  readonly>
            <input id="net_offered_price" type="text" name="net_offered_price" class="form-control col-md-2 price rental-price" value="{{$rental->net_offered_price}}" readonly>
          </div>

        </div> <!-- end of 3rd column -->

    </div> <!-- end of form row -->

    <div class="modal-footer">
      <button class="btn eagle-button" type="submit">Actualizar</button>
      <a class="btn eagle-button" style="display: flex; flex-direction: column; justify-content: center; text-align: center;" href="{{URL::previous()}}">Cancelar</a>
    </div>

  </form>
</div> <!-- end of container -->

@endsection

@section('script')

<script>
  $(document).ready(function(){
//------------------------------------------------------------------------------
      function loadUnitModels() {
        var family_id = $('#family').val();
        var unit_model_id_bis = $('#unit_model_id_bis').val();

        if ($.trim(family_id) != '' ) {
          $.get('/rentals/unit_models', {family_id: family_id}, function(unit_models) {

            var old = $('#unit_model').data('old') != '' ? $('#unit_model').data('old') : '';

            $('#unit_model').empty();
            $('#unit_model').append("<option value=''>Seleccione Modelo:</option>");

            $.each(unit_models, function (index, value) {
                $('#unit_model').append("<option value='" + index + "'" + (unit_model_id_bis == index ? 'selected' : '') + ">" + value +"</option>");
              })
          });
        }
      }
      loadUnitModels();
      $('#family').on('change', loadUnitModels);
//------------------------------------------------------------------------------
     
// -----------------------------------------------------------------------------
      function availableUnits() {
        var unit_model_id = $('#unit_model').val();

        if ($.trim(unit_model_id) != '') {
          $.get('/rentals/availableUnits', {unit_model_id: unit_model_id}, function(availableUnits) {
            $('#available').val(availableUnits);
          });
        }

      }
      availableUnits();
      $('#unit_model').on('change', availableUnits);
//------------------------------------------------------------------------------
      function loadContact() {
          var client_id = $('#client').val();
          if ($.trim(client_id) != '') {
              $.get('contacts', {client_id: client_id}, function (contacts) {

                  var old = $('#contact').data('old') != '' ? $('#contact').data('old') : '';

                  $('#contact').empty();
                  $('#contact').append("<option value=''>Seleccione Contacto</option>");

                  $.each(contacts, function (index, value) {
                      $('#contact').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              });
          }
      }
      loadContact();
      $('#client').on('change', loadContact);
//------------------------------------------------------------------------------
      function loadAddress() {
          var client_id = $('#client').val();
          if ($.trim(client_id) != '') {
              $.get('addresses', {client_id: client_id}, function (addresses) {

                  var old = $('#address').data('old') != '' ? $('#address').data('old') : '';

                  $('#address').empty();
                  $('#address').append("<option value=''>Seleccione Dirección</option>");

                  $.each(addresses, function (index, value) {
                      $('#address').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              });
          }
      }
      loadAddress();
      $('#client').on('change', loadAddress);
//------------------------------------------------------------------------------
}); // end of document ready function
//------------------------------------------------------------------------------
   function loadPrices() {
        var unit_model_id = $('#unit_model').val();
        var days = document.getElementById("days").value;
        var quantity = document.getElementById("quantity").value;
        
        if ($.trim(unit_model_id) != '' && $.trim(days) != '' && $.trim(quantity) != '') {
          $.get('/rentals/prices', {unit_model_id: unit_model_id}, function(prices) {
            var pri = prices["0"]; // arrays within array
            var a = pri["price_1"];
            var b = pri["price_7"];
            var c = pri["price_30"];            
            var aint = parseInt(a); //converts to value
            var bint = parseInt(b);
            var cint = parseInt(c);           
        

        if (days<=2) {
          var period = "Diaria";
          var rental_list_price = aint * days * quantity;
        } else if(days>2 && days<=7) {
          var period = "Semanal";
          var rental_list_price = bint * quantity;
        } else if(days>7 && days<=20) {
          var period = "Semanal";
          var temp = parseInt(days/7);
          var temp2 = days%7;
          var rental_list_price = ( bint * temp + bint * temp2/7 ) * quantity;
        } else if(days>20 && days<=30) {
          var period = "Mensual";
          var rental_list_price = cint * quantity;
        } else if(days>30) {
          var period = "Mensual";
          var temp3 = parseInt(days/30);
          var temp4 = days%30;
          var rental_list_price = (cint * temp3 + cint * temp4/30) * quantity;
        } else {
          var period = null;
        };
        
          $('#price_1').val(aint);
          $('#price_7').val(bint);
          $('#price_30').val(cint);
          $('#period').val(period);
          $('#rental_list_price').val(rental_list_price);

          })
        }

      }      
      loadPrices();
      $('#unit_model').on('change', loadPrices);
      $('#days').on('change', loadPrices);
      $('#quantity').on('change', loadPrices);
// ---------------------------------------------------------------------------------      
  

//------------------------------------------------------------------------------
  function calcEndDate() {
    var start = new Date((document.getElementById("start_date").value)+'T00:00');
    var startmili = start.getTime();
    var days = document.getElementById("days").value;
    var daysmili = days * 86400000; //para pasar los días a milisegundos
    var end = new Date(startmili + daysmili - 86400000);
    year = end.getFullYear();
    month = end.getMonth()+1;
    dt = end.getDate();
    if (dt < 10) {
      dt = '0' + dt;
    }
    if (month < 10) {
      month = '0' + month;
    }
    var formattedEnd = year+'-' + month + '-'+dt;
    $('#end_date').val(formattedEnd);
  };
  calcEndDate();
  $('#start_date').on('change', calcEndDate);
  $('#days').on('change', calcEndDate);
//------------------------------------------------------------------------------
  function calcTotals() {

    var rental_offered_price = 0;
    var discount_offered_price = 0;
    var transport_offered_price = 0;
    var discount_transport_price = 0;
    var other_price = 0;

    var rental_offered_price = $('#rental_offered_price').val();
    var discount_offered_price = $('#discount_offered_price').val();
    var net_rental_price = rental_offered_price * ((100 - discount_offered_price) / 100);
    $('#net_rental_price').val(net_rental_price);

    var transport_offered_price = $('#transport_offered_price').val();
    var discount_transport_price = $('#discount_transport_price').val();
    var net_transport_price = transport_offered_price * ((100 - discount_transport_price) / 100);
    $('#net_transport_price').val(net_transport_price);

    var other_price = $('#other_price').val();

    var gross_offered_price = parseFloat(rental_offered_price) + parseFloat(transport_offered_price) + parseFloat(other_price);
    $('#gross_offered_price').val(gross_offered_price);

    var net_discount = (parseFloat(net_rental_price) - parseFloat(rental_offered_price)) + (parseFloat(net_transport_price) - parseFloat(transport_offered_price));
    $('#net_discount').val(net_discount);    

    var net_offered_price = parseFloat(gross_offered_price) + parseFloat(net_discount);
    $('#net_offered_price').val(net_offered_price);

    //var prices = document.querySelectorAll(".price")
    //prices.forEach(function(price){
      //price.value = Number(price.value).toLocaleString("es-ES",{ maximumFractionDigits: 0, minimumFractionDigits: 0})
      //price.value = Number(price.value).toFixed(0);
    //});
  };
  //calcTotals();
  $('#rental_offered_price').on('change', calcTotals);
  $('#discount_offered_price').on('change', calcTotals);
  $('#transport_offered_price').on('change', calcTotals);
  $('#discount_transport_price').on('change', calcTotals);
  $('#other_price').on('change', calcTotals);
  $('#unit_model').on('change', calcTotals);
//------------------------------------------------------------------------------

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

      //if(!$("#company").val()) {
        //$("#company").addClass('is-invalid');
        //$("#company").parent().find('.invalid-feedback').removeClass('d-none');
        //pass = false;
      //}

      if(!$("#client").val()) {
        $("#client").addClass('is-invalid');
        $("#client").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }     

      if(!$("#family").val()) {
        $("#family").addClass('is-invalid');
        $("#family").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }

      if(!$("#unit_model").val()) {
        $("#unit_model").addClass('is-invalid');
        $("#unit_model").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }

      if(!$("#quantity").val()) {
        $("#quantity").addClass('is-invalid');
        $("#quantity").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      } 

      if(!$("#days").val()) {
        $("#days").addClass('is-invalid');
        $("#days").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }    

      if(!$("#start_date").val()) {
        $("#start_date").addClass('is-invalid');
        $("#start_date").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }

      if(!$("#rental_offered_price").val()) {
        $("#rental_offered_price").addClass('is-invalid');
        $("#rental_offered_price").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }   

      if(!$("#transport_offered_price").val()) {
        $("#transport_offered_price").addClass('is-invalid');
        $("#transport_offered_price").parent().find('.invalid-feedback').removeClass('d-none');
        pass = false;
      }       

      if (pass) {
        $(this).off('submit');
        $(this).submit();
      }

    });

// ---------------------------------------------------------------------------------------------


//------------------------------------------------------------------------------
</script>
@endsection
