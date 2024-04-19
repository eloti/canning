<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Muestra la información del usuario actual.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Obtener el usuario actual
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}


public function update(Request $request, User $user)
{
   
    $request->validate([
       
    ]);

    // Actualizar el usuario con los datos del formulario
    $user->update($request->all());

    // Redireccionar a una página de confirmación o a donde desees
    return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
}
}
