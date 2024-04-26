@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfil de Usuario</div>

                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $user->firstname }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Cell:</strong> {{ $user->cell }}</p>
                        <p><strong>Rank:</strong> {{ $user->rank }}</p>
                        <!-- Botón Editar -->
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
