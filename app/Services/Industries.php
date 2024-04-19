<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Industry;

class Industries
{
  public function get()
  {
    $industries = Industry::select('id', 'value')
                  ->get(); // this returns individual arrays for each id and value

      $industriesArray[''] = 'Seleccionar Rubro/Industria'; // this inserts the text into the new array
      foreach ($industries as $industry)
      {
        $industriesArray[$industry->id] = $industry->value;
      } // this makes and array of each individual array

    return $industriesArray;
  }
}
