@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        @if (session('success'))
        <div class="bg-rentallight text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h2 class="text-lg leading-6 font-medium text-gray-900">Editar Perfil de Usuario</h2>
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="editform mt-6 space-y-8">
                    @csrf
                    @method('PUT')
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <!-- Existing fields -->
                            <div class="sm:col-span-3">
                                <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                <div class="mt-2">
                                    <input type="text" name="firstname" id="firstname" autocomplete="given-name" value="{{ $user->firstname }}" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                    @error('firstname')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
                                <div class="mt-2">
                                    <input type="text" name="lastname" id="lastname" value="{{ $user->lastname }}" autocomplete="family-name" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                    @error('lastname')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- New password fields -->
                            <div class="sm:col-span-3">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Nueva Contraseña</label>
                                <div class="mt-2">
                                    <input type="password" name="password" id="password" autocomplete="new-password" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                    @error('password')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirmar Nueva Contraseña</label>
                                <div class="mt-2">
                                    <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                </div>
                            </div>
                            <!-- Existing fields -->
                            <div class="sm:col-span-3">
                                <label for="formal_name" class="block text-sm font-medium leading-6 text-gray-900">Nombre Formal</label>
                                <div class="mt-2">
                                    <input type="text" name="formal_name" id="formal_name" value="{{ $user->formal_name }}" autocomplete="family-name" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                    @error('formal_name')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="company" class="block text-sm font-medium leading-6 text-gray-900">Compañía</label>
                                <div class="mt-2">
                                    <input type="text" name="company" id="company" value="{{ $user->company }}" autocomplete="family-name" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                    @error('company')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="rank" class="block text-sm font-medium leading-6 text-gray-900">Puesto</label>
                                <div class="mt-2">
                                    <input type="text" name="rank" id="rank" value="{{ $user->rank }}" autocomplete="family-name" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                    @error('rank')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email" value="{{ $user->email }}" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                    @error('email')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="cell" class="block text-sm font-medium leading-6 text-gray-900">Teléfono</label>
                                <div class="mt-2">
                                    <input id="cell" name="cell" type="tel" autocomplete="tel" placeholder="{{ $user->cell }}" value="{{ $user->cell }}" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                    @error('cell')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="landline" class="block text-sm font-medium leading-6 text-gray-900">Teléfono Laboral</label>
                                <div class="mt-2">
                                    <input id="landline" name="landline" type="tel" autocomplete="tel" placeholder="{{ $user->landline }}" value="{{ $user->landline }}" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" >
                                    @error('landline')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="active" class="block text-sm font-medium leading-6 text-gray-900">Estado</label>
                                <div class="mt-2">
                                    <select name="active" id="active" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3">
                                        <option value="1" {{ $user->active ? 'selected' : '' }}>Activo</option>
                                        <option value="0" {{ !$user->active ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                    @error('active')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="role" class="block text-md font-medium text-gray-700">Rol:</label>
                                <select id="role" name="role" class="mt-1 block w-full border border-gray-300 rounded-md py-1.5 px-3">
                                    <option value="Administración" {{ $user->role == 'Administración' ? 'selected' : '' }}>Administración</option>
                                    <option value="Comercial" {{ $user->role == 'Comercial' ? 'selected' : '' }}>Comercial</option>
                                    <option value="Dirección" {{ $user->role == 'Dirección' ? 'selected' : '' }}>Dirección</option>
                                    <option value="Logística" {{ $user->role == 'Logística' ? 'selected' : '' }}>Logística</option>
                                    <option value="Servicio Técnico" {{ $user->role == 'Servicio Técnico' ? 'selected' : '' }}>Servicio Técnico</option>
                                </select>
                            </div>
                            
                            <div id="enableEdit" class="sm:col-span-full">
                                <button type="submit" class="rounded-md bg-rental px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rentallight focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                            </div>
                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
