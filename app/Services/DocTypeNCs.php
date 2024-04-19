<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class DocTypeNCs
{   

  public function get()
  {
    $docTypeNCsArray[''] = 'Tipo de Doc';
    $docTypeNCsArray[7] = 'NCA';
    $docTypeNCsArray[8] = 'NCB';
    $docTypeNCsArray[9] = 'NCC';
    $docTypeNCsArray[21] = 'NCEA';    
    $docTypeNCsArray[22] = 'NCEB';    
    $docTypeNCsArray[23] = 'NCEC';    
    
    return $docTypeNCsArray;
  }
}
