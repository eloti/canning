<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatCode1 extends Model
{
  // Table name
  protected $table = 'cat_code_1s';
  // Primary Key
  public $primaryKey = 'id';

  	// Each cat_code_1 has many suppliers
	public function suppliers()
	{
		return $this->hasMany('App\Supplier');
	}
	//Each cat_code_1 has many cat_code_2s
	public function cat_code_2s()
	{
		return $this->hasMany('App\CatCode2');
	}
	// Each cat_code_1 may have more than one Part
  	public function parts()
  	{
      return $this->hasMany('App\Part');
  	}
}
