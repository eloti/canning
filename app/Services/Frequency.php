<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Frequency
{   

  public function get()
  {
    $frequencyArray[''] = '';
        
      $frequencyArray[1] = 'mensual';
      $frequencyArray[2] = 'trimestral';
      $frequencyArray[3] = 'semestral';
      $frequencyArray[4] = '100 horas';
      $frequencyArray[5] = '200 horas';
      $frequencyArray[6] = '300 horas';
    
    return $frequencyArray;
  }

  public function retrieve($x)
  {
    $frequencyArray[''] = 'N/A';
        
      $frequencyArray[1] = 'mensual';
      $frequencyArray[2] = 'trimestral';
      $frequencyArray[3] = 'semestral';
      $frequencyArray[4] = '100 horas';
      $frequencyArray[5] = '200 horas';
      $frequencyArray[6] = '300 horas';
    
    return $frequencyArray[$x];
  }
}