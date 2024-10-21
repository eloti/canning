@extends('layouts.app')

@section('title', 'Alquileres Activos')

@section('content')

@inject('family', 'App\Services\Family')
@inject('families', 'App\Services\Subfamily')
@inject('brands', 'App\Services\Brand')
@inject('clients', 'App\Services\Clients')

<div class="container eagle-container">

  <div class="jumbotron eagle-jumbotron-2">
    <div class="row eagle-row" style="margin: 0; padding: 0 1rem 0 1rem">
      <h1 class="col-11 eagle-h2" style="display: flex; align-items: center; padding: 0">Alquileres Finalizados</h1>
      <div class="mac-button-container col-1">
        <a class="col-12 btn eagle-button" href="{{ url()->previous() }}">Volver</a>
      </div>
    </div>
  </div>


  <div class="row eagle-row-clean" style="position: relative; top: 0.25rem">

    <div class="col-12 container">
      <table class="table table-striped index-table order-column" id="index-table">

        <thead>
          <tr>
            <th width=5% class="model_table">ID</th>            
            <th width=10% class="model_table">Vendedor</th>
            <th width=10% class="model_table">Tipo</th>
            <th width=10% class="model_table">Cliente</th>
            <th width=10% class="model_table">Modelo</th>
            <th width=10% class="model_table">Cantidad</th>
            <th width=10% class="model_table">Comienzo</th>
            <th width=10% class="model_table">Fin</th> 
            
          </tr>
        </thead>

        <tbody>
          @foreach ($rentals as $rental)
            <tr>
              <td width=5% class="model_table"><a class="eagle-link" href="/rental/{{$rental->id}}">{{$rental->id}}</a></td>   
              <td width=10% class="model_table"><a class="eagle-link" href="/rental/{{$rental->id}}">{{$rental->user->alias}}</a></td>
              <td width=10% class="model_table"><a class="eagle-link" href="/rental/{{$rental->id}}">{{$rental->rental_type}}</a></td>
              <td width=10% class="model_table"><a class="eagle-link" href="/rental/{{$rental->id}}">{{$rental->client->commercial_name}}</a></td>
              <td width=10% class="model_table"><a class="eagle-link" href="/rental/{{$rental->id}}">{{$rental->unitModel->model}}</a></td>
              <td width=10% class="model_table"><a class="eagle-link" href="/rental/{{$rental->id}}">{{$rental->quantity}}</a></td>
              <td width=10% class="model_table"><a class="eagle-link" href="/rental/{{$rental->id}}">{{$rental->start_date()}}</a></td>
              <td width=10% class="model_table"><a class="eagle-link" href="/rental/{{$rental->id}}">{{$rental->end_date()}}</a></td>            
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