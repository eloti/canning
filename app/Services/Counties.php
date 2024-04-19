<?php

namespace App\Services;

use App\County;

class Counties
{
    public function get()
    {
        $counties = County::get();
        $countiesArray[''] = 'Seleccione Partido';
        foreach ($counties as $county) {
            $countiesArray[$county->id] = $county->value;
        }
        return $countiesArray;
    }
}
