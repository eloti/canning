@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

@inject('industries', 'App\Services\Industries')
@inject('provinces', 'App\Services\Provinces')

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
                País:
              </label>
              <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control eagle-input-2" value="{{$client->country->value}}" readonly>
             
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
      </div> <!-- end of data tab -->
    

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

        <div class="tab-pane container fade eagle-card-body-table" id="historial">

          @if ($rentals->isNotEmpty())

          <h3>Alquileres</h3>

          <table class="table table-striped">
            <tr style="text-align: center">
              <th>N° Op</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Int.</th>
              <th>Subfamilia</th>
              <th>Modelo</th>
              <th>Facturado</th>
            </tr>

            @foreach ($rentals as $oneRental)
              <tr style="text-align: center">
                <td>{{$oneRental->id}}</td>
                <td>{{$oneRental->start_date()}}</td>
                <td>{{$oneRental->end_date()}}</td>
                <td>{{ isset($oneRental->unit->unit_number) ? $oneRental->unit->unit_number : 'R2R'}}</td>
                <td>{{$oneRental->unit->machineModel->subfamily->value}}</td>
                <td>{{$oneRental->unit->machineModel->brand->value}} {{$oneRental->unit->machineModel->value}}</td>
                <td>{{$oneRental->net_rental_price}}</td>
              </tr>
            @endforeach
          </table>

          <hr>

          @endif

        </div> <!-- end of history pane -->


        <!-- Comments PANE -->
        <div class="tab-pane container fade eagle-card-body-table" id="comentarios">

          <table class="table table-striped">
            <tr style="text-align: center">
              <th width="20%">Fecha</th>
              <th width="20%">Autor</th>
              <th width="60%">Comentarios</th>
            </tr>

            @foreach ($comments as $oneComment)
              <tr style="text-align: center">
                <td>{{$oneComment->created_at()}}</td>
                <td>{{$oneComment->user->alias}}</td>
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
<div class="modal" id="modalUpdateClient-{{$client->id}}">
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
<div class="modal hide fade" id="modalAddContact-{{$client->id}}" role="dialog" aria-hidden="true">
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
<div class="modal" id="modalAddComment-{{$client->id}}">
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
  document.addEventListener("DOMContentLoaded", function() {
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
});

</script>

@endsection

