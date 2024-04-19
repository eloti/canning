<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Part;

//class Families extends Model
class Parts
{
	public function get()
    {
      $parts = Part::get();
      $partsArray[''] = 'Seleccione ID';
      foreach ($parts as $part) {
        $partsArray[$part->id] = $part->ident;
      }
      return $partsArray;
    }
}
