<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
  // Table name
  protected $table = 'families';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each family may have many subfamilies
  public function subfamilies()
  {
    return $this->hasMany('App\Subfamily');
  }
  // Each family may have many brands
  public function brands()
  {
    return $this->hasMany('App\Brand');
  }
  // Each family may have many machine models
  public function machineModels()
  {
    return $this->hasMany('App\MachineModel');
  }

}
