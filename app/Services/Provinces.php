<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Province;

//class Families extends Model
class Provinces
{
    public function get()
    {
      $provinces = Province::get();
      $provincesArray[''] = 'Seleccione Provincia';
      foreach ($provinces as $province) {
        $provincesArray[$province->id] = $province->value;
      }
      return $provincesArray;
    }
}
