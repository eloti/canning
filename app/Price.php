<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
  // Table name
  protected $table = 'prices';
  // Primary Key
  public $primaryKey = 'id';

 //Relationships
 //Each price belongs to one branch
 public function branch()
 {
   return $this->belongsTo('App\Branch');
 }
 //Each price belongs to one machine model
 public function machineModel()
 {
   return $this->belongsTo('App\MachineModel');
 }
}
