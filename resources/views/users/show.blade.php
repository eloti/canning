@extends('layouts.app')

@section('content')
 <div class="container py-4 md:px-8">
    @if (session('success'))
    <div class="bg-rentallight text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ route('user.update', $user->id) }}" method="POST" class="editform">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Información Personal</h2>
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                        <div class="mt-2">
                            <input type="text" name="firstname" id="firstname" autocomplete="given-name" value="{{ $user->firstname }}" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" disabled>
                            @error('firstname')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
                        <div class="mt-2">
                            <input type="text" name="lastname" id="lastname" value="{{ $user->lastname }}" autocomplete="family-name" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" disabled>
                            @error('lastname')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="formal_name" class="block text-sm font-medium leading-6 text-gray-900">Nombre Formal</label>
                        <div class="mt-2">
                            <input type="text" name="formal_name" id="formal_name" value="{{ $user->formal_name }}" autocomplete="family-name" class=" input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" disabled>
                            @error('formal_name')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" value="{{ $user->email }}" class=" input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" disabled>
                            @error('email')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="cell" class="block text-sm font-medium leading-6 text-gray-900">Teléfono</label>
                        <div class="mt-2">
                            <input id="cell" name="cell" type="tel" autocomplete="tel" placeholder="{{ $user->cell }}" value="{{ $user->cell }}" class="input-selection block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-rental sm:text-md sm:leading-6 px-3" disabled>
                            @error('cell')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div id="enableEdit" class="sm:col-span-full">
                        <button type="button" class="rounded-md bg-rental px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rentallight focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Editar</button>
                    </div>
                    <div id="editSubmit" class="sm:col-span-full mt-2 flex items-center justify-start gap-x-6 hidden">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
                        <button type="submit" class="rounded-md bg-rental px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rentallight focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const enableEditButton = document.getElementById('enableEdit');
            const cancelEditButton = document.querySelector('#editSubmit button[type="button"]');
            const editSubmitSection = document.getElementById('editSubmit');
            const form = document.querySelector('.editform');
            const inputs = form.querySelectorAll('.input-selection');
        
            enableEditButton.addEventListener('click', function () {
                console.log(inputs)
                inputs.forEach(input => input.disabled = false);
                enableEditButton.classList.add('hidden');
                editSubmitSection.classList.remove('hidden');
            });
        
            cancelEditButton.addEventListener('click', function () {
                inputs.forEach(input => input.setAttribute('disabled', 'disabled'));
                enableEditButton.classList.remove('hidden');
                editSubmitSection.classList.add('hidden');
            });
        });
        </script>
</div>
@endsection
@section('script')

@endsection