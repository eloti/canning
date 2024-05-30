@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Regístrese en RentalPaas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                         {{csrf_field()}}

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alias" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="alias" type="text" class="form-control @error('alias') is-invalid @enderror" name="alias" value="{{ old('alias') }}" required autocomplete="alias" autofocus>

                                @error('alias')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clearance" class="col-md-4 col-form-label text-md-right">{{ __('Autorización') }}</label>

                            <div class="col-md-6">
                                <input id="clearance" type="text" class="form-control @error('clearance') is-invalid @enderror" name="clearance" value="{{ old('clearance') }}" required>

                                @error('clearance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn eagle-button" style="display: inline-block;">
                                    {{ __('Regístrese') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<form method="POST" action="{{ route('register') }}">
    {{csrf_field()}}
    <div class="space-y-12">
    
  
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Informacion Personal</h2>

  
        <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
            <div class="mt-2">
              <input type="text" name="firstname" id="firstname" autocomplete="given-name"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3
" >
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
            <div class="mt-2">
              <input type="text" name="lastname" id="lastname"  autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3
" >
            </div>
          </div>
  

          <div class="sm:col-span-3">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" autocomplete="email"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3
" >
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="cell" class="block text-sm font-medium leading-6 text-gray-900">Teléfono</label>
            <div class="mt-2">
                <input id="cell" name="cell" type="tel" autocomplete="tel" placeholder="{{ $user->cell }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3
" disabled>
            </div>
        </div>
       
        </div>
      </div>
  
      <div class="border-b border-gray-900/10 pb-12">

        <div class="mt-10 space-y-10">
          
          <fieldset>
            <legend class="text-sm font-semibold leading-6 text-gray-900">Rol del Usuario</legend>
            <div class="mt-6 space-y-6">
              <div class="flex items-center gap-x-3">
                <input id="push-everything" name="clearence" type="radio" value="1" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">Administrador</label>
              </div>
              <div class="flex items-center gap-x-3">
                <input id="push-email" name="push-notifications" name="clearence" type="radio" value="3" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">Administrativo</label>
              </div>
              <!--<div class="flex items-center gap-x-3">
                <input id="push-nothing" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                <label for="push-nothing" class="block text-sm font-medium leading-6 text-gray-900">No push notifications</label>
              </div>-->
            </div>
          </fieldset>
        </div>
      </div>
    </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-rental px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rentallight focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
    </div>
  </form>