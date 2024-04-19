<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tributo extends Model
{
	// Table name
	protected $table = 'tributos';
	// Primary Key
	public $primaryKey = 'id';

	// Relationships
  	// Each Tributo belongs to one Doc
  	public function doc()
  	{
  		return $this->belongsTo('App\Doc');
  	} 

}
