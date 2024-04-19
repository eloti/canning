<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Renter;

//class Families extends Model
class Renters
{
    public function get()
    {
      $renters = Renter::orderBy('commercial_name', 'asc')
      					->get();

      //$rentersArray[''] = 'Seleccione Alquilador';

      foreach ($renters as $renter) {
        $rentersArray[$renter->id] = $renter->commercial_name;
      }

      return $rentersArray;
    }
}