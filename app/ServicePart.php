<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ServicePart extends Model
{
    // Table name
  protected $table = 'service_parts';
  // Primary Key
  public $primaryKey = 'id';

  //Time functions
  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }

  //Relationships
  // Each ServicePart has one unit
  public function unit()
  {
    return $this->belongsTo('App\Unit');
  }
  // Each ServicePart belongs to one service
  public function service()
  {
    return $this->belongsTo('App\Service');
  }
  // Each ServicePart belongs to one part
  public function part()
  {
    return $this->belongsTo('App\Part');
  }
}
