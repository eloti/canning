<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subfamily extends Model
{
  // Table name
  protected $table = 'subfamilies';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each subfamily may have many machine models
  public function machineModels()
  {
    return $this->hasMany('App\MachineModel');
  }
  // Each subfamily belongs to only one family
  public function family()
  {
    return $this->belongsTo('App\Family');
  }
  // Each subfamily may have many brands
  public function Brands()
  {
    return $this->hasMany('App\Brand');
  }
}
