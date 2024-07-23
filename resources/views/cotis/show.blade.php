@extends('layouts.app')

@section('title', 'Coti Nº'.$coti->id)

@section('content')

@inject('cotiItems', 'App\Services\CotiItems')
@inject('clients', 'App\Services\Clients')
@inject('argCurr', 'App\Services\ArgCurr')
@inject('salesTermsCoti', 'App\Services\SalesTermsCoti')
@inject('regimes', 'App\Services\Regime')
@inject('units', 'App\Services\Units')
@inject('frequencies', 'App\Services\Frequency')
@inject('rejectionTypes', 'App\Services\RejectionTypes')
@inject('cotiOps', 'App\Services\CotiOptionals')



<div class="container eagle-container">

  <div class="jumbotron eagle-jumbotron-2">
    <div class="row eagle-row" style="margin: 0; padding: 0">

      <h1 class="col-3 eagle-h2" style="display: flex; align-items: center; padding: 0">Cotización Nº{{$coti->id}}</h1>

      <h1 class="col-3 eagle-h2" style="display: flex; align-items: center; padding: 0">Status: {{$status}}</h1>      

      @if($status === "Vigente")
        <div class="eagle-button-container col-1">
          <a class="col-8 btn eagle-button" style="color: white;" data-toggle="modal" data-target="#modalAccept">Aceptar</a>
        </div>
        <div class="eagle-button-container col-1">
          <a class="col-8 btn eagle-button" style="color: white;" data-toggle="modal" data-target="#modalReject">Rechazar</a>
        </div>
        <div class="eagle-button-container col-1">
          <a class="col-8 btn eagle-button" href="{{action('App\Http\Controllers\CotiController@edit', $coti->id)}}">Editar</a>
        </div>
      @else
        <div class="eagle-button-container col-3">
        </div>
      @endif

      <div class="eagle-button-container col-1">
        </div>

      <div class="eagle-button-container col-1">
        <a class="col-8 btn eagle-button" href="{{action('App\Http\Controllers\CotiController@downloadPDF', $coti->id)}}">PDF</a>
      </div>

      <div class="eagle-button-container col-1">
        <a class="col-8 btn eagle-button" href="{{ url()->previous() }}">Volver</a>
      </div>
    </div>
  </div>
  

  <div class="row eagle-row" style="font-size: 0.8rem">

      <section class="col-12 row" style="margin: 0; padding: 0">

        <div class="col-2 sidebar-container"> <!-- 1st column -->

          @if(auth()->check())
            <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
          @endif

          <div class="row eagle-row-clean col-12">
            <label for="client" class="mac-label col-4">Vendedor:</label>        
            <input class="col-8 form-control mac-form-control" value="{{$coti->user->alias}}" readonly>             
          </div>

          <div class="row eagle-row-clean col-12">
            <label for="client" class="mac-label col-4">Cliente:</label>        
            <input class="col-8 form-control mac-form-control" value="{{$coti->client->legal_name}}" readonly>             
          </div>     

          <div class="row eagle-row-clean col-12">
            <label for="contact" class="mac-label col-4">Contacto:</label>
            <input class="col-8 form-control mac-form-control" value="{{ ($coti->contact_id === 0 || $coti->contact_id === null) ? 'N/A' : $coti->contact->name}}" readonly> 
          </div>

          <div class="row eagle-row-clean col-12">
            <label for="address" class="mac-label col-4">Dirección de entrega:</label>
            <input class="col-8 form-control mac-form-control" value="{{ ($coti->address_id === 0 || $coti->address_id === null) ? 'En Planta' : $coti->address->line1}}" readonly> 
          </div>

          <hr style="margin: 0.25rem 0"> 

          <div class="row eagle-row-clean col-12">         
            <label class="mac-label col-5">Fecha Cotización:</label>   
            <input class="col-7 form-control mac-form-control" value="{{$coti->date()}}" readonly>
          </div>

          <div class="row eagle-row-clean col-12"> 
            <label class="mac-label col-5">Validez [días]:</label> 
            <input class="col-7 form-control mac-form-control" value="{{$coti->validez}}" readonly>
          </div>   

          <div class="row eagle-row-clean col-12">
            <label class="mac-label col-5">Fecha Venc:</label> 
            <input class="col-7 form-control mac-form-control" value="{{$vencimiento_form}}" readonly>   
          </div>

          <div class="row eagle-row-clean col-12">  
            <label class="mac-label col-5">Dìas Pendientes:</label> 
            <input class="col-7 form-control mac-form-control" value="{{$days_pending}}" readonly>
          </div>

          <div class="row eagle-row-clean col-12">                    
            <label class="mac-label col-5">Entrega:</label>
            <input class="col-7 form-control mac-form-control" value="{{$coti->delivery_date()}}" readonly>
          </div>  
          
          <hr style="margin: 0.25rem 0">   

          <div class="row eagle-row-clean col-12">
            <label class="mac-label col-5">Moneda:</label>
            <input class="col-7 form-control mac-form-control" value="{{$argCurr->retrieve($coti->quote_curr)}}" readonly> 
          </div>

          <hr style="margin: 0.25rem">

          <div class="row eagle-row-clean col-12">
            <label class="mac-label col-5">Forma de Pago:</label>
            <input class="col-7 form-control mac-form-control" value="{{$salesTermsCoti->retrieve($coti->payment_terms)}}" readonly> 
          </div>

          <div class="row eagle-row-clean col-12">
            <label class="mac-label col-5">Descripción (opcional):</label>
            <input class="col-7 form-control mac-form-control" value="{{$coti->terms_desc ? $coti->terms_desc : 'no especificado'}}" readonly>        
          </div>

          <hr style="margin: 0.25rem">

          <div class="row eagle-row-clean col-12">
            <label class="mac-label col-4">Obs:</label>
            <input class="col-8 form-control mac-form-control" value="{{$coti->obs ? $coti->obs : 'none'}}" readonly>        
          </div>
          
        </div> <!-- end of 1st column --> 

        <div class="col-10 right-of-sidebar-container"><!-- 2nd column -->
          <!--div class="row"-->

            <div class="col-12 no-marg no-pad">

              <table class="table" style="font-size: 0.75rem">

                <thead>
                  <tr style="height: 2.5rem; text-align: center; background-color: rgb(186, 202, 211)">
                    <th width=6% class="model_table">Item</th>
                    <th width=6% class="model_table">Cantidad</th>
                    <th width=39% class="model_table">Descripción</th>                    
                    <!--th width=4% class="model_table">Potencia [kVA]</th-->
                    <!--th width=6% class="model_table">Régimen (solo Alq)</th-->                
                    <!--th width=4% class="model_table">Un Tiempo</th-->
                    <th width=6% class="model_table">Días<p class="no-marg no-pad small">Sólo Alq</p></th>
                    <!--th width=6% class="model_table">Frecuencia (solo Serv)</th-->
                    <th width=6% class="model_table">Precio Lista</th>
                    <th width=6% class="model_table">Precio Of</th>
                    <th width=6% class="model_table">IVA [%]</th>
                    <th width=6% class="model_table">Precio Inc. IVA</th>  
                  </tr>
                </thead>

                <tbody>

                  @foreach($cotiDets as $cotiDet)
                  <tr>

                    <td class="eagle-td">
                      <input class="form-control mac-form-control" value="{{$cotiItems->retrieve($cotiDet->item)}}" readonly> 
                    </td>

                    <td class="eagle-td">
                      <input class="form-control mac-form-control" value="{{$cotiDet->cant}}" readonly>  
                    </td>

                    <td class="eagle-td">
                      <input class="form-control mac-form-control" value="{{$cotiDet->description}}" readonly>  
                    </td>

                    <td class="eagle-td">
                      <input class="form-control mac-form-control" value="{{$cotiDet->days}}" readonly>  
                    </td>

                    <td class="eagle-td">
                      <input class="form-control mac-form-control price" value="{{$cotiDet->list_price}}" readonly> 
                    </td>

                    <td class="eagle-td">
                      <input class="form-control mac-form-control price" value="{{$cotiDet->of_price}}" readonly> 
                    </td>

                    <td class="eagle-td">
                      <input class="form-control mac-form-control price" value="{{$cotiDet->vat_rate}}" readonly> 
                    </td>

                    <td class="eagle-td">
                      <input class="form-control mac-form-control price" value="{{$cotiDet->of_price_plus_IVA}}" readonly> 
                    </td>

                  </tr>
                  @endforeach                 
                </tbody>

              </table>

            </div><!-- end of table container --> 

            <hr> 

            <div class="col-12 bordered-container row no-marg" style="margin-top: 0.25rem;">

              <div class="col-12 row no-marg">

                <div class="col-12"><b>INCLUYE:</b></div>
                <br><br>

                <div class="col-1" style="display: flex; justify-content: flex-end">
                  <input class="chbx" type="checkbox" name="op1" id="op1" {{$coti->op1 === 1 ? 'checked' : ''}} disabled>
                </div>
                <div class="col-2" style="display: flex; justify-content: flex-start; align-items: center ;">
                  <label style="margin: 0">{{$cotiOps->show('1')}}</label>
                </div>

                <div class="col-1" style="display: flex; justify-content: flex-end">
                  <input class="chbx" type="checkbox" name="op2" id="op2" {{$coti->op2 === 1 ? 'checked' : ''}} disabled>
                </div>
                <div class="col-2" style="display: flex; justify-content: flex-start; align-items: center ;">
                  <label style="margin: 0">{{$cotiOps->show('2')}}</label>
                </div>

                <div class="col-1" style="display: flex; justify-content: flex-end">
                  <input class="chbx" type="checkbox" name="op3" id="op3" {{$coti->op3 === 1 ? 'checked' : ''}} disabled>
                </div>
                <div class="col-2" style="display: flex; justify-content: flex-start; align-items: center ;">
                  <label style="margin: 0">{{$cotiOps->show('3')}}</label>
                </div>

                <div class="col-1" style="display: flex; justify-content: flex-end">
                  <input class="chbx" type="checkbox" name="op4" id="op4" {{$coti->op4 === 1 ? 'checked' : ''}} disabled>
                </div>
                <div class="col-2" style="display: flex; justify-content: flex-start; align-items: center ;">
                  <label style="margin: 0">{{$cotiOps->show('4')}}</label>
                </div>

              </div>  

            </div>

            <hr>

            @if($status === "Aceptada")
              <div class="col-4 no-marg no-pad">
                <div class="row eagle-row-clean col-12">
                  <label class="mac-label col-5">Cotización Aceptada:</label>
                  <input class="col-7 form-control mac-form-control" value={{$coti->status_change()}} readonly> 
                </div>
                <div class="row eagle-row-clean col-12">
                  <label class="mac-label col-5">Comentarios:</label>
                  <textarea style="padding: 10px; background-color: lightgray; border-radius: 5px; border: 0.5px solid darkgray" class="col-7 mac-form-textarea-2" rows="4" readonly>{{$coti->comments}}</textarea> 
                </div>
              </div>
            @endif

            @if($status === "Rechazada")
              <div class="col-4 no-marg no-pad">
                <div class="row eagle-row-clean col-12">
                  <label class="mac-label col-5">Cotización Rechazada:</label>
                  <input class="col-7 form-control mac-form-control" value={{$coti->status_change()}} readonly> 
                </div>
                <div class="row eagle-row-clean col-12">
                  <?php
                    $rejection_array = (array) $rejectionTypes->get();
                    $rej = $rejection_array[$coti->rejection];
                  ?>
                  <label class="mac-label col-5">Motivo:</label>
                  <input class="col-7 form-control mac-form-control" value={{$rej}} readonly> 
                </div>
                <div class="row eagle-row-clean col-12">
                  <label class="mac-label col-5">Comentarios:</label>
                  <textarea style="padding: 10px; background-color: lightgray; border-color: red; border-radius: 5px; border: 0.5px solid darkgray" class="col-7 mac-form-textarea-2" rows="4" readonly>{{$coti->comments}}</textarea> 
                </div>
              </div>
            @endif

            

          <!--/div--><!-- end of row -->

        </div><!--end 2nd column-->
  
      </section>

  </div> <!-- end of row -->

  <div class="modal" id="modalReject">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <!-- Add specs -->
        <div class="modal-header eagle-modal-header">
          <h4 class="modal-title">Rechazo de Cotización</h4>
        </div>

        <form method="POST" action="/cotis/rejection_update/{{$coti->id}}" autocomplete="off">
          {{method_field('PUT')}}
          {{csrf_field()}}

            <div class="modal-body modal-form">
              <div class="container-fluid eagle-container"> 

                <div class="form-group row" style="padding: 1rem">
                  <label for="comments" class="col-md-2 col-form-label"><b>{{('Fecha:') }}</b></label>
                  <input type="date" class="col-md-3 form-control" name="status_change" value="{{$ftdMyTime}}">
                </div> 

                <div class="form-group row" style="padding: 1rem">
                  <label for="rejection" class="col-md-2 col-form-label"><b>{{('Motivo:') }}</b></label>
                    <div class="col-md-10">
                      <div class="container-fluid checkboxes">
                        <div class="row">
                          @foreach($rejectionTypes->get() as $index => $rejectionType)
                            <div class="col-md-4">
                              <label class="checkbox-inline">
                              <input type="checkbox" name="rejection" value="{{$index}}">
                                {{$rejectionType}}
                              </label>
                            </div>
                          @endforeach        
                        </div>
                      </div>
                    </div>
                </div>  

                <div class="form-group row" style="padding: 1rem">
                  <label for="comments" class="col-md-2 col-form-label"><b>{{('Comentarios:') }}</b></label>
                  <textarea class="col-md-10 form-control" name="comments" rows=8></textarea>
                </div> 

                <div class="modal-footer">
                  <button class="col-2 btn eagle-button modalbutton" type="submit">Rechazar</button>
                  <button type="button" class="col-2 btn eagle-button modalbutton" data-dismiss="modal">Cancelar</button>
                </div> 

                <input name="status" value = 2 hidden>

              </div>
            </div>
        </form>

      </div>

    </div>

  </div>

   <div class="modal" id="modalAccept">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <!-- Add specs -->
        <div class="modal-header eagle-modal-header">
          <h4 class="modal-title">Aceptación de Cotización</h4>
        </div>

        <form method="POST" action="/cotis/acceptance_update/{{$coti->id}}" autocomplete="off">
          {{method_field('PUT')}}
          {{csrf_field()}}

            <div class="modal-body modal-form">
              <div class="container-fluid eagle-container"> 

                <div class="form-group row" style="padding: 1rem">
                  <label for="comments" class="col-md-2 col-form-label"><b>{{('Fecha:') }}</b></label>
                  <input type="date" class="col-md-3 form-control" name="status_change" value="{{$ftdMyTime}}">
                </div> 

                <div class="form-group row" style="padding: 1rem">
                  <label for="comments" class="col-md-2 col-form-label"><b>{{('Comentarios:') }}</b></label>
                  <textarea class="col-md-10 form-control" name="comments" rows=8></textarea>
                </div> 

                <div class="modal-footer">
                  <button class="col-2 btn eagle-button modalbutton" type="submit">Aceptar</button>
                  <button type="button" class="col-2 btn eagle-button modalbutton" data-dismiss="modal">Cancelar</button>
                </div> 

                <input name="status" value = 1 hidden>

              </div>
            </div>
        </form>

      </div>

    </div>

  </div>

</div> <!-- end container -->

@endsection

@section('script')

  <script>

    $(document).ready(function(){
//------------------------------------------------------------------------------
      
//------------------------------------------------------------------------------
      
//------------------------------------------------------------------------------
    });// end of document ready function
// -----------------------------------------------------------------------------

    var prices = document.querySelectorAll(".price")
    prices.forEach(function(price){
      price.innerText = Number(price.innerText).toFixed(0)
      price.innerText = Number(price.innerText).toLocaleString("es-ES")
    });

    var onedecs = document.querySelectorAll(".onedec")
    onedecs.forEach(function(onedec){
        onedec.innerText = Number(onedec.innerText).toLocaleString("es-ES",{ maximumFractionDigits: 1, minimumFractionDigits: 1})
    });

// Validaciones --------------------------------------------------------------------------------------------

    
// -------------------------------------------------------------------------------------------   

  </script>

@endsection
