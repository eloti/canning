<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class CotiOptionals
{   

  public function get()
  {
    $cotiOpArray[''] = '';
    $cotiOpArray[1] = 'Incluye puesta en marcha inicial.';
    $cotiOpArray[2] = 'Incluye asistencia técnica 24x7.';
    $cotiOpArray[3] = 'No incluye suministro de combustible en el sitio.';
    $cotiOpArray[4] = 'No incluye lucro cesante por fallas técnicas en el equipo.';
    $cotiOpArray[5] = 'A agregar';
    $cotiOpArray[6] = 'A agregar';   
    $cotiOpArray[7] = 'A agregar';
    $cotiOpArray[8] = 'A agregar';
    $cotiOpArray[9] = 'No incluye costo de reparación por eventuales daños que sufra el equipo durante el alquiler por golpes de terceros, operación descuidada o errónea por terceros, incendio de origen externo al equipo, inundación y/o rayados.';
    
    return $cotiOpArray;
  }

  public function retrieve($x)
  {
    $cotiOpArray[''] = 'N/A';
    $cotiOpArray[1] = 'Incluye puesta en marcha inicial.';
    $cotiOpArray[2] = 'Incluye asistencia técnica 24x7.';
    $cotiOpArray[3] = 'No incluye suministro de combustible en el sitio.';
    $cotiOpArray[4] = 'No incluye lucro cesante por fallas técnicas en el equipo.';
    $cotiOpArray[5] = 'A agregar';
    $cotiOpArray[6] = 'A agregar';   
    $cotiOpArray[7] = 'A agregar';
    $cotiOpArray[8] = 'A agregar';
    $cotiOpArray[9] = 'No incluye costo de reparación por eventuales daños que sufra el equipo durante el alquiler por golpes de terceros, operación descuidada o errónea por terceros, incendio de origen externo al equipo, inundación y/o rayados.';
    
    return $cotiOpArray[$x];
  }

  public function show($x) //para mostrar en las cotizaciones pdf
  {
    $cotiOpArray[''] = 'N/A';
    $cotiOpArray[1] = 'Incluye puesta en marcha inicial.';
    $cotiOpArray[2] = 'Incluye asistencia técnica 24x7.';
    $cotiOpArray[3] = 'No incluye suministro de combustible en el sitio.';
    $cotiOpArray[4] = 'No incluye lucro cesante por fallas técnicas en el equipo.';
    $cotiOpArray[5] = 'A agregar';
    $cotiOpArray[6] = 'A agregar';   
    $cotiOpArray[7] = 'A agregar';
    $cotiOpArray[8] = 'A agregar';
    $cotiOpArray[9] = 'No incluye costo de reparación por eventuales daños que sufra el equipo durante el alquiler por golpes de terceros, operación descuidada o errónea por terceros, incendio de origen externo al equipo, inundación y/o rayados.';

    return $cotiOpArray[$x];
  }
}