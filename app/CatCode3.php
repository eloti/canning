<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatCode3 extends Model
{	
	// Table name
  	protected $table = 'cat_code_3s';
  	// Primary Key
  	public $primaryKey = 'id';
  	
    // Each CatCode3 belongs to only one CatCode2
  	public function CatCode2()
  	{
    	return $this->belongsTo('App\CatCode2');
  	}
}
