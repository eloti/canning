<!-- resources/views/comments/edit.blade.php -->
@extends('layouts.app')

@section('content')

    <div class="bg-white rounded-lg w-full max-w-3xl m-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center p-4 border-b border-gray-300">
            <h4 class="text-lg font-semibold">Editar Comentario: {{$comment->client->legal_name}}</h4>
            <a href="{{ route('clients.show', $comment->client_id) }}" class="text-gray-500 hover:text-gray-800">&times;</a>
        </div>

        <!-- Modal Form -->
        <form method="POST" id="contactModalForm" action="{{ route('comments.update', $comment->id) }}" autocomplete="off" class="p-4 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4">
                <!-- Comentario -->
                <div class="col-span-1">
                    <label for="comment" class="block text-md font-medium text-gray-700">Comentario</label>
                    <textarea id="comment" name="comment" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3">{{ $comment->comment }}</textarea>
                </div>
                    
                <!-- Hidden Fields -->
                <input type="hidden" name="client_id" value="{{$comment->client_id}}">
                <input type="hidden" name="user_id" value="{{$comment->user_id}}"> <!-- Hidden User ID -->
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 mt-6">
                <button type="submit" class="py-2 px-4 bg-rental text-white font-semibold rounded-lg shadow-md hover:bg-rentallight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Actualizar</button>
                <a href="{{ route('clients.show', $comment->client_id) }}" class="py-2 px-4 bg-gray-600 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Cancelar</a>
            </div>

            <hr class="my-6">

            <!-- Footer Note -->
            <div class="text-center text-gray-500"><b>* Campos Obligatorios</b></div>
     
        </form>
    </div>

@endsection
