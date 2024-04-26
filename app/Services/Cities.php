<?php

namespace App\Services;

use App\City;

class Cities
{
    public function get()
    {
        $cities = City::all();
        return $cities;
   
    }
}
