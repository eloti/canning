<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Unit extends Model
{
  // Table name
  protected $table = 'units';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each unit belongs to one machine model
  public function machineModel()
  {
    return $this->belongsTo('App\MachineModel');
  }
  // Each unit may have many rentals
  public function rentals()
  {
    return $this->hasMany('App\Rental');
  }
  // Each unit may have many services
  public function services()
  {
    return $this->hasMany('App\Service');
  }
  // Each unit may have many serviceHours
  public function serviceHours()
  {
    return $this->hasMany('App\ServiceHour');
  }
  // Each unit may have many serviceExpenses
  public function serviceExpenses()
  {
    return $this->hasMany('App\ServiceExpense');
  }
  // Each unit belongs to one branch
  public function branch()
  {
    return $this->belongsTo('App\Branch');
  }
  // Each unit belongs to one client (when sold)
  public function client() {
    return $this->belongsTo('App\Client');
  }
  // Each unit belongs to one contact (when sold)
  public function contact() {
    return $this->belongsTo('App\Contact');
  }
  // Each unit belongs to one address (when sold)
  public function address() {
    return $this->belongsTo('App\Address');
  }
  // Each unit belongs to one remito (when sold)
  public function remito() {
    return $this->belongsTo('App\Remito');
  }
  // Each unit belongs to one user (when sold)
  public function user() {
    return $this->belongsTo('App\User');
  }

  //Time functions
  public function purchase_date()
  {
    $date = new Carbon($this->purchase_date);
    return $date->format('d-m-Y');
  }
  public function incorp_date()
  {
    $date = new Carbon($this->incorp_date);
    return $date->format('d-m-Y');
  }
  public function discharged_at()
  {
    $date = new Carbon($this->discharged_at);
    return $date->format('d-m-Y');
  }
}
