<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Supplier;

//class Clients extends Model
class Suppliers
{
  public function get()
  {
    $suppliers = Supplier::get();
    $suppliersArray[''] = 'Seleccione Proveedor';
    foreach ($suppliers as $supplier) {
      $suppliersArray[$supplier->id] = $supplier->legal_name;
    }
    return $suppliersArray;
  }
}