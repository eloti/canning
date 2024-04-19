<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class DocTypeInvoicesUru
{   

  public function get()
  {
    $docTypeInvoicesUruArray[''] = 'Tipo de Doc';
    $docTypeInvoicesUruArray[50] = 'e-Factura A';
    $docTypeInvoicesUruArray[53] = 'e-Ticket FC';
    
    return $docTypeInvoicesUruArray;
  }
}