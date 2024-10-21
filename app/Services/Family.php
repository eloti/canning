<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Family
{   

  public function get()
  {
    $family[''] = 'Seleccionar';
    $family[1] = 'Baño Químico';    
    
    return $family;
  }

  public function retrieve($x)
  { 
    $family[''] = 'Seleccionar';
    $family[1] = 'Baño Químico';
    
    return $family[$x];
  }
}