<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    // Table name
  protected $table = 'specs';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // each spec belongs to only one model
  public function machineModel()
  {
    return $this->belongsTo('App\MachineModel');
  }
}
