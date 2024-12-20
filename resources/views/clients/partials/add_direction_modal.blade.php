@inject('countries', 'App\Services\Countries')
@inject('provincesService', 'App\Services\Provinces')
@inject('counties', 'App\Services\Counties')
@inject('cities', 'App\Services\Cities')



@php
$clientId = $client->id; 

@endphp

<div id="directionModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <!-- Modal Dialog -->
    <div class="bg-white rounded-lg w-full max-w-3xl p-2">

        <!-- Modal Header -->
        <div class="flex justify-between items-center p-1 border-b border-gray-300">
            <h4 class="text-lg font-semibold">Agregar Dirección: {{$client->legal_name}}</h4>
        </div>

        <!-- Modal Form -->
        <form method="POST" action="{{ route('addresses.store') }}" autocomplete="off" class="p-1 space-y-6">
            {{ csrf_field() }}
            @if ($errors->any())
                <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                    <strong>Debe corregir los errores en el formulario.</strong>
                </span>                
            @endif

            <section>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Línea 1 -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="line1" class="block text-md font-medium text-gray-700">Línea 1*:</label>
                        <input id="line1" type="text" name="line1" class="mt-1 block w-full border border-gray-300 rounded-md py-1 px-3 {{ $errors->has('line1') ? 'border-red-500' : '' }}" value="{{ old('line1') }}" required>
                        @if ($errors->has('line1'))
                            <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                                <strong>Debe ingresar Línea 1</strong>
                            </span>                
                        @endif
                    </div>

                    <!-- Línea 2 -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="line2" class="block text-md font-medium text-gray-700">Línea 2:</label>
                        <input id="line2" type="text" name="line2" class="mt-1 block w-full border border-gray-300 rounded-md py-1 px-3" value="{{ old('line2') }}">
                    </div>

                    <!-- Provincia -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="province" class="block text-md font-medium text-gray-700">Provincia*</label>
                        <select id="province" name="province_id" class="mt-1 block w-full border border-gray-300 rounded-md px-3" required>
                            @foreach($provincesService->get() as $provinceId => $provinceName)
                                <option value="{{ $provinceId }}">{{ $provinceName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Partido -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="county" class="block text-md font-medium text-gray-700">Partido</label>
                        <select id="county" name="county_id" class="mt-1 block w-full border border-gray-300 rounded-md px-3">
                            <option value="">Seleccione Partido</option>
                            @foreach($counties->get() as $countie)
                                <option value="{{ $countie->id }}" data-province="{{ $countie->province_id }}">{{ $countie->value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Localidad/Ciudad -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="city" class="block text-md font-medium text-gray-700">Localidad/Ciudad: </label>
                        <select id="city" name="city_id" class="mt-1 block w-full border border-gray-300 rounded-md px-3">
                            <option value="">Seleccione Localidad/Ciudad</option>
                            @foreach($cities->get() as $city)
                                <option value="{{ $city->id }}" data-county="{{ $city->county_id }}">{{ $city->value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Código Postal -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="zip_code" class="block text-md font-medium text-gray-700">Código Postal:</label>
                        <input id="zip_code" type="number" name="zip_code" class="mt-1 block w-full border border-gray-300 rounded-md py-1 px-3">
                    </div>

                    <!-- Billing Address Section -->
                    @if(!isset($hasBillingAddress) || $hasBillingAddress === 'NO')
                        <div class="col-span-2 text-center font-bold">El cliente NO cuenta con una dirección de facturación.</div>
                        <div class="col-span-2 flex items-center justify-center space-x-4">
                            <label for="billing_address" class="text-md font-medium text-gray-700">Dirección de facturación?*</label>
                            <label class="flex items-center space-x-2">
                                <span>Si</span>
                                <input type="radio" id="billing_address" name="billing_address" value="1">
                            </label>
                            <label class="flex items-center space-x-2">
                                <span>No</span>
                                <input type="radio" id="billing_address" name="billing_address" value="0" checked>
                            </label>
                        </div>
                    @else
                        <div class="col-span-2 text-center font-bold">El cliente ya cuenta con una dirección de facturación.</div>
                        <input name="billing_address" value="0" hidden>
                    @endif

                    <!-- Hidden Fields -->
                    @if(isset($origin->what_blade))
                        <input type="hidden" name="what_blade" value="{{ $origin->what_blade }}">
                    @endif
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    @if(isset($origin->unit_id))
                        <input type="hidden" name="unit_id" value="{{ $origin->unit_id }}">
                    @endif
                    @if(isset($origin->contact_id))
                        <input type="hidden" name="contact_id" value="{{ $origin->contact_id }}">
                    @endif
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="submit">Agregar</button>
                    <button id="closeModalButton2" type="button" class="py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancelar</button>
                </div>

                <hr class="my-2">

                <div class="eagle-button-container col-12"><b>* Campos Obligatorios</b></div>
            </section>
        </form>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var provinceSelect = document.getElementById('province');
        var countySelect = document.getElementById('county');
        var citySelect = document.getElementById('city');
        var countiesOptions = Array.from(document.querySelectorAll('#county option'));
        var citiesOptions = Array.from(document.querySelectorAll('#city option'));
    
        // Initial population of county options based on the selected province
        provinceSelect.addEventListener('change', function() {
            var selectedProvinceId = this.value;
            updateCountyOptions(selectedProvinceId);
        });
    
        // Initial population of city options based on the selected county
        countySelect.addEventListener('change', function() {
            var selectedCountyId = this.value;
            updateCityOptions(selectedCountyId);
        });
    
        // Function to update county options based on the selected province
        function updateCountyOptions(selectedProvinceId) {
            countySelect.innerHTML = '<option value="">Seleccione Partido</option>';
            countiesOptions.forEach(function(option) {
                if (option.getAttribute('data-province') === selectedProvinceId || option.getAttribute('data-province') === '') {
                    countySelect.appendChild(option.cloneNode(true));
                }
            });
            // Trigger change event on county select to update city options
            countySelect.dispatchEvent(new Event('change'));
        }
    
        // Function to update city options based on the selected county
        function updateCityOptions(selectedCountyId) {
            citySelect.innerHTML = '<option value="">Seleccione Localidad/Ciudad</option>';
            citiesOptions.forEach(function(option) {
                if (option.getAttribute('data-county') === selectedCountyId || option.getAttribute('data-county') === '') {
                    citySelect.appendChild(option.cloneNode(true));
                }
            });
        }
    
    });
    </script>
    
    
  <script>
    document.getElementById('countySelect').addEventListener('change', function() {
      var selectedCounty = this.value;
      var selectedProvince = this.options[this.selectedIndex].getAttribute('data-province');
      console.log('Selected County:', selectedCounty);
      console.log('Province of Selected County:', selectedProvince);
  });
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
