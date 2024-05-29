<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        

        return view('users.show')
        		->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'firstname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'formal_name' => 'nullable|string|max:255',
            'email' => 'email|max:255',
            'cell' => 'nullable|numeric',
        ]);

        $user->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'formal_name' => $request->input('formal_name'),
            'email' => $request->input('email'),
            'cell' => $request->input('cell'),
        ]);

        return redirect()->back()->with('success', 'Datos actualizados correctamente');
    }

    public function adminPanel()
    {
        $user = Auth::user(); // Usuario autenticado
        $users = User::all(); // Obtener todos los usuarios

        return view('users.admin.admin')
            ->with('user', $user)
            ->with('users', $users);
    }
}
