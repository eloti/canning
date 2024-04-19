<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Subfamily;

//class Families extends Model
class Subfamilies
{
    public function get()
    {
      $subfamilies = Subfamily::get();
      $subfamiliesArray[''] = 'Seleccione Subfamilia';
      foreach ($subfamilies as $subfamily) {
        $subfamiliesArray[$subfamily->id] = $subfamily->value;
      }
      return $subfamiliesArray;
    }
}
