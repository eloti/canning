<?php

namespace App\Services;

class AllDocTypes
{   

  public function get()
  {
    $allDocTypesArray[''] = 'Tipo de Doc';
    $allDocTypesArray[1] = 'FCA';
    $allDocTypesArray[2] = 'FCB';
    $allDocTypesArray[3] = 'FCC';
    $allDocTypesArray[4] = 'NDA';
    $allDocTypesArray[5] = 'NDB';
    $allDocTypesArray[6] = 'NDC';
    $allDocTypesArray[7] = 'NCA';
    $allDocTypesArray[8] = 'NCB';
    $allDocTypesArray[9] = 'NCC';
    $allDocTypesArray[10] = 'CHE';
    $allDocTypesArray[11] = 'CPD';
    $allDocTypesArray[12] = 'TRF';
    $allDocTypesArray[13] = 'EFE';
    $allDocTypesArray[14] = 'RET';
    $allDocTypesArray[15] = 'FCEA';
    $allDocTypesArray[16] = 'FCEB';
    $allDocTypesArray[17] = 'FCEC';
    $allDocTypesArray[18] = 'NDEA';
    $allDocTypesArray[19] = 'NDEB';
    $allDocTypesArray[20] = 'NDEC';
    $allDocTypesArray[21] = 'NCEA';
    $allDocTypesArray[22] = 'NCEB';
    $allDocTypesArray[23] = 'NCEC';
    $allDocTypesArray[24] = 'COMP';
    $allDocTypesArray[50] = 'FCA';
    $allDocTypesArray[51] = 'NDA';
    $allDocTypesArray[52] = 'NCA';
    
    return $allDocTypesArray;
  }
}
