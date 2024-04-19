<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\CatCode2;

//class Families extends Model
class CatCode2s
{
    public function get()
    {
      $cat_code_2s = CatCode2::orderBy('value', 'asc')
      				->get();
      $cat_code_2sArray[''] = 'Seleccione CC2';
      foreach ($cat_code_2s as $cat_code_2) {
        $cat_code_2sArray[$cat_code_2->id] = $cat_code_2->value;
      }
      return $cat_code_2sArray;
    }

    public function fish($id)
    { 
      if ($id != null)
      {
        $cat_code_2_value = CatCode2::select('value')
                                    ->where('id', '=', $id)
                                    ->first();
        return $cat_code_2_value->value;
      }
    }
}
