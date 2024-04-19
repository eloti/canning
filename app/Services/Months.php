<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Months
{   

  public function get()
  {
    $monthsArray[''] = 'Mes';
        
      $monthsArray[1] = 'ene';
      $monthsArray[2] = 'feb';
      $monthsArray[3] = 'mar';
      $monthsArray[4] = 'abr';
      $monthsArray[5] = 'may';
      $monthsArray[6] = 'jun';
      $monthsArray[7] = 'jul';
      $monthsArray[8] = 'ago';
      $monthsArray[9] = 'sep';
      $monthsArray[10] = 'oct';
      $monthsArray[11] = 'nov';
      $monthsArray[12] = 'dic';
    
    return $monthsArray;
  }
}

