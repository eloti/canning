<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class CotiOptionals
{   

  public function get()
  {
    $cotiOpArray[''] = '';
    $cotiOpArray[1] = 'Op 1';
    $cotiOpArray[2] = 'Op 2';
    $cotiOpArray[3] = 'Op 3';
    $cotiOpArray[4] = 'Op 4';
    $cotiOpArray[5] = 'Op 5';
    //$cotiOpArray[6] = 'Conexionado en tablero del cliente (deberá conexionarlo un electricista propio del cliente.';   
    //$cotiOpArray[7] = 'Lucro cesante por fallas técnicas en el equipo.';
    //$cotiOpArray[8] = 'Suministro de combustible en el sitio.';
    //$cotiOpArray[9] = 'Tanque interno de combustible al 100% (devolver en las mismas condiciones).';
    //$cotiOpArray[10] = 'Tanque interno de combustible al 75% (devolver en las mismas condiciones).';
    //$cotiOpArray[11] = 'Tanque interno de combustible al 50% (devolver en las mismas condiciones).';
    //$cotiOpArray[12] = 'Tanque interno de combustible al 25% (devolver en las mismas condiciones).';
    //$cotiOpArray[13] = 'Costo de reposición por lámpara';
    //$cotiOpArray[14] = 'Costo de reparación por eventuales daños que sufra el equipo durante el alquiler por golpes de terceros, operación descuidada o errónea por terceros, incendio de origen externo al equipo, inundación y/o rayados.';
    
    return $cotiOpArray;
  }

  public function retrieve($x)
  {
    $cotiOpArray[''] = 'N/A';
    $cotiOpArray[1] = 'Op 1';
    $cotiOpArray[2] = 'Op 2';
    $cotiOpArray[3] = 'Op 3';
    $cotiOpArray[4] = 'Op 4';
    $cotiOpArray[5] = 'Op 5';
    //$cotiOpArray[6] = 'Conexionado en tablero del cliente (deberá conexionarlo un electricista propio del cliente.';   
    //$cotiOpArray[7] = 'Lucro cesante por fallas técnicas en el equipo.';
    //$cotiOpArray[8] = 'Suministro de combustible en el sitio.';
    //$cotiOpArray[9] = 'Tanque interno de combustible al 100% (devolver en las mismas condiciones).';
    //$cotiOpArray[10] = 'Tanque interno de combustible al 75% (devolver en las mismas condiciones).';
    //$cotiOpArray[11] = 'Tanque interno de combustible al 50% (devolver en las mismas condiciones).';
    //$cotiOpArray[12] = 'Tanque interno de combustible al 25% (devolver en las mismas condiciones).';
    //$cotiOpArray[13] = 'Costo de reposición por lámpara';
    //$cotiOpArray[14] = 'Costo de reparación por eventuales daños que sufra el equipo durante el alquiler por golpes de terceros, operación descuidada o errónea por terceros, incendio de origen externo al equipo, inundación y/o rayados.';
    
    return $cotiOpArray[$x];
  }

  public function show($x) //para mostrar en las cotizaciones pdf
  {
    $cotiOpArray[''] = 'N/A';
    $cotiOpArray[1] = 'Op 1';
    $cotiOpArray[2] = 'Op 2';
    $cotiOpArray[3] = 'Op 3';
    $cotiOpArray[4] = 'Op 4';
    $cotiOpArray[5] = 'Op 5';
    //$cotiOpArray[6] = 'Conexionado en tablero del cliente (deberá conexionarlo un electricista propio del cliente.';   
    //$cotiOpArray[7] = 'Lucro cesante por fallas técnicas en el equipo.';
    //$cotiOpArray[8] = 'Suministro de combustible en el sitio.';
    //$cotiOpArray[9] = 'Tanque interno de combustible al 100% (devolver en las mismas condiciones).';
    //$cotiOpArray[10] = 'Tanque interno de combustible al 75% (devolver en las mismas condiciones).';
    //$cotiOpArray[11] = 'Tanque interno de combustible al 50% (devolver en las mismas condiciones).';
    //$cotiOpArray[12] = 'Tanque interno de combustible al 25% (devolver en las mismas condiciones).';
    //$cotiOpArray[13] = 'Costo de reposición por lámpara';
    //$cotiOpArray[14] = 'Costo de reparación por eventuales daños que sufra el equipo durante el alquiler por golpes de terceros, operación descuidada o errónea por terceros, incendio de origen externo al equipo, inundación y/o rayados.';

    return $cotiOpArray[$x];
  }
}