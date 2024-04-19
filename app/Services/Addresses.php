<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Address;

//class Clients extends Model
class Addresses
{
  public function get()
  {
    $addresses = Address::orderBy('line1', 'asc')
                        ->get();

                        
    $addressesArray[''] = 'Seleccione Dirección';
    foreach ($addresses as $address) {
      $addressesArray[$address->id] = $address->line1;
    }
    return $addressesArray;
  }
}