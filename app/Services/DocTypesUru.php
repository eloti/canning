<?php

namespace App\Services;

class DocTypesUru
{   

  public function get()
  {
    $docTypesArray[''] = 'Tipo de Doc';
    $docTypesArray[10] = 'CHE';
    $docTypesArray[11] = 'CPD';
    $docTypesArray[12] = 'TRF';
    $docTypesArray[13] = 'EFE';
    $docTypesArray[14] = 'RET';
    $docTypesArray[24] = 'COMP';
    $docTypesArray[50] = 'FCA';
    $docTypesArray[51] = 'NDA';
    $docTypesArray[52] = 'NCA';
    
    return $docTypesArray;
  }

  public function retrieve($x)
  {
    $cotiItemsArray[''] = 'v';
    $docTypesArray[10] = 'CHE';
    $docTypesArray[11] = 'CPD';
    $docTypesArray[12] = 'TRF';
    $docTypesArray[13] = 'EFE';
    $docTypesArray[14] = 'RET';
    $docTypesArray[24] = 'COMP';
    $docTypesArray[50] = 'FCA';
    $docTypesArray[51] = 'NDA';
    
    return $docTypesArray[$x];
  }

}
