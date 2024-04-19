<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	// Table name
		protected $table = 'cities';
	// Primary Key
		public $primaryKey = 'id';
	// Mass assignable
		protected $guarded = [];

	// Relationships
		// Each city belongs to one county
			public function county()
			{
				return $this->belongsTo('App\County');
			}
			// Each city has many addresses
			public function addresses()
			{
				return $this->hasMany('App\Address');
			}
			// Each city has many suppliers
			public function suppliers()
			{
				return $this->hasMany('App\Supplier');
			}
}
