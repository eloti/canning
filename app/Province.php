<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    // Table name
		protected $table = 'provinces';
	// Primary Key
		public $primaryKey = 'id';

	// Relationships
		// Each province has many counties
			public function counties()
			{
				return $this->hasMany('App\County');
			}
		// Each province belongs to one country
			public function country()
			{
				return $this->belongsTo('App\Country');
			}
		// Each province has many addresses
			public function addresses()
			{
				return $this->hasMany('App\Address');
			}
		// Each province has many suppliers
			public function suppliers()
			{
				return $this->hasMany('App\Supplier');
			}
		
}
