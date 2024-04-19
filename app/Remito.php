<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Remito extends Model
{
  // Table name
  protected $table = 'remitos';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each remito may have more than one rental
  public function rental()
  {
    return $this->hasMany('App\Rental'); //antes tenía belongsTo
  }
  // Each remito belongs to one contact
  public function contact()
  {
    return $this->belongsTo('App\Contact');
  }

  //Time functions
  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }
  public function dispatch_date()
  {
    $date = new Carbon($this->dispatch_date);
    return $date->format('d-m-Y');
  }
  public function dispatch_time()
  {
    $date = new Carbon($this->dispatch_time);
    return $date->format('G:i');
  }
}
