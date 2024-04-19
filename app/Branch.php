<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  // Table name
  protected $table = 'branches';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each branch has many units
  public function units()
  {
    return $this->hasMany('App\Unit');
  }
  // Each branch has many prices
  public function prices()
  {
    return $this->hasMany('App\Price');
  }
  // Each branch has many rentals
  public function rentals()
  {
    return $this->hasMany('App\Rental');
  }
  // Each branch has many users
  public function users()
  {
    return $this->hasMany('App\User');
  }
}
