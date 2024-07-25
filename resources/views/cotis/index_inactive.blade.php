@extends('layouts.app')

@section('title', 'Cotizaciones')

@section('content')

@inject('saleTerms', 'App\Services\SalesTermsCoti')
@inject('clients', 'App\Services\Clients')
@inject('argCurr', 'App\Services\ArgCurr')

<div class="container eagle-container">

  <div class="jumbotron eagle-jumbotron-2">
    <div class="row eagle-row" style="margin: 0; padding: 0 1rem 0 1rem">
      <h1 class="col-8 eagle-h2" style="display: flex; align-items: center; padding: 0">Cotizaciones Cerradas</h1>
      <div class="eagle-button-container col-2">
        <a class="col-8 btn eagle-button" href="{{ route('cotis.create') }}">Crear Cotización</a>
      </div>
      <div class="eagle-button-container col-2">
        <a class="col-8 btn eagle-button" href="{{ url()->previous() }}">Volver</a>
      </div>
    </div>
  </div>


  <div class="row eagle-row-clean" style="position: relative; top: 0.25rem">

    <div class="col-12 container">
      <table class="table table-striped index-table order-column" id="index-table">

        <thead>
          <tr>
            <th width=5% class="model_table">ID</th>            
            <th width=6% class="model_table">Vendedor</th>
            <th width=15% class="model_table">Cliente</th>
            <th width=12% class="model_table">Contacto</th>
            <th width=12% class="model_table">Tel</th>
            <th width=15% class="model_table">Email</th> 
            <th width=6% class="model_table">Fecha</th>
            <th width=6% class="model_table">Moneda</th>
            <th width=6% class="model_table">Monto</th>
            <th width=6% class="model_table">Pot. Cotizada</th>
            <th width=6% class="model_table">Status</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($cotis as $coti)
            <tr>
              <td width=5% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{$coti->id}}</a></td>              
              <td width=6% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{$coti->user->alias}}</a></td>
              <td width=15% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{$coti->client->commercial_name}}</a></td>
              <td width=12% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{$coti->contact_id ? $coti->contact->name : ""}}</a></td>
              <td width=12% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{$coti->contact_id ? $coti->contact->cell_phone : ""}}</a></td>
              <td width=15% class="model_table"><a href="mailto: {{$coti->contact_id ? $coti->contact->email : "" }}?subject=Cotización RB Energía">{{$coti->contact_id ? $coti->contact->email : ""}}</a></td>
              <td width=6% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{$coti->date()}}</a></td>
              <td width=6% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{$argCurr->retrieve($coti->quote_curr)}}</a></td>   
              <td width=6% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{$coti->cot_value}}</a></td>   
              <td width=6% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{ implode(', ', $coti->cot_power_array) }}</a></td>
              <td width=6% class="model_table"><a class="eagle-link" href="/cotis/show/{{$coti->id}}">{{$coti->show_status}}</a></td>           
            </tr>     
          @endforeach
        </tbody>  

      </table>    
    </div> <!-- end of 2nd column -->

  </div> <!-- end of main row -->
  
</div> <!-- end of container -->

@endsection

@section('script')

  <script>

    var prices = document.querySelectorAll(".price")
    prices.forEach(function(price){
      price.innerText = Number(price.innerText).toFixed(0)
      price.innerText = Number(price.innerText).toLocaleString("es-ES", { maximumFractionDigits: 0, minimumFractionDigits: 0})
    });

    var els = document.getElementsByClassName('color_change');
      for (var i = 0; i < els.length; i++) {
        var cell = els[i];
        var content = cell.textContent;
        var trimmed_content = content.trim();

        if (trimmed_content == 'Atrasado' || trimmed_content == 'PP Atrasado') {          
          cell.classList.remove('green');
          cell.classList.add('red');
        } else if (trimmed_content == 'Al día' || trimmed_content == 'PP al día') {
          cell.classList.remove('red');
          cell.classList.add('green');
        } else {
          cell.classList.remove('red');
          cell.classList.remove('green');
        }
      }

      $(document).ready(function() {
        $('#index-table').DataTable( {
          "columnDefs": [
                          { type: 'date-uk', targets: 4 }
                        ],
          "order": [4, "desc"],
          "paging": false,
          "scrollY": '65vh',
          "language": {
            "search": "Buscar:",
            "info": "_TOTAL_ registros en total",
            "infoFiltered": "filtrado de _MAX_ entradas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas"
           }
        });
      });

  </script>

@endsection