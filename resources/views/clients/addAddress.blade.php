@extends('layouts.app')

@section('title', 'Dirección')

@section('content')

@inject('countries', 'App\Services\Countries')
@inject('industries', 'App\Services\Industries')
@inject('provincesService', 'App\Services\Provinces')
@inject('counties', 'App\Services\Counties')
@inject('cities', 'App\Services\Cities')

<div class="container eagle-container">
  
  <div class="col d-flex justify-content-center" style="margin-top: 0.5rem">
    <div class="card eagle-card col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">    

        <div class="card-header eagle-card-header">
          <h3 class="eagle-h3">Agregar Dirección: {{$client->legal_name}}</h3>
        </div>

          <form action="{{ route('addresses.store') }}" method="POST" autocomplete="off" novalidate>
            {{csrf_field()}}
            @if ($errors->any())
            <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                <strong>Debe corregir los errores en el formulario.</strong>
            </span>                
        @endif
        
            <section>
            <div class="card-body eagle-card-body">
              <div class="container-fluid">

                <div class="row eagle-row-clean col-12">
                  <label for="line1" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 mac-label">Línea 1*:</label>
                  <input type="text" id="line1" name="line1" class="form-control mac-form-control col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 {{ $errors->has('line1') ? ' is-invalid' : '' }}" value="{{ old('line1') }}">
                  <span class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></span>
                  @if ($errors->has('line1'))
                      <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                          <strong>Debe ingresar Línea 1</strong>
                      </span>                
                  @endif
              </div>
              
              <div class="row eagle-row-clean col-12">
                  <label for="line2" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 mac-label">Línea 2:</label>
                  <input type="text" id="line2" name="line2" class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 mac-form-control form-control" value="{{ old('line2') }}">
              </div>
              
             <!-- <div class="row eagle-row-clean col-12">
                  <label for="country_id" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 mac-label">País*:</label>
                  <select class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }}" id="country" name="country_id">
                      @foreach($countries->get() as $index => $country)
                          <option value="{{ $index }}" {{ old('country_id') == $index ? 'selected' : '' }}>
                              {{ $country }}
                          </option>
                      @endforeach                                             
                  </select>
                  <span class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></span>
                  @if ($errors->has('country_id'))
                      <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                          <strong>Debe ingresar País</strong>
                      </span>
                  @endif
              </div>-->
              

             <!-- HTML -->
<!-- HTML -->
<div class="row eagle-row-clean col-12">
  <label for="province" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 mac-label">Provincia*:</label>
  <select id="province" name="province_id" class="col-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control">
      @foreach($provincesService->get() as $provinceId => $provinceName)
          <option value="{{ $provinceId }}">{{ $provinceName }}</option>
      @endforeach
  </select>
  <span class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></span>
</div>

<div class="row eagle-row-clean col-12">
  <label for="county" class="col-4 mac-label">Partido:</label>
  <select id="county" name="county_id" class="col-8 form-control mac-form-control">
      <option value="">Seleccione Partido</option>
      @foreach($counties as $countyId => $countyName)
          <option value="{{ $countyId }}">{{ $countyName }}</option>
      @endforeach
  </select>
</div>

<div class="row eagle-row-clean col-12">
  <label for="city" class="col-4 mac-label">Localidad/Ciudad:</label>
  <select id="city" name="city_id" class="col-8 form-control mac-form-control">
      <option value="">Seleccione Localidad/Ciudad</option>
      @foreach($cities as $cityId => $cityName)
          <option value="{{ $cityId }}">{{ $cityName }}</option>
      @endforeach
  </select>
</div>

                
                
                <div class="row eagle-row-clean col-12">
                  <label for="zip_code" class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 mac-label">Código Postal:</label>
                  <input type="text" id="zip_code" name="zip_code" class="form-control mac-form-control col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" value="{{ old('zip_code') }}">
              </div>
                         

                <hr>     

                @if(!isset($hasBillingAddress) || $hasBillingAddress === 'NO')

                  <div class="col-12" style="text-align: center; font-weight: bold">El cliente NO cuenta con una dirección de facturación.</div>

                  <br>

                  <div class="row eagle-row-clean col-12">
                    <label for="billing_address" class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 mac-label">Dirección de facturación?*</label>
                    <div class="col-2 mac-label">Si</div>
                    <div class="col-2 row eagle-row-clean" style="display: flex; align-items: center">
                        <input type="radio" id="billing_address" name="billing_address" value="1" class="form-control">
                    </div>
                    <div class="col-1 mac-label">No</div>
                    <div class="col-2" style="display: flex; align-items: center">
                        <input type="radio" id="billing_address" name="billing_address" value="0" class="form-control">
                    </div>
                </div>
                

                @else

                  <div class="col-12" style="text-align: center; font-weight: bold">El cliente ya cuenta con una dirección de facturación.</div>
                  <input name="billing_address" value="0" hidden> 

                @endif

                @if(isset($origin->what_blade))
                  <input type="hidden" name="what_blade" value="{{$origin->what_blade}}" readonly>
                @endif

                <input type="hidden" name="client_id" value="{{$client->id}}" readonly>
                
                @if(isset($origin->unit_id))
                  <input type="hidden" name="unit_id" value="{{$origin->unit_id}}" readonly>
                @endif
                
                @if(isset($origin->contact_id))
                  <input type="hidden" name="contact_id" value="{{$origin->contact_id}}" readonly>
                @endif

               <br>
                
              </div>
            </div>

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

          </section>
          </form>

    </div>
  </div> 

</div> <!-- end container -->

@endsection

@section('script')

<script>
// JavaScript
document.addEventListener('DOMContentLoaded', function() {
    var provinceSelect = document.getElementById('province');
    var countySelect = document.getElementById('county');
    var citySelect = document.getElementById('city');
    var counties = {!! json_encode($counties) !!};
    var cities = {!! json_encode($cities) !!};

    // Event listener for province select change
    provinceSelect.addEventListener('change', function() {
        var selectedProvinceId = provinceSelect.value;

        // Filter counties based on the selected province
        var filteredCounties = counties.filter(function(county) {
            return county.province_id == selectedProvinceId;
        });

        // Update county select options
        updateSelectOptions(countySelect, filteredCounties, 'id', 'name');

        // Filter cities based on the selected province
        var filteredCities = cities.filter(function(city) {
            return city.province_id == selectedProvinceId;
        });

        // Update city select options
        updateSelectOptions(citySelect, filteredCities, 'id', 'name');
    });

    // Function to update select options
    function updateSelectOptions(selectElement, data, valueKey, textKey) {
        // Clear existing options
        selectElement.innerHTML = '';

        // Add default option
        var defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Seleccione ' + selectElement.getAttribute('name');
        selectElement.appendChild(defaultOption);

        // Add options based on filtered data
        data.forEach(function(item) {
            var option = document.createElement('option');
            option.value = item[valueKey];
            option.textContent = item[textKey];
            selectElement.appendChild(option);
        });
    }
});


</script>

@endsection
