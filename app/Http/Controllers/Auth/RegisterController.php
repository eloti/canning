<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'clearance' => 'required|integer|min:1',
            'password' => 'required|string|min:8|confirmed',
            'rank' => 'nullable|string',
            'company' => 'nullable|string',
            'landline' => 'nullable|numeric'
        ]);

        $formal_name = $request->firstname . ' ' . $request->lastname;

        $user = User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'name' => $formal_name,
            'alias' => $request->alias,
            'email' => $request->email,
            'clearance' => $request->clearance,
            'password' => Hash::make($request->password),
            'formal_name' => $formal_name,
            'rank' => $request->input('rank'),
            'company' => $request->input('company'),
            'cell' => $request->input('cell'),
            'landline' => $request->input('landline'),
        ]);

        Auth::login($user);

        return redirect('home');
    }


    public function adminRegister(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'clearance' => 'required|integer|min:1',
            'password' => 'required|string|min:8|confirmed',
            'rank' => 'nullable|string',
            'company' => 'nullable|string',
            'landline' => 'nullable|numeric',
            'cell' => 'nullable|numeric',
            'role' => 'required'
        ], [
            'lastname.required' => 'El apellido es obligatorio.',
            'lastname.string' => 'El apellido debe ser una cadena de texto.',
            'lastname.max' => 'El apellido no debe exceder los 255 caracteres.',
            
            'firstname.required' => 'El nombre es obligatorio.',
            'firstname.string' => 'El nombre debe ser una cadena de texto.',
            'firstname.max' => 'El nombre no debe exceder los 255 caracteres.',
            
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            
            'clearance.required' => 'El nivel de autorización es obligatorio.',
            'clearance.integer' => 'El nivel de autorización debe ser un número entero.',
            'clearance.min' => 'El nivel de autorización debe ser al menos 1.',
            
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            
            'rank.string' => 'El puesto debe ser una cadena de texto.',
            
            'company.string' => 'La compañía debe ser una cadena de texto.',
            
            'landline.numeric' => 'El teléfono fijo debe ser un número.',
            
            'cell.numeric' => 'El teléfono celular debe ser un número.'
        ]);
    
        $formal_name = $request->firstname . ' ' . $request->lastname;
    
        $user = User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'name' => $formal_name,
            'alias' => $request->firstname,
            'email' => $request->email,
            'clearance' => $request->clearance,
            'password' => Hash::make($request->password),
            'formal_name' => $formal_name,
            'rank' => $request->input('rank'),
            'company' => $request->input('company'),
            'landline' => $request->input('landline'),
            'cell' => $request->input('cell'),
            'role'=> $request->input('role'),
        ]);
    
        if ($user) {
            return redirect()->back()->with('success', 'Usuario registrado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'No se pudo registrar el usuario.');
        }
    }
    
    }


