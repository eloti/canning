<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class DocTypeInvoices
{   

  public function get()
  {
    $docTypeInvoicesArray[''] = 'Tipo de Doc';
    $docTypeInvoicesArray[1] = 'FCA';
    $docTypeInvoicesArray[2] = 'FCB';
    $docTypeInvoicesArray[3] = 'FCC';    
    $docTypeInvoicesArray[15] = 'FCEA';
    $docTypeInvoicesArray[16] = 'FCEB';
    $docTypeInvoicesArray[17] = 'FCEC';    
    
    return $docTypeInvoicesArray;
  }
}