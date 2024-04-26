<?php

namespace App\Services;

use App\County;

class Counties
{
    public function get()
    {
        $counties = County::all();
        return $counties;
    }
}
