@extends('layouts.app')

@section('title', 'Alquiler '.$rental->id)

@section('content')

    @inject('family', 'App\Services\Family')
    @inject('families', 'App\Services\Subfamily')
    @inject('brands', 'App\Services\Brand')
    @inject('clients', 'App\Services\Clients')

<div class="container eagle-container">

  <div class="jumbotron eagle-jumbotron-2">
    <div class="row eagle-row" style="margin: 0; padding: 0 1rem 0 1rem">
      <h1 class="col-10 eagle-h2" style="display: flex; align-items: center; padding: 0">Alquiler Nº {{$rental->id}}</h1>
      <div class="mac-button-container col-1">
        <a class="col-12 btn eagle-button" href="{{action('App\Http\Controllers\RentalController@edit', $rental->id)}}">Editar</a>
      </div>
      <div class="mac-button-container col-1">
        <a class="col-12 btn eagle-button" href="{{ url()->previous() }}">Volver</a>
      </div>
    </div>
  </div>

  <br>

    <div class="row rental-row"> <!-- start of form row -->

    	<div class="col-2" style="padding: 0 5px 0 5px">

        	<div class="form-group row" style="display: none">
          		<input id="rental_type" name="rental_type" value=1>
          		<input id="previous_rental_id" name="previous_rental_id" value=0>
          		<input id="user_id" name="user_id" value="{{auth()->user()->id}}">
        	</div>

        	<div class="row eagle-row-clean col-12">
          		<label for="client" class="mac-label-left col-4">Vendedor:</label>
          		<input class="col-8 form-control mac-form-control" value="{{ $rental->user->firstname.' '.$rental->user->lastname }}" readonly style="font-weight: bold;">          
        	</div>

        	<br>
	        <hr>
	        <br>

        	<div class="row eagle-row-clean col-12">
          		<label for="client" class="mac-label-left col-4">Cliente:</label>
          		<input class="col-8 form-control mac-form-control" value="{{ $rental->client->commercial_name }}" readonly style="font-weight: bold;">          
        	</div>

        	<div class="row eagle-row-clean col-12">
          		<label for="contact" class="mac-label-left col-4">Contacto:</label>
          		<input class="col-8 form-control mac-form-control" value="{{ $rental->contact_id ? $rental->contact->name : 'N/D' }}" readonly style="font-weight: bold;">
        	</div>

        	<div class="row eagle-row-clean col-12">
          		<label for="address" class="mac-label-left col-4">Dirección de entrega:</label>
          		<input class="col-8 form-control mac-form-control" value="{{ $rental->address_id ? $rental->address->line1 : 'N/D' }}" readonly style="font-weight: bold;">
        	</div>

	        <br>
	        <hr>
	        <br>

        	<div class="row eagle-row-clean col-12">
          		<label for="address" class="mac-label-left col-4">Comentarios:</label>
          		<textarea id="aux" type="text" name="aux" class="col-8 form-control mac-form-control textarea-desc" readonly>{{$rental->aux}}</textarea>
        	</div>

      	</div> <!-- end of 1st column -->

      <div class="col-2" style="padding: 0 5px 0 5px"> <!-- 2nd column -->

          <div class="row eagle-row-clean col-12">
            <label for="family" class="mac-label-left col-4">Familia:</label>
            <input class="col-8 form-control mac-form-control" value="{{ $family->retrieve($rental->unitModel->family_id) }}" readonly style="font-weight: bold;">
          </div>

          <div class="row eagle-row-clean col-12">
            <label for="unit_model" class="mac-label-left col-4">Modelo:</label>
            <input class="col-8 form-control mac-form-control" value="{{ $rental->unitModel->model }}" readonly style="font-weight: bold;">
          </div>

          <br>

          <div class="row eagle-row-clean col-12">
            <div class="row eagle-row-clean col-6">
            </div>
            <div class="row eagle-row-clean col-6">
              <label for="quantity" class="mac-label-left col-4">Cant:</label>
              <input id="quantity" type="text" name="quantity" class="mac-form-control-readonly col-8" value="{{ $rental->quantity }}" style="text-align: center;"> 
              <div class="col-2"></div>
            </div>           
          </div>

          <div class="row eagle-row-clean col-12">
            <div class="row eagle-row-clean col-6">
              <label for="days" class="mac-label-left col-4">Días:</label>
              <input id="days" type="text" name="days" class="mac-form-control-readonly col-8" value="{{ $rental->days }}" style="text-align: center;">
            </div>
            <div class="row eagle-row-clean col-6">
              <label for="period" class="mac-label-left col-4">Tarifa:</label>
              <input id="period" type="text" name="period" class="mac-form-control-readonly col-8" value="{{ $rental->period }}" style="text-align: center;"readonly>
            </div>
          </div>

          <br>

          <div class="row eagle-row-clean col-12">
            <label for="start_date" class="mac-label-left col-4">Fecha Inicio:</label>
            <input id="start_date" type="date" name="start_date" class="mac-form-control-readonly col-8" value="{{ $rental->start_date }}" readonly>
          </div>

          <div class="row eagle-row-clean col-12">
            <label for="end_date" class="mac-label-left col-4">Fecha Final:</label>
            <input id="end_date" type="date" name="end_date" class="mac-form-control-readonly col-8" value="{{ $rental->end_date }}" readonly>
          </div>

        </div> <!-- end of 2nd column -->


        <div class="col-4" style="padding: 0 5px 0 5px"> <!-- 3rd column -->

          <div class="form-group row">
            <div class="col-md-3 mac-label-center">Tarifas</div>
            <label for="list_price" class="col-md-3 mac-label-center">Diaria</label>
            <label for="list_price" class="col-md-3 mac-label-center">Semanal</label>
            <label for="list_price" class="col-md-3 mac-label-center">Mensual</label>
          </div>

          <div class="row eagle-row-clean col-12">
            <label class="col-md-3 mac-label-center">Precios de Lista:</label>
              <input id="price_1" name="price_1" class="mac-form-control-readonly col-md-3 listprice" style="text-align: center;" value="{{number_format($rental->price_1, 0, ',', '.')}}" readonly>
              <input id="price_7" name="price_7" class="mac-form-control-readonly col-md-3 listprice" style="text-align: center;" value="{{number_format($rental->price_7, 0, ',', '.')}}" readonly>
              <input id="price_30" name="price_30" class="mac-form-control-readonly col-md-3 listprice" style="text-align: center;" value="{{number_format($rental->price_30, 0, ',', '.')}}" readonly>
          </div>

          <br>
          <hr>
          <br>

          <div class="row eagle-row col-12">
            <div class="col-md-4"></div>
            <label class="col-md-2 mac-label-center">Precio Lista</label>
            <label class="col-md-2 mac-label-center">Precio Of.</label>
            <label class="col-md-2 mac-label-center">Bonificación %</label>
            <label class="col-md-2 mac-label-center">Precio Neto</label>
          </div>

          <div class="row eagle-row col-12">
            <label class="col-md-4 mac-label-center">Alquiler:</label>
            <input id="rental_list_price" type="text" name="rental_list_price" class="form-control col-md-2 rental-price" value="{{number_format($rental->rental_list_price, 0, ',', '.')}}" readonly>
            <input id="rental_offered_price" type="text" name="rental_offered_price" class="form-control col-md-2 price  rental-price" value="{{number_format($rental->rental_offered_price, 0, ',', '.')}}" readonly>
            <input id="discount_offered_price" type="text" name="discount_offered_price" class="form-control col-md-2 discount"  value="{{$rental->discount_offered_price.'%'}}" readonly>
            <input id="net_rental_price" type="text" name="net_rental_price" class="form-control col-md-2 price rental-price" value="{{number_format($rental->net_rental_price, 0, ',', '.')}}" readonly>
          </div>

          <div class="row eagle-row col-12">
            <label class="col-md-4 mac-label-center">Transporte:</label>
            <div class="col-md-2"></div>
            <input id="transport_offered_price" type="text" name="transport_offered_price" class="form-control col-2 rental-price" value="{{number_format($rental->transport_offered_price, 0, ',', '.')}}" readonly>
            <input id="discount_transport_price" type="text" name="discount_transport_price" class="form-control col-md-2 discount" value="{{$rental->discount_transport_price.'%'}}" readonly>
            <input id="net_transport_price" type="text" name="net_transport_price" class="form-control col-md-2 price rental-price" value="{{number_format($rental->net_transport_price, 0, ',', '.')}}" readonly>
          </div>

          <div class="row eagle-row col-12">
            <label class="col-md-4 mac-label-center">Otros:</label>
            <input id="other" type="text" name="other" class="form-control col-6" style="font-size: 0.7rem; text-align: left;" value="{{$rental->other}}" readonly>
            <input id="other_price" type="text" name="other_price" class="form-control col-md-2 price rental-price" value="{{number_format($rental->other_price, 0, ',', '.')}}" readonly>
          </div>

          <hr>

          <div class="row eagle-row col-12">
            <label class="col-md-4 mac-label-center">Total:</label>
            <div class="col-md-2"></div>
            <input id="gross_offered_price" type="text" name="gross_offered_price" class="form-control col-md-2 price rental-price" value="{{number_format($rental->gross_offered_price, 0, ',', '.')}}" readonly>
            <input id="net_discount" type="text" name="net_discount" class="form-control col-md-2 price rental-price" value="{{number_format($rental->net_discount, 0, ',', '.')}}" readonly>
            <input id="net_offered_price" type="text" name="net_offered_price" class="form-control col-md-2 price rental-price" value="{{number_format($rental->net_offered_price, 0, ',', '.')}}" readonly>
          </div>

        </div> <!-- end of 3rd column -->

    </div> <!-- end of form row -->

   

</div> <!-- end of container -->

@endsection

@section('script')

<script>

</script>
@endsection
