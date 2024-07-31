<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;

class Industries
{
   public function get()
  { 
      $industryArray[''] = '';
      $industryArray[1] = 'Banco/Financiera';
      $industryArray[2] = 'Electricidad, Gas y Agua';
      $industryArray[3] = 'Comercio Mayorista';
      $industryArray[4] = 'Minorista/Supermercado';
      $industryArray[5] = 'Minería';
      $industryArray[6] = 'Pesca';
      $industryArray[7] = 'Agricultura y Ganadería';
      $industryArray[8] = 'Hotelería y Restaurantes';
      $industryArray[9] = 'Otras Manufacturas';
      $industryArray[10] = 'Alimenticia';
      $industryArray[11] = 'Automotriz';
      $industryArray[12] = 'Siderurgia';
      $industryArray[13] = 'Construcción';
      $industryArray[14] = 'Oil & Gas';
      $industryArray[15] = 'Telecomunicaciones';
      $industryArray[16] = 'Transporte Público';
      $industryArray[17] = 'Alquiler de Maquinaria';
      $industryArray[18] = 'Logística';
      $industryArray[19] = 'Salud';
      $industryArray[20] = 'Administración Pública';
      $industryArray[21] = 'Centro Comercial';
      $industryArray[22] = 'Otros Servicios';
      $industryArray[23] = 'Ingeniería/Instalaciones';
      $industryArray[24] = 'Entretenimiento/Espectáculos';
      $industryArray[25] = 'Consorcio';
    
    return $industryArray;
  }

  public function retrieve($x)
  {
    $industryArray[''] = 'N/A';        
    $industryArray[1] = 'Banco/Financiera';
    $industryArray[2] = 'Electricidad, Gas y Agua';
    $industryArray[3] = 'Comercio Mayorista';
    $industryArray[4] = 'Minorista/Supermercado';
    $industryArray[5] = 'Minería';
    $industryArray[6] = 'Pesca';
    $industryArray[7] = 'Agricultura y Ganadería';
    $industryArray[8] = 'Hotelería y Restaurantes';
    $industryArray[9] = 'Otras Manufacturas';
    $industryArray[10] = 'Alimenticia';
    $industryArray[11] = 'Automotriz';
    $industryArray[12] = 'Siderurgia';
    $industryArray[13] = 'Construcción';
    $industryArray[14] = 'Oil & Gas';
    $industryArray[15] = 'Telecomunicaciones';
    $industryArray[16] = 'Transporte Público';
    $industryArray[17] = 'Alquiler de Maquinaria';
    $industryArray[18] = 'Logística';
    $industryArray[19] = 'Salud';
    $industryArray[20] = 'Administración Pública';
    $industryArray[21] = 'Centro Comercial';
    $industryArray[22] = 'Otros Servicios';
    $industryArray[23] = 'Ingeniería/Instalaciones';
    $industryArray[24] = 'Entretenimiento/Espectáculos';
    $industryArray[25] = 'Consorcio';
    
    return $industryArray[$x];
  }

  public function show($x)
  {
    $industryArray[''] = 'N/A';        
    $industryArray[1] = 'Banco/Financiera';
    $industryArray[2] = 'Electricidad, Gas y Agua';
    $industryArray[3] = 'Comercio Mayorista';
    $industryArray[4] = 'Minorista/Supermercado';
    $industryArray[5] = 'Minería';
    $industryArray[6] = 'Pesca';
    $industryArray[7] = 'Agricultura y Ganadería';
    $industryArray[8] = 'Hotelería y Restaurantes';
    $industryArray[9] = 'Otras Manufacturas';
    $industryArray[10] = 'Alimenticia';
    $industryArray[11] = 'Automotriz';
    $industryArray[12] = 'Siderurgia';
    $industryArray[13] = 'Construcción';
    $industryArray[14] = 'Oil & Gas';
    $industryArray[15] = 'Telecomunicaciones';
    $industryArray[16] = 'Transporte Público';
    $industryArray[17] = 'Alquiler de Maquinaria';
    $industryArray[18] = 'Logística';
    $industryArray[19] = 'Salud';
    $industryArray[20] = 'Administración Pública';
    $industryArray[21] = 'Centro Comercial';
    $industryArray[22] = 'Otros Servicios';
    $industryArray[23] = 'Ingeniería/Instalaciones';
    $industryArray[24] = 'Entretenimiento/Espectáculos';
    $industryArray[25] = 'Consorcio';
    
    return $industryArray[$x];
  }

}
