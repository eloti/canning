<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class DocTypeCollections
{   

  public function get()
  {
    $docTypeCollectionsArray[''] = 'Tipo de Doc';
    $docTypeCollectionsArray[10] = 'CHE';
    $docTypeCollectionsArray[11] = 'CPD';
    $docTypeCollectionsArray[12] = 'TRF';
    $docTypeCollectionsArray[13] = 'EFE';
    $docTypeCollectionsArray[14] = 'RET';
    $docTypeCollectionsArray[24] = 'COMP';
    
    return $docTypeCollectionsArray;
  }
}
