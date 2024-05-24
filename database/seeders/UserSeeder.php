<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuarios de prueba
        User::create([
            'name' => 'Matias',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'alias' => 'matias',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'clearance' => 1, 
            'cell' => '123456789',
            'formal_name' => 'John Doe',
            'rank' => 'Manager',
            'company' => 'Example Inc',
        ]);

        User::create([
            'name' => 'Andres',
            'email' => 'andres@example.com',
            'password' => bcrypt('password'),
            'alias' => 'andres',
            'firstname' => 'Andres',
            'lastname' => 'Gomez',
            'clearance' => 1, 
            'cell' => '987654321',
            'formal_name' => 'Andres Gomez',
            'rank' => 'Supervisor',
            'company' => 'Example Inc',
        ]);

        User::create([
            'name' => 'Lucia Lucia',
            'email' => 'lucia@example.com',
            'password' => bcrypt('password'),
            'alias' => 'lucia',
            'firstname' => 'Lucia',
            'lastname' => 'Perez',
            'clearance' => 1, 
            'cell' => '555555555',
            'formal_name' => 'Lucia Perez',
            'rank' => 'Associate',
            'company' => 'Example Inc',
        ]);

        // Crear más usuarios de prueba según sea necesario
    }
}
