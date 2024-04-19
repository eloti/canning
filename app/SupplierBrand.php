<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierBrand extends Model
{
    // Table name
    protected $table = 'supplier_brands';
    // Primary Key
    public $primaryKey = 'id';

    // Relationships
  	// Each SupplierBrand may have more than one Part
  	public function parts()
  	{
      return $this->hasMany('App\Part');
  	}
}
