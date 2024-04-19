<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class DocTypeNDsUru
{   

  public function get()
  {
    $docTypeNDsUruArray[''] = 'Tipo de Doc';    
    $docTypeNDsUruArray[51] = 'e-Nota de Débito A';
    $docTypeNDsUruArray[54] = 'e-Ticket ND';
    
    return $docTypeNDsUruArray;
  }
}