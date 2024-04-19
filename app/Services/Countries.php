<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Country;

class Countries
{   

  public function get()
  {
    $countries = Country::orderBy('value', 'asc')
                ->get();

    $countriesArray[''] = 'Seleccione País';

    foreach ($countries as $country) {
        $countriesArray[$country->id] = $country->value;
    }    
    
    return $countriesArray;
  }
  
}