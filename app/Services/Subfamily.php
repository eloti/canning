<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Subfamily
{   

  public function get()
  {
    $subfamily[''] = 'Seleccionar';
    $subfamily[1] = 'Baño Químico';    
    
    return $subfamily;
  }

  public function retrieve($x)
  { 
    $subfamily[''] = 'Seleccionar';
    $subfamily[1] = 'Baño Químico';
    
    return $subfamily[$x];
  }
}