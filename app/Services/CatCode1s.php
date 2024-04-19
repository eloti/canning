<?php

namespace App\Services;

//use Illuminate\Database\Eloquent\Model;
use App\CatCode1;

//class Families extends Model
class CatCode1s
{
    public function get()
    {
      $cat_code_1s = CatCode1::orderBy('value', 'asc')
      				->get();
      $cat_code_1sArray[''] = 'Seleccione CC1';
      foreach ($cat_code_1s as $cat_code_1) {
        $cat_code_1sArray[$cat_code_1->id] = $cat_code_1->value;
      }
      return $cat_code_1sArray;
    }

    public function fish($id)
    { 
      if ($id != null)
      {  
        $cat_code_1_value = CatCode1::select('value')
                                    ->where('id', '=', $id)
                                    ->first();
        return $cat_code_1_value->value;
      }
    }
}
