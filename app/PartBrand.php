<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartBrand extends Model
{
    // Table name
    protected $table = 'part_brands';
    // Primary Key
    public $primaryKey = 'id';

    // Relationships
    // Each PartBrand may have more than one Part
    public function parts()
    {
      return $this->hasMany('App\Part');
    }
  
}
