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

        // Crear más usuarios de prueba según sea necesario
    }
}
