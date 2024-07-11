<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class SalesTermsCoti
{   

  public function get()
  {
    $salesTermsCotiArray[''] = 'Seleccionar';
    $salesTermsCotiArray[1] = 'Contado Anticipado';
    $salesTermsCotiArray[2] = 'Contado Contraentrega';
    $salesTermsCotiArray[3] = '15FF';
    $salesTermsCotiArray[4] = '30FF';
    $salesTermsCotiArray[5] = '60FF';
    $salesTermsCotiArray[6] = '90FF';
    $salesTermsCotiArray[7] = '120FF';
    $salesTermsCotiArray[8] = 'Otra';

    
    return $salesTermsCotiArray;
  }

  public function retrieve($x)
  { 
    $salesTermsCotiArray[''] = 'Seleccionar';
    $salesTermsCotiArray[1] = 'Contado Anticipado';
    $salesTermsCotiArray[2] = 'Contado Contraentrega';
    $salesTermsCotiArray[3] = '15FF';
    $salesTermsCotiArray[4] = '30FF';
    $salesTermsCotiArray[5] = '60FF';
    $salesTermsCotiArray[6] = '90FF';
    $salesTermsCotiArray[7] = '120FF';
    $salesTermsCotiArray[8] = 'Otra';

    return $salesTermsCotiArray[$x];
  }
}