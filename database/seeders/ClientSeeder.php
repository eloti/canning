<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Client;
use App\Address;
use App\Contact;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un cliente
        $client = Client::create([
            'legal_name' => 'Cliente Ejemplo',
            'commercial_name' => 'Cliente Comercial',
         
            'cuit_num' => '123456789', // Ejemplo de CUIT
            'vat_status' => 'Activo',
            'payment_terms' => '30 días',
            'sales_tax_rate' => 21, // Ejemplo de tasa de impuesto de venta
            'cuit_type' => 'Responsable Inscripto',
            //'country_id' => 1, // Suponiendo que el ID del país es 1
            // Agregar otros campos según sea necesario
        ]);

   
   // Crear una dirección para el cliente
$address = Address::create([
    'client_id' => $client->id,
    'address_line_1' => 'Dirección Ejemplo 123', // Asegúrate de proporcionar un valor para address_line_1
    'address_line_2' => 'Segunda línea de dirección (opcional)', // Puedes proporcionar un valor opcional para address_line_2
    'city_id' => 1, // Suponiendo que la ciudad con ID 1 existe en la tabla cities
    'city_name' => 'Ciudad Ejemplo',
    'county_id' => 1, // Suponiendo que el partido con ID 1 existe en la tabla counties
    'county_name' => 'Partido Ejemplo',
    'province_id' => 1, // Suponiendo que la provincia con ID 1 existe en la tabla provinces
    'postal_code' => '12345', // Código postal de ejemplo
    'billing_address' => 1, // Indica que esta es la dirección de facturación
    'created_at' => now(),
    'updated_at' => now(),
    // Agregar otros campos según sea necesario
]);


        // Crear un contacto para el cliente
        $contact = Contact::create([
            'client_id' => $client->id,
            'name' => 'Contacto Ejemplo',
            'email' => 'contacto@example.com',
            'phone' => '123456789', // Ejemplo de número de teléfono
            'deactivate' => 0, // Indica que el contacto está activo
            // Agregar otros campos según sea necesario
        ]);
    }
}
