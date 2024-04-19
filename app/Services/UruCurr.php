<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class UruCurr
{   

  public function get()
  {
    $uruCurr[''] = 'Seleccionar';
    $uruCurr[1] = 'USD';
    $uruCurr[3] = 'UYU';
    
    return $uruCurr;
  }
}