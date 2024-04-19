@extends('layouts.app')

@section('title', 'Dirección')

@section('content')

@inject('countries', 'App\Services\Countries')
@inject('industries', 'App\Services\Industries')
@inject('provinces', 'App\Services\Provinces')


<div class="container eagle-container">
  
  <div class="col d-flex justify-content-center" style="margin-top: 0.5rem">
    <div class="card eagle-card col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">    

        <div class="card-header eagle-card-header">
          <h3 class="eagle-h3">Editar Dirección: {{$address->client->legal_name}}</h3>
        </div>

          <form method="POST" action="/addresses/{{$address->id}}" novalidate>
            {{method_field('PUT')}}
            {{csrf_field()}}
            <section>
            <div class="card-body eagle-card-body">
              <div class="container-fluid">

                <div class="row eagle-row-clean col-12">
                  {{ Form::label("Línea 1*:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}                  
                  <input type="text" id="line1" name="line1" class="form-control mac-form-control col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 {{ $errors->has('line1') ? ' is-invalid' : '' }}" value="{{$address->line1}}">
                  <span class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></span>
                    @if ($errors->has('line1'))
                      <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert" style="padding: 0">
                        <strong>Debe ingresar Línea 1</strong>
                      </span>                
                    @endif
                </div>

                <div class="row eagle-row-clean col-12">
                  {{ Form::label("Línea 2:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                  {{ Form::text('line2', $address->line2, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control']) }}
                </div>

                <div class="row eagle-row-clean col-12">
                  {{ Form::label("País*:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                  <select class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }}" id="country" name="country_id">
                    @foreach($countries->get() as $index => $country)
                      <option value="{{ $index }}" {{ $address->country_id == $index ? 'selected' : '' }}>
                        {{ $country }}
                      </option>
                    @endforeach
                  </select>
                    <span class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></span>
                    @if ($errors->has('country_id'))
                      <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert" style="padding: 0">
                        <strong>Debe ingresar País</strong>
                      </span>
                    @endif
                </div>

                <div class="row eagle-row-clean col-12">
                  <label for="province" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 mac-label">Provincia*:</label>
                  <select id="province" data-old= "{{ $address->province_id }}" name="province_id" class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control"></select>
                </div>

                <div class="row eagle-row-clean col-12">
                  <label for="county" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 mac-label">Partido:</label>     
                  <!--select id="county" data-oldcounty="{{ $address->county_id}}" name="county_id" class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control"></select-->
                  @if(isset($address->county_id))
                    <input type="text" id="county_id" name="county_id" class="form-control mac-form-control col-8" placeholder="{{$address->county->value}}" value="{{$address->county_id}}">
                  @else
                    <input type="text" id="county_name" name="county_name" class="form-control mac-form-control col-8" value="{{$address->county_name}}">
                  @endif
                </div>

                <div class="row eagle-row-clean col-12">
                  <label for="city" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 mac-label">Localidad/Ciudad:</label>   
                  <!--select id="city" data-oldcity="{{ $address->city_id }}" name="city_id" class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control"></select-->
                  @if(isset($address->city_id))
                    <input type="text" id="city_id" name="city_id" class="form-control mac-form-control col-8" placeholder="{{$address->city->value}}" value="{{$address->city_id}}">
                  @else
                    <input type="text" id="city_name" name="city_name" class="form-control mac-form-control col-8" value="{{$address->city_name}}">
                  @endif
                </div>
                
                <div class="row eagle-row-clean col-12">
                  {{ Form::label("Código Postal:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                  {{ Form::text('zip_code', $address->zip_code, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control']) }}
                </div>

                <hr>

                <div class="form-group row" style="margin-bottom: 0">
                  {{ Form::label("Dirección de facturación?", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                    <div class="col-2 mac-label">Si</div>
                    <div class="col-2 row eagle-row-clean" style="display: flex; align-items: center">
                      @if ($address->billing_address === 1)
                        {{ Form::radio('billing_address', '1', true) }}
                      @else
                        {{ Form::radio('billing_address', '1') }}
                      @endif
                    </div>
                    <div class="col-1 mac-label">No</div>
                    <div class="col-2" style="display: flex; align-items: center">
                      @if ($address->billing_address === 0)
                        {{ Form::radio('billing_address', '0', true) }}
                      @else
                        {{ Form::radio('billing_address', '0') }}
                      @endif
                    </div>
                </div>

                <br>

                <input type="hidden" name="client_id" value="{{$address->client->id}}" readonly>

              </div>
            </div>

            <br>

            <div class="card-footer row eagle-row" style="background-color: white; border: none">
              <div class="col-3"></div>
              <button class="btn eagle-button modalbutton col-2" type="submit">Guardar</button>
              <div class="col-2"></div>
              <a type="button" class="btn eagle-button modalbutton col-2" href="/clients/{{$address->client->id}}">Cancelar</a>
              <div class="col-3"></div>
            </div>

            <hr>

            <div class="eagle-button-container col-12"><b>* Campos Obligatorios</b></div>

            <br>

          </section>  
          </form>

    </div>
  </div> 

</div> <!-- end container -->

@endsection

@section('script')

<script>
  $(document).ready(function(){

      function loadProvince() {
          var country_id = $('#country').val();
          if ($.trim(country_id) != '') {
              $.get('/provinces', {country_id: country_id}, function (provinces) {

                 var old = $('#province').data('old') != '' ? $('#province').data('old') : '';

                  $('#province').empty();
                  $('#province').append("<option value=''>Seleccione Provincia</option>");

                  $.each(provinces, function (index, value) {
                    $('#province').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              });
          }
      }
      loadProvince();
      $('#country').on('change', loadProvince);

      //function loadCounty() {
          //var province_id = $('#province').val();
          //console.log(province_id);
          //if ($.trim(province_id) != '') {
              //$.get('/counties', {province_id: province_id}, function (counties) {

                  //var oldcounty = $('#county').data('oldcounty') != '' ? $('#county').data('oldcounty') : '';

                  //$('#county').empty();
                  //$('#county').append("<option value=''>Seleccione Partido</option>");

                  //var counties = Object.keys(counties).map((key) => [Number(key), counties[key]]);
                  //counties.sort(function(a, b){
                    //var x = a[1].toLowerCase();
                    //var y = b[1].toLowerCase();
                    //if (x < y) {return -1;}
                    //if (x > y) {return 1;}
                    //return 0;
                  //});                      

                  //$.each(counties, function (a, b) {
                    //var x = b[0];                      
                    //var y = b[1];                  
              
                    //$('#county').append("<option value='" + x + "'" + (oldcounty == x ? 'selected' : '') + ">" + y +"</option>");
                  //})
              //});
          //}
      //}
      //loadCounty();
      //$('#country').on('change', loadCounty);
      //$('#province').on('change', loadCounty);

      //function loadCity() {
          //var county_id = $('#county').val();
          //if ($.trim(county_id) != '') {
              //$.get('/cities', {county_id: county_id}, function (cities) {

                //var oldcity = $('#city').data('oldcity') != '' ? $('#city').data('oldcity') : '';

                //console.log(oldcity);

                  //$('#city').empty();
                  //$('#city').append("<option value=''>Seleccione Localidad/Ciudad</option>");

                //var cities = Object.keys(cities).map((key) => [Number(key), cities[key]]);
                  //cities.sort(function(a, b){
                    //var x = a[1].toLowerCase();
                    //var y = b[1].toLowerCase();
                    //if (x < y) {return -1;}
                    //if (x > y) {return 1;}
                    //return 0;
                  //});                      

                  //$.each(cities, function (a, b) {
                    //var x = b[0];                      
                    //var y = b[1]; 

                    //$('#city').append("<option value='" + x + "'" + (oldcity == x ? 'selected' : '') + ">" + y +"</option>");
                  //})
              //});
          //}
      //}
      //loadCity();
      //$('#country').on('change', loadCity);
      //$('#province').on('change', loadCity);
      //$('#county').on('change', loadCity);    

  });

</script>

@endsection
