<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class CotiItems
{   

  public function get()
  {
    $cotiItemsArray[''] = 'Item';
        
      $cotiItemsArray[1] = 'ALQUILER';
      //$cotiItemsArray[2] = 'ALQ VARIOS';
      $cotiItemsArray[3] = 'TRANSPORTE';
      //$cotiItemsArray[4] = 'ABASTECIMIENTO';
      //$cotiItemsArray[5] = 'SERV PUNTUAL';
      //$cotiItemsArray[6] = 'SERV ABONO';   
      //$cotiItemsArray[7] = 'REPUESTO';
      //$cotiItemsArray[8] = 'EQUIPO NUEVO';
      //$cotiItemsArray[9] = 'EQUIPO USADO';
    
    return $cotiItemsArray;
  }

  public function retrieve($x)
  {
    $cotiItemsArray[''] = 'Item';
        
      $cotiItemsArray[1] = 'ALQUILER';
      //$cotiItemsArray[2] = 'ALQ VARIOS';
      $cotiItemsArray[3] = 'TRANSPORTE';
      //$cotiItemsArray[4] = 'ABASTECIMIENTO';
      //$cotiItemsArray[5] = 'SERV PUNTUAL';
      //$cotiItemsArray[6] = 'SERV ABONO';   
      //$cotiItemsArray[7] = 'REPUESTO';
      //$cotiItemsArray[8] = 'EQUIPO NUEVO';
      //$cotiItemsArray[9] = 'EQUIPO USADO';
    
    return $cotiItemsArray[$x];
  }

  public function show($x) //para mostrar en las cotizaciones pdf
  {
      $cotiItemsArray[1] = 'ALQUILER';
      //$cotiItemsArray[2] = 'ALQ VARIOS';
      $cotiItemsArray[3] = 'TRANSPORTE';
      //$cotiItemsArray[4] = 'ABASTECIMIENTO';
      //$cotiItemsArray[5] = 'SERV PUNTUAL';
      //$cotiItemsArray[6] = 'SERV ABONO';   
      //$cotiItemsArray[7] = 'REPUESTO';
      //$cotiItemsArray[8] = 'EQUIPO NUEVO';
      //$cotiItemsArray[9] = 'EQUIPO USADO';

    return $cotiItemsArray[$x];
  }
}