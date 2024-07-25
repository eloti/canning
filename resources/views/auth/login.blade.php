@extends('layouts.app')

@section('content')
<!--<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="alias" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="alias" type="text" class="form-control @error('alias') is-invalid @enderror" name="alias" value="{{ old('alias') }}" required autocomplete="alias" autofocus>

                                @error('alias')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn eagle-button" style="display: inline-block;">
                                    {{ __('Ingresar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="eagle-link" style="padding-left: 1rem" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidó su Contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->






<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm bg-rental rounded flex items-center justify-center flex-col py-8">
       
            <img src="/images/Logo2RP greenback.jpg" class="h-10">
    
      <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-white">Ingresar</h2>
    </div>
  
    <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
        
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="mt-2">
                    <input id="email" type="email" class=" px-3 block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-sm sm:leading-6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="alias" autofocus>
                    @error('email')
                    <span class="invalid-feedback text-red-500 mt-2" role="alert">
                        <strong>El email es incorrecto</strong>
                    </span>
                    @enderror
                </div>
            </div>
        
            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Contraseña') }}</label>
                    @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">{{ __('¿Olvidó su Contraseña?') }}</a>
                    </div>
                    @endif
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>La contraseña es incorrecta</strong>
                    </span>
                    @enderror
                </div>
                <div class="mt-2">
                    <input id="password" type="password" class="block w-full rounded-md border-0 px-3 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>Contraseña Incorrecta</strong>
                    </span>
                    @enderror
                </div>
            </div>
        
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-rental px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-rentallight focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 ">{{ __('Ingresar') }}</button>
            </div>
        </form>
        
  
     <!-- <p class="mt-10 text-center text-sm text-gray-500">
     
        <a href="#" class="font-semibold leading-6 text-rental hover:text-rentallight">Registrarse</a>
      </p>-->
    </div>
  </div>
  
@endsection
