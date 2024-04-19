<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Regime
{   

  public function get()
  {
      $regimeArray[''] = '';        
      $regimeArray[1] = 'Standby';
      $regimeArray[2] = '10 horas/día';
      $regimeArray[3] = '24 horas/día';
    
    return $regimeArray;
  }

  public function retrieve($x)
  {
      $regimeArray[''] = 'N/A';        
      $regimeArray[1] = 'Standby';
      $regimeArray[2] = '10 horas/día';
      $regimeArray[3] = '24 horas/día';
    
    return $regimeArray[$x];
  }

  public function show($x)
  {
      $regimeArray[''] = 'N/A';        
      $regimeArray[1] = 'Standby';
      $regimeArray[2] = '10 horas/día';
      $regimeArray[3] = '24 horas/día';
    
    return $regimeArray[$x];
  }
}