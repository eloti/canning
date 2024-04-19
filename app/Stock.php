<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    // Table name
  protected $table = 'stocks';
  // Primary Key
  public $primaryKey = 'id';

  // Each Stock has one Part
  public function part()
  {
    return $this->belongsTo('App\Part');
  }
}
