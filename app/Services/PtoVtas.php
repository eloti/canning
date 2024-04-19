<?php

namespace App\Services;

class PtoVtas
{
    public function get()
    {
      $ptoVtasArray[''] = 'Seleccione Punto de Venta';
      $ptoVtasArray[4] = '4: Por Sistema';
      //$ptoVtasArray[1] = 'Punto de Venta 1';
      $ptoVtasArray[2] = '2: Convencional';
      $ptoVtasArray[3] = '3: Exportación';
      $ptoVtasArray[5] = '5: S/P';

      return $ptoVtasArray;
    }
}
