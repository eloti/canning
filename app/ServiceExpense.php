<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ServiceExpense extends Model
{
    // Table name
  protected $table = 'service_expenses';
  // Primary Key
  public $primaryKey = 'id';

  //Time functions
  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }

  //Relationships
  // Each ServiceExpense has one unit
  public function unit()
  {
    return $this->belongsTo('App\Unit');
  }
  // Each ServiceExpense belongs to one service
  public function service()
  {
    return $this->belongsTo('App\Service');
  }
}
