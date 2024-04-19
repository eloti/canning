<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Rental;

//class Clients extends Model
class NewRentalOps
{
  public function get()
  {
    $rentals = Rental::leftJoin('remitos', 'rentals.id', '=', 'remitos.rental_id')
                      ->select('rentals.id', 'rentals.client_id')
                      ->where([
                                ['remitos.rental_id', '=', null],
                                ['rentals.rental_type', '<', 3]
                              ])
      					      ->get();

    $newRentalOpsArray[''] = 'Seleccione Alquiler';

    foreach ($rentals as $rental) {
      $newRentalOpsArray[$rental->id] = $rental->id;
    }

    return $newRentalOpsArray;
  }
}
