<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class ArgCurr
{   

  public function get()
  {
    $argCurr[''] = 'Seleccionar';
    $argCurr[1] = 'USD';
    $argCurr[2] = 'ARS';
    
    return $argCurr;
  }

  public function retrieve($x)
  { 
    $argCurr[''] = 'Seleccionar';
    $argCurr[1] = 'USD';
    $argCurr[2] = 'ARS';
    
    return $argCurr[$x];
  }
  
}