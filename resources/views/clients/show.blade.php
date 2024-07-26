@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

@inject('industries', 'App\Services\Industries')
@inject('provinces', 'App\Services\Provinces')


<div class="relative border-b bg-rentalgrey border-gray-200 pb-5 sm:pb-0 px-8 pt-6">

  <div class="md:flex md:items-center md:justify-between">
    <h3 class="text-4xl font-semibold leading-6 text-gray-200">Cliente:  <span class="ml-2 text-3xl font-semibold leading-6 text-white">{{$client->commercial_name}}</span></h3>
  
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
          <a href="#" class="tab-link {{ session('contactAdded') ? '' : (session('addressAdded') ? '' : 'active') }} border-rentallight text-white font-bold whitespace-nowrap border-b-4 px-1 pb-0 text-sm" data-tab="tab-datos">Datos</a>
          <a href="#" class="tab-link @if (session('contactAdded')) active @endif border-transparent text-white hover:border-gray-300 whitespace-nowrap border-b-2 px-1 pb-0 text-md font-medium" data-tab="tab-contactos">Contactos</a>
          <a href="#" class=" {{ (session('addressAdded') ? 'active' : '') }} tab-link border-transparent text-white hover:border-gray-300 whitespace-nowrap border-b-2 px-1 pb-0 text-md font-medium" data-tab="tab-direcciones">Direcciones</a>
          <a href="#" class="hidden tab-link border-transparent text-white hover:border-gray-300  whitespace-nowrap border-b-2 px-1 pb-0 text-md font-medium" data-tab="tab-alquileres">Alquileres</a>
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
<div id="tab-datos" class="tab-content  {{ session('commentAdded') || session('contactAdded') || session('addressAdded') ? '' : 'active' }}">
    <div id="datos" class="mt-8 px-8 m-auto">
      <div class="grid grid-cols-2 gap-4">
          <div>
              <label class=" text-xl font-medium text-gray-700">
                  Número de Cliente:
              </label>
              <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="{{$client->id}}" readonly>
          </div>
          <div>
              <label class=" text-xl font-medium text-gray-700">
                  Razón Social:
              </label>
              <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="{{$client->legal_name}}" readonly>            
          </div>
          <div>
              <label class=" text-xl font-medium text-gray-700">
                  Nombre comercial:
              </label>
              <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="{{$client->commercial_name}}" readonly>         
          </div>
          <div>
              <label class="block text-xl font-medium text-gray-700">
                  Tipo ID Fiscal:
              </label>
              @if($client->cuit_type === 1)
                  <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="CUIT" readonly>
              @elseif($client->cuit_type === 2)
                  <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="CUIL" readonly>
              @elseif($client->cuit_type === 3)
                  <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="RUT" readonly>
              @endif
          </div>
          <div>
              <label class="block text-xl font-medium text-gray-700">
                  CUIT/RUT:
              </label>
              <input id="cuit_num" name="cuit_num" class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="{{$client->cuit_num}}" readonly>
          </div>
          <div>
              <label class="block text-xl font-medium text-gray-700">
                  Rubro:
              </label>
              <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="{{$client->rubro}}" readonly>
          </div>
          <div>
              <label class="block text-xl font-medium text-gray-700">
                  Condición frente al IVA:
              </label>
              <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="{{$client->vat_status}}" readonly> 
          </div>
          <div>
              <label class="block text-xl font-medium text-gray-700">
                  Alícuota IIBB:
              </label>
              <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="{{$client->sales_tax_rate}}" readonly>
          </div>
          <div>
              <label class="block text-xl font-medium text-gray-700">
                  Condición de venta:
              </label>
              <input class="mt-1 mb-2 w-full sm:text-lg rounded-md" value="{{$client->payment_terms}}" readonly>
          </div>
      </div>
     
      <div class="flex mt-10">
          <a type="button" href="/clients/{{$client->id}}/edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-rental hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Editar</a>
      </div>
    </div>
  </div>
  


<div id="tab-contactos" class="tab-content @if (session('contactAdded'))  active @endif">
  <div id="contactos" class=" p-4 bg-white shadow-md rounded-lg">
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
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Comentario</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Estado</th>
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
                    <td class="py-2 px-4 text-sm text-gray-600">{{$oneContact->comment}}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">
                        @if($oneContact->deactivate === 0)
                          <p class="text-rental">Activo</p>
                        @else
                          <p class="text-red-500">Inactivo</p>
                        @endif
                    </td>
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
  <!-- Interview Tab Content Here --> 
</div>
<div id="tab-direcciones" class="tab-content  {{ (session('addressAdded') ? 'active' : '') }}">
  <div id="direcciones" class=" p-4 bg-white shadow-md rounded-lg">
    <div class="flex justify-end mb-6">
     <!-- <a href="/contacts/create_client_contact/{{$client->id}}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-rental hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-offset-2 ">Agregar Contacto</a>-->
      <div class="flex justify-end mt-6">
        <button class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" onclick="toggleModalDirection()">Agregar Dirección</button>
        
    </div>
  </div>
  <div class=" container " id="direcciones">
    <table class="min-w-full bg-white border border-gray-200 ">
      <thead>
          <tr class="bg-gray-50">
              <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Línea 1</th>
              <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600 ">Línea 2</th>
              <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600 ">Ciudad/Localidad</th>
              <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600 ">Código Postal</th>
              <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600 ">Partido</th>
              <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600 ">Provincia</th>
              <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600 ">Facturación?</th>
              <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600 "></th>
          </tr>
      </thead>
      <tbody>
          @foreach ($addresses as $oneAddress)
          <tr class="text-center border-b border-gray-200 hover:bg-gray-50">
              <td class="py-2 px-4 text-sm text-gray-600 ">{{$oneAddress->line1}}</td>
              <td class="py-2 px-4 text-sm text-gray-600 ">{{$oneAddress->line2}}</td>
              <td class="py-2 px-4 text-sm text-gray-600">
                  @if(isset($oneAddress->city_id))
                  {{$oneAddress->city->value}}
                  @elseif(isset($oneAddress->city_name))
                  {{$oneAddress->city_name}}
                  @else
                  -
                  @endif
              </td>
              <td class="py-2 px-4 text-sm text-gray-600 eagle-td">{{$oneAddress->zip_code}}</td>
              <td class="py-2 px-4 text-sm text-gray-600 eagle-td">
                  @if(isset($oneAddress->county_id))
                  {{$oneAddress->county->value}}
                  @elseif(isset($oneAddress->county_name))
                  {{$oneAddress->county_name}}
                  @else
                  -
                  @endif
              </td>
              <td class="py-2 px-4 text-sm text-gray-600 eagle-td">
                  @if(isset($oneAddress->province->value))
                  {{$oneAddress->province->value}}
                  @else
                  -
                  @endif
              </td>
              <td class="py-2 px-4 text-sm text-gray-600 eagle-td" style="text-align: center">
                  @if($oneAddress->billing_address === 1)
                  Si
                  @elseif($oneAddress->billing_address === 0)
                  No
                  @endif
              </td>
             <td>
                  
                  <a href="/addresses/{{$oneAddress->id}}/edit" class="inline-block text-rental hover:text-indigo-900 text-xs font-medium">Editar</a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  

    <hr>


</div>
  </div> <!-- end of address tab -->
</div>
<div id="tab-alquileres" class="tab-content">
  <!-- Alquileres Tab Content Here -->5 
</div>
<div id="tab-comentarios" class="tab-content {{ session('commentAdded') ? 'active' : (session('contactAdded') ? '' : (session('addressAdded') ? '' : '')) }} ">
  <!-- Comentarios Tab Content Here -->
  <div id="comentarios" class="p-4 bg-white shadow-md rounded-lg">
    <div class="flex justify-end mb-6">
        <div class="flex justify-end mt-6">
            <button class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" onclick="toggleModalComment()">Agregar Comentario</button>
        </div>
    </div>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-50">
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Usuario</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Fecha</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Comentario</th>
                <th class="py-2 px-4 border-b border-gray-200 text-center text-sm font-medium text-gray-600">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $oneComment)
                <tr class="text-center border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-2 px-4 text-sm text-gray-600">
                        <a href="{{ route('comments.show', $oneComment->id) }}" class="text-blue-500 hover:underline">
                           
                        </a>
                    </td>
                
                    <td class="py-2 px-4 text-sm text-gray-600">{{ $oneComment->comment }}</td>
                    <td class="py-2 px-4 text-sm text-gray-600">
                        <a href="{{ route('comments.edit', $oneComment->id) }}" class="text-rental hover:underline mr-2">Editar</a>
                        <form action="{{ route('comments.destroy', $oneComment->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de que quieres borrar este comentario?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
</div>

</div>






@include('clients.partials.add_contact_modal')
@include('clients.partials.add_direction_modal')
@include('clients.partials.add_comment_modal')



















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


function toggleModalDirection() {
        const modal = document.getElementById('directionModal');
        modal.classList.toggle('hidden');
    }

    document.querySelector("#closeModalButton2").onclick = function() {
      const modal = document.getElementById('directionModal');
        modal.classList.toggle('hidden');
}

function toggleModalComment() {
        const modal = document.getElementById('commentModal');
        modal.classList.toggle('hidden');
    }

    document.querySelector("#closeModalButton3").onclick = function() {
      const modal = document.getElementById('commentModal');
        modal.classList.toggle('hidden');
}

document.querySelector("#cancelModalButton3").onclick = function() {
      const modal = document.getElementById('commentModal');
        modal.classList.toggle('hidden');
}

document.querySelector("#cancelModalButton2").onclick = function() {
      const modal = document.getElementById('directionModal');
        modal.classList.toggle('hidden');
}
</script>

@endsection



