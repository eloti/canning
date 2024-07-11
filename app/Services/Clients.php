<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Client;

//class Clients extends Model
class Clients
{
  public function get()
  {
    $clients = Client::orderBy('commercial_name', 'asc')
                        ->get();

                        
    $clientsArray[''] = 'Seleccione Cliente';
    foreach ($clients as $client) {
      $clientsArray[$client->id] = $client->commercial_name;
    }
    return $clientsArray;
  }


      //$clientsArray[$client->cuit_type] = $client->cuit_type;
      //$clientsArray[$client->cuit_num] = $client->cuit_num;
}
