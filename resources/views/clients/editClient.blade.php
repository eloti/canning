@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')


@inject('industries', 'App\Services\Industries')


<div class="container eagle-container">
  
  	<div class="col d-flex justify-content-center" style="margin-top: 0.5rem">
    	<div class="card eagle-card col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">    

        	<div class="card-header eagle-card-header">
          		<h3 class="eagle-h3">Editar Cliente: {{$client->commercial_name}}</h3>
        	</div>

          <form method="POST" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        
            <div class="card-body eagle-card-body">
                <div class="container-fluid">
        
                    <div class="row eagle-row-clean col-12">
                        <label class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 mac-label" for="name">Nombre y Apellido*:</label>
                        <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control" id="name" name="name" placeholder="{{ $client->name }}" value="{{ $client->name }}" readonly>
                    </div>
        
                    <div class="row eagle-row-clean col-12">
                        <label class="mac-label col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" for="position">Puesto:</label>
                        <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control" id="position" name="position" value="{{ $client->position }}">
                    </div>
        
                    <div class="row eagle-row-clean col-12">
                        <label class="mac-label col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" for="email">E-mail:</label>
                        <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control" id="email" name="email" value="{{ $client->email }}">
                    </div>
        
                    <div class="row eagle-row-clean col-12">
                        <label class="mac-label col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" for="cell_phone">Celular:</label>
                        <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control" id="cell_phone" name="cell_phone" value="{{ $client->cell_phone }}">
                    </div>
        
                    <div class="row eagle-row-clean col-12">
                        <label class="mac-label col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" for="phone">Teléfono fijo:</label>
                        <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control" id="phone" name="phone" value="{{ $client->phone }}">
                    </div>
        
                    <div class="row eagle-row-clean col-12">
                        <label class="mac-label col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" for="extension">Interno:</label>
                        <input class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control mac-form-control" id="extension" name="extension" value="{{ $client->extension }}">
                    </div>
        
                    <div class="row eagle-row-clean col-12">
                        <label class="mac-label col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" for="comment">Comentarios:</label>
                        <textarea class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 form-control form-control-modal" id="comment" name="comment" rows="3">{{ $client->comment }}</textarea>
                    </div>
        
                    <hr>
        
                    <div class="row eagle-row-clean col-12">
                        <label class="mac-label col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" for="deactivate">Status:</label>
                        <div class="col-2 mac-label">Activo</div>
                        <div class="col-2 row eagle-row-clean" style="display: flex; align-items: center">
                            <input type="radio" name="deactivate" id="deactivate_active" value="0" {{ $client->deactivate === 0 ? 'checked' : '' }}>
                        </div>
                        <div class="col-2 mac-label">Inactivo</div>
                        <div class="col-2 row eagle-row-clean" style="display: flex; align-items: center">
                            <input type="radio" name="deactivate" id="deactivate_inactive" value="1" {{ $client->deactivate === 1 ? 'checked' : '' }}>
                        </div>
                    </div>
        
                    <input type="hidden" name="client_id" value="{{ $client->client_id }}" readonly>
                </div>
            </div>
        
            <div class="card-footer row eagle-row" style="background-color: white; border: none">
                <div class="col-3"></div>
                <button class="btn eagle-button col-2" type="submit">A
        

    	</div>
	</div>

</div>


@endsection