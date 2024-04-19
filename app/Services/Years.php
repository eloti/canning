<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Years
{   

  public function get()
  {
    $yearsArray[''] = 'Año';
        
      $yearsArray[2019] = '2019';
      $yearsArray[2020] = '2020';
    
    return $yearsArray;
  }
}