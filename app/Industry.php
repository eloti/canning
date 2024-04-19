<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
  // Table name
  protected $table = 'industries';
  // Primary Key
  public $primaryKey = 'id';
  
  // Relationships
  // Each industry may have many clients
  public function clients()
  {
    return $this->hasMany('App\Client');
  }
}
