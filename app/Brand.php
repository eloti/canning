<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  // Table name
  protected $table = 'brands';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each brand may have many machine models
  public function machineModels()
  {
    return $this->hasMany('App\MachineModel');
  }
  // Each brand belongs to many
  public function subfamilies()
  {
    return $this->belongsToMany('App\Subfamily');
  }
}
