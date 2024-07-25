<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function formatTelephone($cell)
    {
        // Debug the type and value of $cell
        Log::info('Original cell value: ' . $cell);
    
        // Ensure cell is a string and remove any non-digit characters
        $cell = preg_replace('/[^0-9]/', '', (string) $cell);
    
        Log::info('Sanitized cell value: ' . $cell);
    
        $length = strlen($cell);
    
        Log::info('Cell length: ' . $length);
    
        switch ($length) {
            case 8:
                // Format: 4534-2345
                return substr($cell, 0, 4) . '-' . substr($cell, 4, 4);
            case 9:
                // Format: 9 8765-4321 (Assuming a generic format)
                return substr($cell, 0, 1) . ' ' . substr($cell, 1, 4) . '-' . substr($cell, 5, 4);
            case 10:
                // Format: 11 7036-6065
                return substr($cell, 0, 2) . ' ' . substr($cell, 2, 4) . '-' . substr($cell, 6, 4);
            case 11:
                // Format: 1 17036-6065 (Assuming a generic format)
                return substr($cell, 0, 1) . ' ' . substr($cell, 1, 5) . '-' . substr($cell, 6, 5);
            case 12:
                // Format: +54 11 7036-6065
                return '+' . substr($cell, 0, 2) . ' ' . substr($cell, 2, 2) . ' ' . substr($cell, 4, 4) . '-' . substr($cell, 8, 4);
            default:
                // Fallback: Return the sanitized cell if it doesn't match any format
                return $cell;
        }
    }
    

    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->cell = $this->formatTelephone($user->cell);
            $user->landline = $this->formatTelephone($user->landline);
        }

        return view('users.show')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Limpiar los números de teléfono antes de la validación
        $request->merge([
            'cell' => preg_replace('/[^0-9]/', '', $request->input('cell')),
            'landline' => preg_replace('/[^0-9]/', '', $request->input('landline'))
        ]);
    
        $request->validate([
            'firstname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'formal_name' => 'nullable|string|max:255',
            'email' => 'email|max:255',
            'cell' => 'nullable|numeric',
            'rank' => 'nullable|string',
            'company' => 'nullable|string',
            'landline' => 'nullable|numeric',
            'password' => 'nullable|string|min:8|confirmed',
              'active' => 'nullable|boolean',
              'role' => 'nullable'
        ], [
            'firstname.string' => 'El campo nombre debe ser una cadena de caracteres.',
            'firstname.max' => 'El campo nombre no debe exceder de 255 caracteres.',
            'lastname.string' => 'El campo apellido debe ser una cadena de caracteres.',
            'lastname.max' => 'El campo apellido no debe exceder de 255 caracteres.',
            'formal_name.string' => 'El campo nombre formal debe ser una cadena de caracteres.',
            'formal_name.max' => 'El campo nombre formal no debe exceder de 255 caracteres.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El campo correo electrónico no debe exceder de 255 caracteres.',
            'cell.numeric' => 'El campo número de celular debe ser un número.',
            'rank.string' => 'El campo puesto debe ser una cadena de caracteres.',
            'company.string' => 'El campo compañía debe ser una cadena de caracteres.',
            'landline.numeric' => 'El campo teléfono laboral debe ser un número.',
            'password.string' => 'El campo contraseña debe ser una cadena de caracteres.',
            'password.min' => 'El campo contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.'
        ]);
    
        $data = $request->only([
            'firstname',
            'lastname',
            'formal_name',
            'email',
            'cell',
            'rank',
            'company',
            'landline',
            'active',
            'role'
        ]);
    
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }
    
        $user->update($data);
    
        return redirect()->back()->with('success', 'Datos actualizados correctamente');
    }
    


    public function adminPanel()
    {
        $user = Auth::user(); // Usuario autenticado
        $users = User::all(); // Obtener todos los usuarios

        // Format the telephone numbers for each user
        foreach ($users as $userItem) {
            Log::info('User ID: ' . $userItem->id . ' Cell before formatting: ' . $userItem->cell);
            $userItem->cell = $this->formatTelephone($userItem->cell);
            Log::info('User ID: ' . $userItem->id . ' Cell after formatting: ' . $userItem->cell);
        }

        return view('users.admin.admin')
            ->with('user', $user)
            ->with('users', $users);
    }



    public function edit($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->cell = $this->formatTelephone($user->cell);
            $user->landline = $this->formatTelephone($user->landline);
        }

        return view('users.edit')->with('user', $user);
    }
}
