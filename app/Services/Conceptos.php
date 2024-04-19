<?php

namespace App\Services;

class Conceptos
{
    public function get()
    {
      $conceptosArray[''] = 'Seleccione Concepto';
      $conceptosArray[1] = 'Productos';
      $conceptosArray[2] = 'Servicios';
      $conceptosArray[3] = 'Productos y Servicios';

      return $conceptosArray;
    }
}
