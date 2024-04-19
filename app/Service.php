<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Service extends Model
{
    // Table name
  protected $table = 'services';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;


  // Método de fechas
  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }
  public function end_date()
  {
    $date = new Carbon($this->end_date);
    return $date->format('d-m-Y');
  }

  // Relationships
  // Each Service may have more than one ServiceType
  public function serviceTypes()
  {
      return $this->belongsToMany('App\ServiceType');
  }
  // Each Service may have more than one ServiceExpense
  public function serviceExpenses()
  {
      return $this->hasMany('App\ServiceExpense');
  }
  // Each Service may have more than one ServiceHour
  public function serviceHours()
  {
      return $this->hasMany('App\ServiceHour');
  }
  // Each Service may have more than one ServicePart
  public function serviceParts()
  {
      return $this->hasMany('App\ServicePart');
  }
  // Each Service has one unit
  public function unit()
  {
    return $this->belongsTo('App\Unit');
  }
  
}
