<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitModel extends Model
{
  // Table name
  protected $table = 'unit_models';
  // Primary Key
  public $primaryKey = 'id';

  // Each unitModel may have many rentals
  public function rentals()
  {
    return $this->hasMany('App\Rental');
  }

}
