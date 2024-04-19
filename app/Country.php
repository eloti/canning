<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Table name
		protected $table = 'countries';
	// Primary Key
		public $primaryKey = 'id';


		// Relationships
		// Each country has many provinces
			public function provinces()
			{
				return $this->hasMany('App\Province');
			}
		// Each country has many addresses
			public function addresses()
			{
				return $this->hasMany('App\Address');
			}
		// Each country has many suppliers
			public function suppliers()
			{
				return $this->hasMany('App\Supplier');
			}
		// Each country has many clients
			public function clients()
			{
				return $this->hasMany('App\Client');
			}
		// Each country has many users
  			public function users()
  			{
    			return $this->hasMany('App\User');
  			}
		
}
