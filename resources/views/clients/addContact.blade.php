@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

<div class="container eagle-container">
  
  <div class="col d-flex justify-content-center" style="margin-top: 0.5rem">
    <div class="card eagle-card col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">    

        <div class="card-header eagle-card-header">
          <h3 class="eagle-h3">Agregar Contacto: {{$client->legal_name}}</h3>
        </div>

        <form method="POST" id="contactModalForm" action="{{ route('contacts.store') }}" autocomplete="off">
          @csrf
          <section>
              <div class="card-body eagle-card-body">
                  <div class="container-fluid">
      
                      <div class="row eagle-row-clean col-12">
                          <label for="name" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label">Nombre y Apellido*:</label>
                          <input id="name" type="text" name="name" class="form-control mac-form-control col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8 {{ $errors->has('name') ? ' is-invalid' : '' }}">
                          <span class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"></span>
                          @if ($errors->has('name'))
                          <span class="invalid-feedback col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8" role="alert" style="padding: 0">
                              <strong>Debe ingresar el nombre</strong>
                          </span>
                          @endif
                      </div>
      
                      <div class="row eagle-row-clean col-12">
                          <label for="position" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label">Puesto:</label>
                          <input type="text" id="position" name="position" class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control">
                      </div>
      
                      <div class="row eagle-row-clean col-12">
                          <label for="email" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label">E-mail:</label>
                          <input type="email" id="email" name="email" class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control">
                      </div>
      
                      <div class="row eagle-row-clean col-12">
                          <label for="cell_phone" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label">Celular:</label>
                          <input type="text" id="cell_phone" name="cell_phone" class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control">
                      </div>
      
                      <div class="row eagle-row-clean col-12">
                          <label for="phone" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label">Teléfono fijo:</label>
                          <input type="text" id="phone" name="phone" class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control">
                      </div>
      
                      <div class="row eagle-row-clean col-12">
                          <label for="extension" class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4, mac-label">Interno:</label>
                          <input type="text" id="extension" name="extension" class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-8, form-control mac-form-control">
                      </div>
      
                      @if(isset($origin->what_blade))
                      <input type="hidden" name="what_blade" value="{{$origin->what_blade}}" readonly>
                      @endif
      
                      <input type="hidden" name="client_id" value="{{$client->id}}" readonly>
      
                      @if(isset($origin->unit_id))
                      <input type="hidden" name="unit_id" value="{{$origin->unit_id}}" readonly>
                      @endif
      
                      @if(isset($origin->address_id))
                      <input type="hidden" name="address_id" value="{{$origin->address_id}}" readonly>
                      @endif
      
                      <br>
      
                  </div>
              </div>
      
              <br>
      
              <div class="card-footer row eagle-row" style="background-color: white; border: none">
                  <div class="col-3"></div>
                  <button class="btn eagle-button col-2" type="submit">Agregar</button>
                  <div class="col-2"></div>
                  <a type="button" class="btn eagle-button col-2" href="{{ url()->previous() }}">Cancelar</a>
                  <div class="col-3"></div>
              </div>
      
              <hr>
      
              <div class="eagle-button-container col-12"><b>* Campos Obligatorios</b></div>
      
              <br>
      
          </section>
      </form>
      

    </div>
</div>



@endsection