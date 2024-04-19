<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class DocTypeNDs
{   

  public function get()
  {
    $docTypeNDsArray[''] = 'Tipo de Doc';    
    $docTypeNDsArray[4] = 'NDA';
    $docTypeNDsArray[5] = 'NDB';
    $docTypeNDsArray[6] = 'NDC';    
    $docTypeNDsArray[18] = 'NDEA';
    $docTypeNDsArray[19] = 'NDEB';
    $docTypeNDsArray[20] = 'NDEC';
    
    return $docTypeNDsArray;
  }
}