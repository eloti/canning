<?php

namespace App\Services;

use App\City;

class Cities
{
    public function get()
    {
        $cities = City::get();
        $citiesArray[''] = 'Seleccione Localidad/Ciudad';
        foreach ($cities as $city) {
            $citiesArray[$city->id] = $city->value;
        }
        return $citiesArray;
    }
}
