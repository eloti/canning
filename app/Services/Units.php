<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Units
{   

  public function get()
  {
    $unitsArray[''] = '';
    $unitsArray[1] = 'días';
    $unitsArray[2] = 'unidades';
    $unitsArray[3] = 'horas';
    $unitsArray[4] = 'litros';
    
    return $unitsArray;
  }

  public function retrieve($x)
  {
    $unitsArray[''] = 'N/A';        
    $unitsArray[1] = 'días';
    $unitsArray[2] = 'unidades';
    $unitsArray[3] = 'horas';
    $unitsArray[4] = 'litros';
    
    return $unitsArray[$x];
  }

  public function show($x)
  {
    $unitsArray[''] = 'N/A';
    $unitsArray[1] = 'días';
    $unitsArray[2] = 'unidades';
    $unitsArray[3] = 'horas';
    $unitsArray[4] = 'litros';

    return $unitsArray[$x];
  }
}