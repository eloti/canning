<!-- resources/views/comments/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 bg-white shadow-md rounded-lg">
    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-4">Comentario Detallado</h2>
        <div class="border p-4 rounded-lg">
            <p><strong>Usuario:</strong> {{ $comment->user->name }}</p>
            <p><strong>Fecha:</strong> {{ $comment->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Comentario:</strong> {{ $comment->comment }}</p>
        </div>
    </div>
    <div class="flex justify-end mt-6">
        <a href="{{ route('clients.show', $comment->client_id) }}" class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Volver a Cliente</a>
    </div>
</div>
@endsection
