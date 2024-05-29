@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')





<div class="container eagle-container">
  
    <div id="modalAddClient" class="inset-0  flex justify-center items-center ">
        <!-- Modal Dialog -->
        <div class="bg-white rounded-lg w-full max-w-3xl">
      
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b border-gray-300">
                <h4 class="text-lg font-semibold">Editar Cliente:: {{ $client->legal_name }}</h4>
                <button id="closeModalButton" class="text-gray-500 hover:text-gray-800">&times;</button>
            </div>
      
            <!-- Modal Form -->
            <form method="POST"  action="{{ route('clients.update', ['client' => $client->id]) }}" novalidate autocomplete="off" class="p-4">
                @method('PUT')
                @csrf
            
                <div class="space-y-4">
                    <div class="flex flex-col space-y-2">
                        <label for="legal_name" class="font-medium">Razón Social:</label>
                        <input type="text" id="legal_name" name="legal_name" placeholder="{{$client->legal_name}}" value="{{$client->legal_name}}" class="form-input w-full border border-gray-300 rounded p-2{{ $errors->has('legal_name') ? ' border-red-500' : '' }}">
                        @if ($errors->has('legal_name'))
                            <span class="text-red-500 text-sm">Debe especificar la razón social del cliente.</span>
                        @endif
                    </div>
            
                    <div class="flex flex-col space-y-2">
                        <label for="commercial_name" class="font-medium">Nombre Comercial:</label>
                        <input type="text" id="commercial_name" name="commercial_name" placeholder="{{$client->commercial_name}}" value="{{ $client->commercial_name }}" class="form-input w-full border border-gray-300 rounded p-2">
                    </div>
            
                    <div class="flex flex-col space-y-2">
                        <label for="cuit_type" class="font-medium">Tipo de ID Fiscal:</label>
                        <select id="cuit_type" name="cuit_type" class="form-select w-full border border-gray-300 rounded p-2{{ $errors->has('cuit_type') ? ' border-red-500' : '' }}">
                            @foreach($cuit_typeArray as $index => $onecuit_typeArray)
                                <option value="{{ $index }}" {{ $client->cuit_type == $index ? 'selected' : '' }}>{{ $onecuit_typeArray }}</option>
                            @endforeach
                        </select>
                        
                        @if ($errors->has('cuit_type'))
                            <span class="text-red-500 text-sm">Debe ingresar tipo de ID fiscal.</span>
                        @endif
                    </div>
                    
            
                    <div class="flex flex-col space-y-2">
                        <label for="cuit_num" class="font-medium">CUIT/RUT:</label>
                        <input type="text" id="cuit_num" name="cuit_num" placeholder="{{$client->cuit_num}}" value="{{ $client->cuit_num}}" class="form-input w-full border border-gray-300 rounded p-2{{ $errors->has('cuit_num') ? ' border-red-500' : '' }}">
                        @if ($errors->has('cuit_num'))
                            <span class="text-red-500 text-sm">Debe especificar el CUIT del cliente y no debe estar repetido.</span>
                        @endif
                    </div>
            
                    <div class="flex flex-col space-y-2">
                        <label for="vat_status" class="font-medium">Condición frente al IVA:</label>
                        <select id="vat_status" name="vat_status" class="form-select w-full border border-gray-300 rounded p-2{{ $errors->has('vat_status') ? ' border-red-500' : '' }}">
                            @foreach($vatArray as $index => $oneVatArray)
                                <option value="{{ $index }}" {{ $client->vat_status == $index ? 'selected' : '' }}>{{ $oneVatArray }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('vat_status'))
                            <span class="text-red-500 text-sm">Debe especificar la condición frente al IVA del cliente.</span>
                        @endif
                    </div>
            
                    <div class="flex flex-col space-y-2">
                        <label for="sales_tax_rate" class="font-medium">Perc. IIBB [%]:</label>
                        <input type="text" id="sales_tax_rate" name="sales_tax_rate" placeholder="{{$client->sales_tax_rate}}" value="{{$client->sales_tax_rate }}" class="form-input w-full border border-gray-300 rounded p-2{{ $errors->has('sales_tax_rate') ? ' border-red-500' : '' }}">
                        @if ($errors->has('sales_tax_rate'))
                            <span class="text-red-500 text-sm">Debe especificar alícuota de IIBB.</span>
                        @endif
                    </div>
            
                    <div class="flex flex-col space-y-2">
                        <label for="payment_terms" class="font-medium">Condición de Venta:</label>
                        <select id="payment_terms" name="payment_terms" class="form-select w-full border border-gray-300 rounded p-2{{ $errors->has('payment_terms') ? ' border-red-500' : '' }}">
                            @foreach($payment_termsArray as $index => $onePayment_termsArray)
                                <option value="{{ $index }}"{{ $client->payment_terms == $index ? 'selected' : '' }}>{{ $onePayment_termsArray }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('payment_terms'))
                            <span class="text-red-500 text-sm">Debe especificar la condición de venta.</span>
                        @endif
                    </div>
                </div>
            
                <div class="flex justify-between items-center mt-4">
                    <div class="space-x-2">
                        <button type="submit" class="bg-rental text-white font-bold py-2 px-4 rounded hover:bg-rentallight">Agregar</button>
                        <button type="button" id="cancelModalButton" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-700">Cancelar</button>
                    </div>
                </div>
            </form>
            
      
        </div>
      </div>

</div>


@endsection