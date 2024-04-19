<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    // Table name
		protected $table = 'counties';
	// Primary Key
		public $primaryKey = 'id';

	// Relationships
		// Each county has many cities
			public function cities()
			{
				return $this->hasMany('App\City');
			}
		// Each county belongs to one province
			public function province()
			{
				return $this->belongsTo('App\Province');
			}		
		// Each county has many addresses
			public function addresses()
			{
				return $this->hasMany('App\Address');
			}
		// Each county has many suppliers
			public function suppliers()
			{
				return $this->hasMany('App\Supplier');
			}
}
