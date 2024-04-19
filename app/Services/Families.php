<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Family;

//class Families extends Model
class Families
{
    public function get()
    {
      $families = Family::orderBy('value', 'asc')
      					->get();
      $familiesArray[''] = 'Seleccione Familia';
      foreach ($families as $family) {
        $familiesArray[$family->id] = $family->value;
      }
      return $familiesArray;
    }
}
