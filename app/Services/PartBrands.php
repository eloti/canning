<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\PartBrand;

//class Families extends Model
class PartBrands
{
    public function get()
    {
      $partBrands = PartBrand::get();
      $partBrandsArray[''] = 'Seleccione Marca';
      foreach ($partBrands as $partBrand) {
        $partBrandsArray[$partBrand->id] = $partBrand->value;
      }
      return $partBrandsArray;
    }
}