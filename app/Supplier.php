<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    // Table name
    protected $table = 'suppliers2';
    // Primary Key
    public $primaryKey = 'id';

    public function scopeSearch($query, $q)
    {
    if ($q == null) return $query; // If there is no search query
    return $query
      ->where('legal_name', 'LIKE', "%{$q}%")
      ->orWhere('commercial_name', 'LIKE', "%{$q}%");
    }

    // Each supplier may have many contacts
    public function supplierContacts()
    {
      return $this->hasMany('App\SupplierContact');
    }
    // Each Supplier may have more than one Purchase
    public function partPurchases()
    {
        return $this->belongsToMany('App\PartPurchase');
    }
  // Each Supplier has one province
    public function province()
    {
      return $this->belongsTo('App\Province');
    }    
    // Each Supplier has one county
    public function county()
    {
      return $this->belongsTo('App\County');
    }    
    // Each Supplier has one city
    public function city()
    {
      return $this->belongsTo('App\City');
    }    
    // Each Supplier has one cat_code_1
    public function cat_code_1()
    {
      return $this->belongsTo('App\CatCode1');
    }    
}
