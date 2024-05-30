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
        User::create([
            'name' => 'Super',
            'email' => 'lucia@example.com',
            'password' => bcrypt('password'),
            'alias' => 'canningAdmin',
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'clearance' => 1, 
            'cell' => '555555555',
            'formal_name' => 'Super Admin ',
            'rank' => '-',
            'company' => 'Auxilios y Servicios Canning SRL',
        ]);

        User::create([
            'name' => 'Matias',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'alias' => 'matias',
            'firstname' => 'Matias',
            'lastname' => 'Doe',
            'clearance' => 1, 
            'cell' => '123456789',
            'formal_name' => 'John Doe',
            'rank' => 'Admin',
            'company' => 'RentalPaas',
        ]);

        User::create([
            'name' => 'Andres',
            'email' => 'andres@example.com',
            'password' => bcrypt('password'),
            'alias' => 'andres',
            'firstname' => 'Andres',
            'lastname' => 'Basso',
            'clearance' => 1, 
            'cell' => '987654321',
            'formal_name' => 'Andres Gomez',
            'rank' => 'Admin',
            'company' => 'RentalPaas',
        ]);

        User::create([
            'name' => 'Lucia Lucia',
            'email' => 'lucia@example.com',
            'password' => bcrypt('password'),
            'alias' => 'lucia',
            'firstname' => 'Lucia',
            'lastname' => 'Lucia',
            'clearance' => 1, 
            'cell' => '555555555',
            'formal_name' => 'Lucia ',
            'rank' => 'Admin',
            'company' => 'RentalPaas',
        ]);

        // Crear más usuarios de prueba según sea necesario
    }
}
