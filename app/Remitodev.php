<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Remitodev extends Model
{
  // Table name
  protected $table = 'remitodevs';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each remitodev belongs to only one rental
  public function rental()
  {
    return $this->hasMany('App\Rental'); //antes tenía belongsTo
  }
  // Each remitodev belongs to one contact
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
  public function date_return()
  {
    $date = new Carbon($this->date_time_dispatch);
    return $date->format('d-m-Y');
  }
  public function time_return()
  {
    $date = new Carbon($this->date_time_dispatch);
    return $date->format('G:i');
  }
  public function canc_at()
  {
    $date = new Carbon($this->canc_at);
    return $date->format('d-m-Y');
  }
  public function dispatch_date()
  {
    $date = new Carbon($this->dispatch_date);
    return $date->format('d-m-Y');
  }
  public function reception_date()
  {
    $date = new Carbon($this->reception_date);
    return $date->format('d-m-Y');
  }
  public function reception_time()
  {
    $date = new Carbon($this->reception_time);
    return $date->format('G:i');
  }
}
