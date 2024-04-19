<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class DocTypeNCsUru
{   

  public function get()
  {
    $docTypeNCsUruArray[''] = 'Tipo de Doc';
    $docTypeNCsUruArray[52] = 'e-Nota de Crédito A';
    $docTypeNCsUruArray[55] = 'e-Ticket NC';
    
    return $docTypeNCsUruArray;
  }
}
