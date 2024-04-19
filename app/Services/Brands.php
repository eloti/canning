<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\Brand;

//class Families extends Model
class Brands
{
    public function get()
    {
      $brands = Brand::orderBy('value', 'asc')
      				->get();
      $brandsArray[''] = 'Seleccione Fabricante';
      foreach ($brands as $brand) {
        $brandsArray[$brand->id] = $brand->value;
      }
      return $brandsArray;
    }
}
