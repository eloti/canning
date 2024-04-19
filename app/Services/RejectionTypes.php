<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class RejectionTypes
{   

  public function get()
  {
    $rejectionTypeArray[1] = 'Precio';
    $rejectionTypeArray[2] = 'Plazo de entrega';
    $rejectionTypeArray[3] = 'Servicio Postventa';    
    $rejectionTypeArray[4] = 'Especificaciones';
    $rejectionTypeArray[5] = 'Venció';  
    $rejectionTypeArray[6] = 'Otro';  
    
    return $rejectionTypeArray;
  }
}