@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

<div class="container eagle-container">
  
	<div class="col d-flex justify-content-center" style="margin-top: 0.5rem">
    	<div class="card eagle-card col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">    

        	<div class="card-header eagle-card-header">
          		<h3 class="eagle-h3">Editar Contacto: {{$contact->client->legal_name}}</h3>
        	</div>

        		<form method="POST" action="/contacts/{{$contact->id}}" novalidate>
                    {{method_field('PUT')}}
                    {{csrf_field()}}

                    <div class="card-body eagle-card-body">
              			<div class="container-fluid">

                        <div class="row eagle-row-clean col-12">
                          {{ Form::label("Nombre y Apellido*:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                          {{ Form::text('name', $contact->name, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control', 'readonly']) }}
                        </div>
                        <div class="row eagle-row-clean col-12">
                          {{ Form::label("Puesto:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                          {{ Form::text('position', $contact->position, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control']) }}
                        </div>
                        <div class="row eagle-row-clean col-12">
                          {{ Form::label("E-mail:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                          {{ Form::email('email', $contact->email, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control']) }}
                        </div>
                        <div class="row eagle-row-clean col-12">
                          {{ Form::label("Celular:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                          {{ Form::text('cell_phone', $contact->cell_phone, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control']) }}
                        </div>
                        <div class="row eagle-row-clean col-12">
                          {{ Form::label("Teléfono fijo:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                          {{ Form::text('phone', $contact->phone, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control']) }}
                        </div>
                        <div class="row eagle-row-clean col-12">
                          {{ Form::label("Interno:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                          {{ Form::text('extension', $contact->extension, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control']) }}
                        </div>
                        <div class="row eagle-row-clean col-12">
                          {{ Form::label("Comentarios:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                          {{ Form::textarea('comment', $contact->comment, ['class' => 'col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control form-control-modal', 'rows' => 3]) }}
                        </div>

                        <hr>

                        <div class="row eagle-row-clean col-12">
                          {{ Form::label("Status:", null, ['class' => 'col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label']) }}
                            <div class="col-2 mac-label">Activo</div>
                            <div class="col-2 row eagle-row-clean" style="display: flex; align-items: center">
                              @if($contact->deactivate === 0)
                                {{ Form::radio('deactivate', '0', true) }}
                              @else
                                {{ Form::radio('deactivate', '0') }}
                              @endif
                            </div>
                            <div class="col-2 mac-label">Inactivo</div>
                            <div class="col-2 row eagle-row-clean" style="display: flex; align-items: center">
                              @if($contact->deactivate === 1)
                                {{ Form::radio('deactivate', '1', true) }}
                              @else
                                {{ Form::radio('deactivate', '1') }}
                              @endif
                            </div>
                          </div>

                          <br>

                          <input type="hidden" name="client_id" value="{{$contact->client_id}}" readonly>
                        </div>
                      </div>

                      <br>

                    <div class="card-footer row eagle-row" style="background-color: white; border: none">
              			<div class="col-3"></div>
                        <button class="btn eagle-button col-2" type="submit">Actualizar</button>
                        <div class="col-2"></div>
                        <a type="button" class="btn eagle-button col-2" href="{{ url()->previous() }}">Cancelar</a>
                        <div class="col-3"></div>
                    </div>

                    <hr>

            		<div class="eagle-button-container col-12"><b>* Campos Obligatorios</b></div>

            		<br>

                    </form>


	    </div>
	</div>
</div>

@endsection