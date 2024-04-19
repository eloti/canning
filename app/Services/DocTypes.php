<?php

namespace App\Services;

class DocTypes
{   

  public function get()
  {
    $docTypesArray[''] = 'Tipo de Doc';
    $docTypesArray[1] = 'FCA';
    $docTypesArray[2] = 'FCB';
    $docTypesArray[3] = 'FCC';
    $docTypesArray[4] = 'NDA';
    $docTypesArray[5] = 'NDB';
    $docTypesArray[6] = 'NDC';
    $docTypesArray[7] = 'NCA';
    $docTypesArray[8] = 'NCB';
    $docTypesArray[9] = 'NCC';
    $docTypesArray[10] = 'CHE';
    $docTypesArray[11] = 'CPD';
    $docTypesArray[12] = 'TRF';
    $docTypesArray[13] = 'EFE';
    $docTypesArray[14] = 'RET';
    $docTypesArray[15] = 'FCEA';
    $docTypesArray[16] = 'FCEB';
    $docTypesArray[17] = 'FCEC';
    $docTypesArray[18] = 'NDEA';
    $docTypesArray[19] = 'NDEB';
    $docTypesArray[20] = 'NDEC';
    $docTypesArray[21] = 'NCEA';
    $docTypesArray[22] = 'NCEB';
    $docTypesArray[23] = 'NCEC';
    $docTypesArray[24] = 'COMP';
        $docTypesArray[50] = 'FCA';
    $docTypesArray[51] = 'NDA';
    $docTypesArray[52] = 'NCA';
    $docTypesArray[53] = '??';
    return $docTypesArray;
  }
}
