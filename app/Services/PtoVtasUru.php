<?php

namespace App\Services;

class PtoVtasUru
{
    public function get()
    {
      $ptoVtasArrayUru[''] = 'Seleccione Punto de Venta';
      //$ptoVtasArrayUru[4] = '4: Por Sistema';
      //$ptoVtasArray[1] = 'Punto de Venta 1';
      $ptoVtasArrayUru[2] = '2: Convencional';
      //$ptoVtasArrayUru[3] = '3: Exportación';
      $ptoVtasArrayUru[5] = '5: S/P';

      return $ptoVtasArrayUru;
    }
}
