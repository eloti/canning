@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Perfil de Usuario</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="firstname">Nombre</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $user->name }}">
                            </div>

                           

                            @if ($user->clearance == 1)
                            <div class="form-group">
                                <label for="email">Alias</label>
                                <input type="text" name="alias" id="alias" class="form-control" value="{{ $user->alias }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                            </div>
                              
                                <div class="form-group">
                                    <label for="cell">Número de Celular</label>
                                    <input type="text" name="cell" id="cell" class="form-control" value="{{ $user->cell }}">
                                </div>

                               
                            @endif

                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
