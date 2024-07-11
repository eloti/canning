<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Units
{   

  public function get()
  {
    $unitsArray[''] = '';
    $unitsArray[1] = 'días';
    $unitsArray[2] = 'semanas';
    $unitsArray[3] = 'meses';
    $unitsArray[4] = 'otros';
    
    return $unitsArray;
  }

  public function retrieve($x)
  {
    $unitsArray[''] = 'N/A';        
    $unitsArray[1] = 'días';
    $unitsArray[2] = 'semanas';
    $unitsArray[3] = 'meses';
    $unitsArray[4] = 'otros';
    
    return $unitsArray[$x];
  }

  public function show($x)
  {
    $unitsArray[''] = 'N/A';
    $unitsArray[1] = 'días';
    $unitsArray[2] = 'semanas';
    $unitsArray[3] = 'meses';
    $unitsArray[4] = 'otros';

    return $unitsArray[$x];
  }
}