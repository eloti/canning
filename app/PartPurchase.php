<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PartPurchase extends Model
{
  // Table name
  protected $table = 'part_purchases';
  // Primary Key
  public $primaryKey = 'id';

  public function scopeSearch($query, $q)
    {
    if ($q == null) return $query; // If there is no search query
    return $query
      ->Where('supplier_id', 'LIKE', "%{$q}%");
    }


  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }

  // Relationships
  // Each Purchase has one Part
  public function part()
  {
    return $this->belongsTo('App\Part');
  }
  // Each Purchase has one Supplier
  public function supplier()
  {
    return $this->belongsTo('App\Supplier');
  }
}
