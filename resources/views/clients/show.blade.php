@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

@inject('industries', 'App\Services\Industries')
@inject('provinces', 'App\Services\Provinces')



<div class="relative border-b bg-rentalgrey border-gray-200 pb-5 sm:pb-0 px-8 pt-6">

  <div class="md:flex md:items-center md:justify-between">
    <h3 class="text-4xl font-semibold leading-6 text-gray-200">Cliente:  <span class="ml-2 text-3xl font-semibold leading-6 text-white">{{$client->legal_name}}</span></h3>
  
    <div class="mt-3 flex md:absolute md:right-0 md:top-3 md:mt-0">
    <!--  <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Share</button>
      <button type="button" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>-->
    </div>
  </div>
  <div class="mt-4">
    <!-- Dropdown menu on small screens -->
    <div class="sm:hidden">
      <label for="current-tab" class="sr-only">Select a tab</label>
      <select id="current-tab" name="current-tab" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
        <option>Applied</option>
        <option>Phone Screening</option>
        <option selected>Interview</option>
        <option>Offer</option>
        <option>Hired</option>
      </select>
    </div>

    
    <!-- Tabs at small breakpoint and up -->
    <div class="hidden sm:block mt-6">
  
        <nav class="flex space-x-8 mb-2">
          <a href="#" class="tab-link @if (session('contactAdded')) @else active @endif border-rentallight text-white font-bold whitespace-nowrap border-b-4 px-1 pb-0 text-sm" data-tab="tab-datos">Datos</a>
          <a href="#" class="tab-link @if (session('contactAdded')) active @endif border-transparent text-white hover:border-gray-300 whitespace-nowrap border-b-2 px-1 pb-0 text-md font-medium" data-tab="tab-contactos">Contactos</a>
          <a href="#" class="tab-link border-transparent text-white hover:border-gray-300 whitespace-nowrap border-b-2 px-1 pb-0 text-md font-medium" data-tab="tab-direcciones">Direcciones</a>
          <a href="#" class="tab-link border-transparent text-white hover:border-gray-300  whitespace-nowrap border-b-2 px-1 pb-0 text-md font-medium" data-tab="tab-alquileres">Alquileres</a>
          <a href="#" class="tab-link border-transparent text-white hover:border-gray-300 whitespace-nowrap border-b-2 px-1 pb-0 text-md font-medium" data-tab="tab-comentarios">Comentarios</a>
      </nav>
        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
      
    
    </div>
  </div>
</div>
@if (session('success'))
<div class="bg-rentallight text-white p-4 rounded mb-4 ">
    {{ session('success') }}
</div>
@endif
<div id="tab-datos" class="tab-content @if (session('contactAdded')) @else active @endif">
  <div id="datos" class="mt-8 px-8 m-auto " >
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class=" text-xl font-medium text-gray-700">
                Número de Cliente:
            </label>
            <input class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="{{$client->id}}" readonly>
        </div>
        <div>
            <label class=" text-xl font-medium text-gray-700">
                Razón Social:
            </label>
            <input class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="{{$client->legal_name}}" readonly>            
        </div>
        <div>
            <label class=" text-xl font-medium text-gray-700">
                Nombre comercial:
            </label>
            <input class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="{{$client->commercial_name}}" readonly>         
        </div>
        <div>
            <label class="block text-xl font-medium text-gray-700">
                Tipo ID Fiscal:
            </label>
            @if($client->cuit_type === 1)
                <input class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="CUIT" readonly>
            @elseif($client->cuit_type === 2)
                <input class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="CUIL" readonly>
            @elseif($client->cuit_type === 3)
                <input class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="RUT" readonly>
            @endif
        </div>
        <div>
            <label class="block text-xl font-medium text-gray-700">
                CUIT/RUT:
            </label>
            <input id="cuit_num" name="cuit_num" class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="{{$client->cuit_num}}" readonly>
        </div>
        <div>
            <label class="block text-xl font-medium text-gray-700">
                Condición frente al IVA:
            </label>
            <input class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="{{$client->vat_status}}" readonly> 
        </div>
        <div>
            <label class="block text-xl font-medium text-gray-700">
                Alícuota IIBB:
            </label>
            <input class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="{{$client->sales_tax_rate}}" readonly>
        </div>
        <div>
            <label class="block text-xl font-medium text-gray-700">
                Condición de venta:
            </label>
            <input class="mt-1 mb-2 w-full  sm:text-lg  rounded-md" value="{{$client->payment_terms}}" readonly>
        </div>
    </div>
   
    <div class="flex justify-end">
        <a type="button" href="/clients/{{$client->id}}/edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Editar</a>
    </div>
</div>

</div>


<div id="tab-contactos" class="tab-content @if (session('contactAdded'))  active @endif">
  <div id="contactos" class="tab-pane fade p-4 bg-white shadow-md rounded-lg">
    <div class="flex justify-end mb-6">
     <!-- <a href="/contacts/create_client_contact/{{$client->id}}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-rental hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-offset-2 ">Agregar Contacto</a>-->
      <div class="flex justify-end mt-6">
        <button class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" onclick="toggleModal()">Agregar Contacto</button>
    </div>
  </div>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-50">
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Nombre</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Puesto</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Email</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Celular</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Fijo</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Interno</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $oneContact)
                <tr class="text-center border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-2 px-4 text-sm text-gray-600">{{$oneContact->name}}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">{{$oneContact->position}}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">{{$oneContact->email}}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">{{$oneContact->cell_phone}}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">{{$oneContact->phone}}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">{{$oneContact->extension}}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">
                        @if($oneContact->deactivate === 0)
                            <a href="/contacts/{{$oneContact->id}}/edit" class="inline-block text-rental hover:text-indigo-900 text-xs font-medium">Ver/Editar</a>
                        @else
                            <a href="/contacts/{{$oneContact->id}}/edit" class="inline-block text-rental hover:text-indigo-900 text-xs font-medium">Ver/Editar/Reactivar</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
  
</div>

</div>
<div id="tab-interview" class="tab-content">
  <!-- Interview Tab Content Here --> 3
</div>
<div id="tab-direcciones" class="tab-content">
  <!-- Direcciones Tab Content Here --> 4 
</div>
<div id="tab-alquileres" class="tab-content">
  <!-- Alquileres Tab Content Here -->5 
</div>
<div id="tab-comentarios" class="tab-content">
  <!-- Comentarios Tab Content Here -->6 
</div>






@include('clients.partials.add_contact_modal')

















<div class="container eagle-container col d-flex justify-content-center">

  <br>

  <div class="card eagle-card-table col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">

    <div class="card-header eagle-card-header">

      <div class="card-header eagle-card-header">
        <div class="row eagle-row">
          <h3 class="eagle-h3 col-8">Cliente: {{$client->legal_name}}</h3>
          <!--<div class="eagle-button-container col-4">
            <a type="button" class="btn eagle-button" href="/clients/cc/{{$client->id}}">Cuenta Corriente</a>
          </div>-->
        </div>
      </div>

      <ul class="nav nav-tabs card-header-tabs" id="client_tabs">
        <li class="nav-item">
          <a class="navlink eagle active" style="padding: 0.25rem 0.5rem" data-toggle="tab" href="#datos" id="data_tab">Datos</a>
        </li>
        <li class="nav-item">
          <a class="navlink eagle" style="padding: 0.25rem 0.5rem" href="#contactos" data-toggle="tab" id="contacts_tab">Contactos</a>
        </li>
        <li class="nav-item">
          <a class="navlink eagle" style="padding: 0.25rem 0.5rem" href="#direcciones" data-toggle="tab" id="addresses_tab">Direcciones</a>
        </li>
        <li class="nav-item">
          <a class="navlink eagle"  style="padding: 0.25rem 0.5rem" href="#historial" data-toggle="tab" id="history_tab">Alquileres</a>
        </li>
        <li class="nav-item">
          <a class="navlink eagle" style="padding: 0.25rem 0.5rem" href="#comentarios" data-toggle="tab" id="comments_tab">Comentarios</a>
        </li>
      </ul>

    </div> <!-- end of card header -->
    
      <div class="card-body eagle-card-body">
        <div class="tab-content container-fluid" style="padding: 0.25rem">

          <div class="tab-pane container active" id="datos" style="padding: 0.25rem">
            <div class="form-group row eagle-row">
              <label class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-form-label eagle-label-box">
                Número de Cliente:
              </label>
              <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="{{$client->id}}" readonly>
            </div>
            <div class="form-group row eagle-row">
              <label class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-form-label eagle-label-box">
                Razón Social:
              </label>
              <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="{{$client->legal_name}}" readonly>            
            </div>
            <div class="form-group row eagle-row">
              <label class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-form-label eagle-label-box">
                Nombre comercial:
              </label>
              <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="{{$client->commercial_name}}" readonly>         
            </div>
          
   
            <div class="form-group row eagle-row">
              <label class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-form-label eagle-label-box">
                Tipo ID Fiscal:
              </label>
              @if($client->cuit_type === 1)
                <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="CUIT" readonly>
              @elseif($client->cuit_type === 2)
                <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="CUIL" readonly>
              @elseif($client->cuit_type === 3)
                <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="RUT" readonly>
              @endif
            </div>
            <div class="form-group row eagle-row">
              <label class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-form-label eagle-label-box">
                CUIT/RUT:
              </label>
              <input id="cuit_num" name="cuit_num" class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="{{$client->cuit_num}}" readonly>
            </div>
            <div class="form-group row eagle-row">
              <label class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-form-label eagle-label-box">
                Condición frente al IVA:
              </label>
               <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="{{$client->vat_status}}" readonly> 
            </div>
            <div class="form-group row eagle-row">
              <label class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-form-label eagle-label-box">
                Alícuota IIBB:
              </label>
               <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="{{$client->sales_tax_rate}}" readonly>
            </div>
            <div class="form-group row eagle-row">
              <label class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-form-label eagle-label-box">
                Condición de venta:
              </label>
              <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="{{$client->payment_terms}}" readonly>
            </div>
            <hr>
            <div class="eagle-button-container col-2">
              <a type="button" class="btn eagle-button" href="/clients/{{$client->id}}/edit">Editar</a>
            </div>
      </div> <!-- end of data tab DONZO-->
    

      <div class="tab-pane container fade eagle-card-body-table"  id="contactos">
        <table class="table table-striped">

          <tr style="text-align: center">
            <th class="model_table">Nombre</th>
            <th class="model_table">Puesto</th>
            <th class="model_table">Email</th>
            <th class="model_table">Celular</th>
            <th class="model_table">Fijo</th>
            <th class="model_table">Interno</th>
            <th class="model_table"></th>
          </tr>

          @foreach ($contacts as $oneContact)
          <tr style="text-align: center">
              <td class="eagle-td">{{$oneContact->name}}</td>
              <td class="eagle-td">{{$oneContact->position}}</td>
              <td class="eagle-td">{{$oneContact->email}}</td>
              <td class="eagle-td">{{$oneContact->cell_phone}}</td>
              <td class="eagle-td">{{$oneContact->phone}}</td>
              <td class="eagle-td">{{$oneContact->extension}}</td>
              <td style="text-align: center">
                  @if($oneContact->deactivate === 0)
                  <a type="button" class="btn eagle-button" style="font-size: 0.5rem; padding: 0.25rem"
                      href="/contacts/{{$oneContact->id}}/edit">Ver/Editar</a>
                  @else
                  <a type="button" class="btn eagle-button" style="font-size: 0.5rem; padding: 0.25rem"
                      href="/contacts/{{$oneContact->id}}/edit">Ver/Editar/Reactivar</a>
                  @endif
              </td>
          </tr>
          
          <!-- update contact modal -->
          <div class="modal" id="modalUpdateContact-{{$oneContact->id}}">
              <div class="modal-dialog modal-lg">
                  <!-- Modal content-->
                  <div class="modal-content">
          
                      <div class="modal-header eagle-modal-header">
                          <h4 class="modal-title">Editar Contacto:</h4>
                      </div>
          
                      <form action="{{ route('contacts.update', ['contact' => $oneContact->id]) }}" method="POST" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
          
                          <div class="modal-body modal-form">
                              <div class="container-fluid eagle-container">
                                  <div class="form-group row eagle-row-flex">
                                      <label for="name"
                                          class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, col-form-label form-label-modal">Nombre:</label>
                                      <input type="text" name="name" value="{{$oneContact->name}}"
                                          class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control form-control-modal"
                                          readonly>
                                  </div>
                                  <!-- Add other form fields as needed -->
                              </div>
                          </div>
          
                          <div class="modal-footer">
                              <button class="btn eagle-button col-2" type="submit">Actualizar</button>
                              <button type="button" class="btn eagle-button col-2" data-dismiss="modal">Volver</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <!-- end of update contact modal -->
          @endforeach
          
          </table>
          <hr>
          <div class="eagle-button-container col-2">
            <a type="button" class="btn eagle-button" href="/contacts/create_client_contact/{{$client->id}}">Agregar Contacto</a>
          </div>
        </div> <!-- end of contact pane -->
        

        <!-- ADDRESS PANE -->
        <div class="tab-pane container fade eagle-card-body-table" id="direcciones">
          <table class="table table-striped">

            <tr style="text-align: center">
              <th class="model_table">Línea 1</th>
              <th class="model_table">Línea 2</th>
              <th class="model_table">Ciudad/Localidad</th>
              <th class="model_table">Código Postal</th>
              <th class="model_table">Partido</th>
              <th class="model_table">Provincia</th>
           
              <th class="model_table">Facturación?</th>
              <th class="model_table"></th>
            </tr>

            @foreach ($addresses as $oneAddress)
            <tr style="text-align: center">
              <td class="eagle-td">{{$oneAddress->line1}}</td>
              <td class="eagle-td">{{$oneAddress->line2}}</td>
              @if(isset($oneAddress->city_id))
                <td class="eagle-td">{{$oneAddress->city->value}}</td>
              @elseif(isset($oneAddress->city_name))
                <td class="eagle-td">{{$oneAddress->city_name}}</td>
              @else
                <td class="eagle-td"></td>
              @endif
              <td class="eagle-td">{{$oneAddress->zip_code}}</td>
              @if(isset($oneAddress->county_id))
                <td class="eagle-td">{{$oneAddress->county->value}}</td>
              @elseif(isset($oneAddress->county_name))
                <td class="eagle-td">{{$oneAddress->county_name}}</td>
              @else
                <td class="eagle-td"></td>
              @endif
              @if(isset($oneAddress->province->value))
                <td class="eagle-td">{{$oneAddress->province->value}}</td>
              @else
                <td class="eagle-td"></td>
              @endif
           
              @if($oneAddress->billing_address === 1)
                <td class="eagle-td" style="text-align: center">Si</td>
              @elseif($oneAddress->billing_address === 0)
                <td class="eagle-td" style="text-align: center">No</td>
              @endif
              <!--<td>
                <a type="button" class="btn eagle-button" style="font-size: 0.5rem; padding: 0.25rem" href="/addresses/{{$oneAddress->id}}/edit">Editar</a>
              </td>-->
            </tr>

            @endforeach

          </table>

          <hr>

        <div class="eagle-button-container col-2">
          <a type="button" class="btn eagle-button" href="/addresses/create_client_address/{{$client->id}}">Agregar Dirección</a>
        </div>

        </div> <!-- end of address tab -->

        <!-- HISTORY PANE -->

       


        <!-- Comments PANE -->
        <div class="tab-pane container fade eagle-card-body-table" id="comentarios">

          <table class="table table-striped">
            <tr style="text-align: center">
              <th width="20%">Fecha</th>
            
              <th width="60%">Comentarios</th>
            </tr>

            @foreach ($comments as $oneComment)
              <tr style="text-align: center">
                <td>{{$oneComment->created_at()}}</td>
               
                <td>{{$oneComment->comment}}</td>
              </tr>
            @endforeach
          </table>

          <hr>
          <button type="button" class="btn eagle-button" data-toggle="modal" data-target="#modalAddComment-{{$client->id}}">Agregar Comentario</button>
        </div>

      </div>
    </div>
</div> <!-- end of card -->

<br>


<!-- update client modal -->
<div class="modal hidden" id="modalUpdateClient-{{$client->id}}">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header eagle-modal-header">
        <h4 class="modal-title">Editar Cliente:</h4>
      </div>

      <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    
        <div class="modal-body modal-form">
            <div class="container-fluid eagle-container">
                <div class="form-group row eagle-row-flex">
                    <label for="id" class="col-4 col-form-label form-label-modal">Número de Cliente:</label>
                    <input type="text" name="id" value="{{ $client->id }}" class="col-8 form-control form-control-modal" readonly>
                </div>
                <div class="form-group row eagle-row-flex">
                    <label for="legal_name" class="col-4 col-form-label form-label-modal">Razón Social:</label>
                    <input type="text" name="legal_name" value="{{ $client->legal_name }}" class="col-8 form-control form-control-modal">
                </div>
                <div class="form-group row eagle-row-flex">
                    <label for="commercial_name" class="col-4 col-form-label form-label-modal">Nombre Comercial:</label>
                    <input type="text" name="commercial_name" value="{{ $client->commercial_name }}" class="col-8 form-control form-control-modal">
                </div>
                <!-- Add other form fields as needed -->
            </div>
        </div>
    
        <div class="modal-footer">
            <button class="btn eagle-button col-2" type="submit">Actualizar</button>
            <button type="button" class="btn eagle-button col-2" data-dismiss="modal">Cancelar</button>
        </div>
    </form>
    

    </div>
  </div>
</div> <!-- end of update client modal -->

<!-- add contact modal -->
<div class="modal hidden hide fade" id="modalAddContact-{{$client->id}}" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header eagle-modal-header">
        <h4 class="modal-title">Agregar Contacto:</h4>
      </div>

      <form method="POST" id="contactModalForm" action="{{ route('contacts.store') }}" autocomplete="off">
        @csrf
    
        <div class="modal-body modal-form">
            <div class="container-fluid eagle-container">
                <div class="form-group row eagle-row-flex">
                    <label for="name" class="col-4 col-form-label form-label-modal">Nombre y Apellido*:</label>
                    <input id="name" type="text" name="name" class="col-8 form-control form-control-modal{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
    
                    @if ($errors->has('name'))
                        <span class="invalid-feedback col-8 offset-4" role="alert">
                            <strong>Debe ingresar el nombre</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row eagle-row-flex">
                    <label for="position" class="col-4 col-form-label form-label-modal">Puesto:</label>
                    <input type="text" name="position" class="col-8 form-control form-control-modal">
                </div>
                <div class="form-group row eagle-row-flex">
                    <label for="email" class="col-4 col-form-label form-label-modal">E-mail:</label>
                    <input type="email" name="email" class="col-8 form-control form-control-modal">
                </div>
                <div class="form-group row eagle-row-flex">
                    <label for="cell_phone" class="col-4 col-form-label form-label-modal">Celular:</label>
                    <input type="text" name="cell_phone" class="col-8 form-control form-control-modal">
                </div>
                <div class="form-group row eagle-row-flex">
                    <label for="phone" class="col-4 col-form-label form-label-modal">Teléfono fijo:</label>
                    <input type="text" name="phone" class="col-8 form-control form-control-modal">
                </div>
                <div class="form-group row eagle-row-flex">
                    <label for="extension" class="col-4 col-form-label form-label-modal">Interno:</label>
                    <input type="text" name="extension" class="col-8 form-control form-control-modal">
                </div>
                <input type="hidden" name="client_id" value="{{ $client->id }}">
            </div>
        </div>
    
        <div class="modal-footer">
            <button class="btn eagle-button col-2" type="submit">Agregar</button>
            <button type="button" class="btn eagle-button col-2" data-dismiss="modal">Cancelar</button>
        </div>
    </form>
    

    </div>
  </div>
</div> <!-- end of add contact modal -->


<!-- add comment modal -->
<div class="modal hidden" id="modalAddComment-{{$client->id}}">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header eagle-modal-header">
        <h4 class="modal-title">Agregar Comentario</h4>
      </div>

      <form method="POST" action="{{ route('comments.store') }}">
        @csrf
    
        <div class="modal-body modal-form">
            <div class="container-fluid eagle-container">
                <div class="form-group row eagle-row-flex">
                    <label for="comment" class="col-4 col-form-label form-label-modal">Comentario:</label>
                    <textarea id="comment" name="comment" class="col-8 form-control" rows="5"></textarea>
                </div>
                <input type="hidden" name="client_id" value="{{ $client->id }}">
            </div>
        </div>
    
        <div class="modal-footer">
            <button class="btn eagle-button col-2" type="submit">Agregar</button>
            <button type="button" class="btn eagle-button col-2" data-dismiss="modal">Cancelar</button>
        </div>
    </form>
    

    </div>
  </div>
</div> <!-- end of add address modal -->


</div> <!-- end container -->



<style>
  /* Tab links */
  .tab-link {
      color: white;
      border-bottom: 2px solid transparent;
      padding: 0.5rem 1rem;
      text-decoration: none;
      transition: border-color 0.3s, color 0.3s;
  }
  
  .tab-link.active {
      border-color: #ffffff; 
  }
  

  .tab-content {
      display: none;
  }
  
  .tab-content.active {
      display: block;
  
  }
  
    </style>
  
@endsection




@section('script')

<script>
 /* $(document).ready(function(){

      function cuit_mask() {
        var country_id = $('#country_id').val();
        console.log(country_id);
          if (country_id == 1) {
            $('#cuit_num').mask('99-99999999-9');
          } else if (country == 2) {
            $('#cuit_num').mask('999999999999');
          }
      }
      cuit_mask();

      

      function loadCounty() {
          var province_id = $('#province').val();
          if ($.trim(province_id) != '') {
              $.get('/counties', {province_id: province_id}, function (counties) {

                  var old = $('#county').data('old') != '' ? $('#county').data('old') : '';

                  $('#county').empty();
                  $('#county').append("<option value=''>Seleccione Partido</option>");

                  $.each(counties, function (index, value) {
                      $('#county').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              });
          }
      }
      loadCounty();
      $('#province').on('change', loadCounty);

      function loadCity() {
          var county_id = $('#county').val();
          if ($.trim(county_id) != '') {
              $.get('/cities', {county_id: county_id}, function (cities) {

                  var old = $('#city').data('old') != '' ? $('#city').data('old') : '';

                  $('#city').empty();
                  $('#city').append("<option value=''>Seleccione Localidad/Ciudad</option>");

                  $.each(cities, function (index, value) {
                      $('#city').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              });
          }
      }
      loadCity();
      $('#county').on('change', loadCity);   

  });
*/
  //$("#modalAddContact-{{$client->id}}").modal({"backdrop": "static"});
 /* document.addEventListener("DOMContentLoaded", function() {
    var navLinks = document.querySelectorAll('.navlink');
    navLinks.forEach(function(navLink) {
        navLink.addEventListener('click', function(event) {
            event.preventDefault();
            var tabId = this.getAttribute('href');
            console.log("Clicked tab link:", tabId);
            var tabContent = document.querySelector(tabId);
            if (tabContent) {
                console.log("Tab content found:", tabContent);
                var activeTab = document.querySelector('.tab-pane.active');
                if (activeTab) {
                    console.log("Removing active class from previous active tab:", activeTab);
                    activeTab.classList.remove('active');
                }
                tabContent.classList.add('active');
                tabContent.classList.add('show'); // Added to make the tab content visible
                console.log("Adding active class to current tab:", tabContent);
            } else {
                console.log("Tab content not found:", tabId);
            }
        });
    });
}); */





document.addEventListener("DOMContentLoaded", function() {
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    tabLinks.forEach(function(tabLink) {
      console.log("click")
        tabLink.addEventListener('click', function(event) {
            event.preventDefault();

            const tabId = this.getAttribute('data-tab');
            const activeTab = document.querySelector('.tab-content.active');
            const newActiveTab = document.getElementById(tabId);

            if (activeTab && newActiveTab && activeTab !== newActiveTab) {
                activeTab.classList.remove('active');
                newActiveTab.classList.add('active');
            }

            // Update active class on tab links
            tabLinks.forEach(function(link) {
                link.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
});

</script>

<script>
    function toggleModal() {
        const modal = document.getElementById('contactModal');
        modal.classList.toggle('hidden');
    }

    document.querySelector("#closeModalButton").onclick = function() {
      const modal = document.getElementById('contactModal');
        modal.classList.toggle('hidden');
}
</script>

@endsection



