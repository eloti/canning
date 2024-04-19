<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\SupplierBrand;

//class Families extends Model
class SupplierBrands
{
    public function get()
    {
      $supplierBrands = SupplierBrand::get();
      $supplierBrandsArray[''] = 'Seleccione Marca';
      foreach ($supplierBrands as $supplierBrand) {
        $supplierBrandsArray[$supplierBrand->id] = $supplierBrand->value;
      }
      return $supplierBrandsArray;
    }
}