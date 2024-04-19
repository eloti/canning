<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    // Table name
    protected $table = 'parts';
    // Primary Key
    public $primaryKey = 'id';

    public function scopeSearch($query, $q)
    {
    if ($q == null) return $query; // If there is no search query
    return $query
      ->where('ident', 'LIKE', "%{$q}%")
      ->orWhere('description', 'LIKE', "%{$q}%")
      ->orWhere('dimension', 'LIKE', "%{$q}%")
      ->orWhere('part_brand_id', 'LIKE', "%{$q}%")
      ->orWhere('cat_code_1_id', 'LIKE', "%{$q}%")
      ->orWhere('cat_code_2_id', 'LIKE', "%{$q}%")
      ->orWhere('supplier_id', 'LIKE', "%{$q}%");
    }

    // Relationships
    // Each Part may have more than one Supplier
    public function suppliers()
    {
        return $this->belongsToMany('App\Supplier');
    }
    // Each Part belongs to one Supplier Brand
    public function partBrand()
    {
      return $this->belongsTo('App\PartBrand');
    }
    // Each Part may have more than one Stock
    public function stocks()
    {
        return $this->belongsToMany('App\Stock');
    }
    // Each Part may have more than one Purchase
    public function partPurchases()
    {
        return $this->belongsToMany('App\PartPurchase');
    }
    // Each Part has a Cat Code 1
    public function catCode1()
    {
      return $this->hasOne('App\CatCode1');
    }

  
}
