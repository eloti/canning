<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Items
{   

  public static function get()
  {
    $itemsArray[''] = 'Item';
        
      $itemsArray[1] = 'ALQ';
      $itemsArray[2] = 'SER';
      $itemsArray[3] = 'REP';
      $itemsArray[4] = 'NEW';
      $itemsArray[5] = 'USE';
      $itemsArray[6] = 'TRA';
      $itemsArray[7] = 'OTR';   
      $itemsArray[8] = 'DDC';
    
    return $itemsArray;
  }
}