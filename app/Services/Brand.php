<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Brand
{   

  public function get()
  {
    $brand[''] = 'Seleccionar';
    $brand[1] = 'Genérico';    
    
    return $brand;
  }

  public function retrieve($x)
  { 
    $brand[''] = 'Seleccionar';
    $brand[1] = 'Genérico';
    
    return $brand[$x];
  }
}