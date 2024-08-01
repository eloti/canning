@extends('layouts.app')

@section('title', 'Editar Dirección')

@section('content')

@inject('countries', 'App\Services\Countries')
@inject('provincesService', 'App\Services\Provinces')
@inject('counties', 'App\Services\Counties')
@inject('cities', 'App\Services\Cities')

<div class="container mx-auto px-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="bg-white  sm:rounded-lg w-full max-w-3xl m-auto">
        <!-- Header del Modal -->
      

        <!-- Formulario del Modal -->
        <form method="POST" action="{{ route('addresses.update', $address->id) }}" novalidate class="p-4 space-y-6">
            @method('PUT')
            @csrf

            <section>
                <div class="grid grid-cols-1 gap-4">
                    <!-- Línea 1 -->
                    <div class="col-span-1">
                        <label for="line1" class="block text-md font-medium text-gray-700">Línea 1*:</label>
                        <input id="line1" type="text" name="line1" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 {{ $errors->has('line1') ? 'border-red-500' : '' }}" value="{{ old('line1', $address->line1) }}">
                        @if ($errors->has('line1'))
                            <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert">
                                <strong>{{ $errors->first('line1') }}</strong>
                            </span>                
                        @endif
                    </div>

                    <!-- Línea 2 -->
                    <div class="col-span-1">
                        <label for="line2" class="block text-md font-medium text-gray-700">Línea 2:</label>
                        <input id="line2" type="text" name="line2" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3" value="{{ old('line2', $address->line2) }}">
                    </div>

                    <!-- Provincia -->
                    <div class="col-span-1">
                        <label for="province" class="block text-md font-medium text-gray-700">Provincia</label>
                        <select id="province" name="province_id" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3">
                            @foreach($provincesService->get() as $provinceId => $provinceName)
                                <option value="{{ $provinceId }}" {{ $provinceId == old('province_id', $address->province_id) ? 'selected' : '' }}>{{ $provinceName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Partido -->
                    <div class="col-span-1">
                        <label for="county" class="block text-md font-medium text-gray-700">Partido</label>
                        <select id="county" name="county_id" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3">
                            <option value="">Seleccione Partido</option>
                            @foreach($counties->get() as $county)
                                <option value="{{ $county->id }}" data-province="{{ $county->province_id }}" {{ $county->id == old('county_id', $address->county_id) ? 'selected' : '' }}>{{ $county->value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Localidad/Ciudad -->
                    <div class="col-span-1">
                        <label for="city" class="block text-md font-medium text-gray-700">Localidad/Ciudad: </label>
                        <select id="city" name="city_id" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3">
                            <option value="">Seleccione Localidad/Ciudad</option>
                            @foreach($cities->get() as $city)
                                <option value="{{ $city->id }}" data-county="{{ $city->county_id }}" {{ $city->id == old('city_id', $address->city_id) ? 'selected' : '' }}>{{ $city->value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Código Postal -->
                    <div class="col-span-1">
                        <label for="zip_code" class="block text-md font-medium text-gray-700">Código Postal:</label>
                        <input id="zip_code" type="number" name="zip_code" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 {{ $errors->has('zip_code') ? 'border-red-500' : '' }}" value="{{ old('zip_code', $address->zip_code) }}">
                    </div>

                    <!-- Dirección de Facturación -->
                    @if(!isset($hasBillingAddress) || $hasBillingAddress === 'NO')
                    <div class="col-12 text-center font-bold">El cliente NO cuenta con una dirección de facturación.</div>
                    <div class="row eagle-row-clean col-12">
                        <label for="billing_address" class="col-4 text-md font-medium text-gray-700">¿Dirección de facturación?*</label>
                        <div class="col-2 text-md font-medium text-gray-700">Sí</div>
                        <div class="col-2 row eagle-row-clean flex items-center">
                            <input type="radio" id="billing_address" name="billing_address" value="1" class="form-control" {{ old('billing_address', $address->billing_address) == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-1 text-md font-medium text-gray-700">No</div>
                        <div class="col-2 flex items-center">
                            <input type="radio" id="billing_address" name="billing_address" value="0" class="form-control" {{ old('billing_address', $address->billing_address) == '0' ? 'checked' : '' }}>
                        </div>
                    </div>
                    @else
                    <div class="col-12 text-center font-bold">El cliente ya cuenta con una dirección de facturación.</div>
                    <div class="row eagle-row-clean col-12">
                        <label for="billing_address" class="col-4 text-md font-medium text-gray-700">¿Dirección de facturación?*</label>
                        <div class="col-2 text-md font-medium text-gray-700">Sí</div>
                        <div class="col-2 row eagle-row-clean flex items-center">
                            <input type="radio" id="billing_address" name="billing_address" value="1" class="form-control" {{ old('billing_address', $address->billing_address) == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-1 text-md font-medium text-gray-700">No</div>
                        <div class="col-2 flex items-center">
                            <input type="radio" id="billing_address" name="billing_address" value="0" class="form-control" {{ old('billing_address', $address->billing_address) == '0' ? 'checked' : '' }}>
                        </div>
                    </div>
   
                    @endif

                    <!-- Campos Ocultos -->
                    <input type="hidden" name="client_id" value="{{ $address->client_id }}">
                    @if(isset($origin->unit_id))
                        <input type="hidden" name="unit_id" value="{{ $origin->unit_id }}">
                    @endif
                    @if(isset($origin->contact_id))
                        <input type="hidden" name="contact_id" value="{{ $origin->contact_id }}">
                    @endif
                </div>

                <!-- Acciones del Formulario -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="submit">Guardar Cambios</button>
                    <a type="button" class="py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2" href="{{ url()->previous() }}">Cancelar</a>
                </div>

                <hr class="my-2">

                <div class="eagle-button-container col-12"><b>* Campos Obligatorios</b></div>
            </section>
        </form>
    </div>
</div>

@endsection

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

        // Trigger initial update on page load
        updateCountyOptions(provinceSelect.value);
        updateCityOptions(countySelect.value);
    });
</script>
