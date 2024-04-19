<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineModel extends Model
{
  // Table name
  protected $table = 'machine_models';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each machine model has many units may have many machine models
  public function units()
  {
    return $this->hasMany('App\Unit');
  }
  // Each machine model belongs to only one family
  public function family()
  {
    return $this->belongsTo('App\Family');
  }
  // Each machine model belongs to only one subfamily
  public function subfamily()
  {
    return $this->belongsTo('App\Subfamily');
  }
  // Each machine model belongs to only one brand
  public function brand()
  {
    return $this->belongsTo('App\Brand');
  }
  // Each machine model has only one spec
  public function spec()
  {
    return $this->hasOne('App\Spec');
  }
  // Each machine model has many prices
  public function prices()
  {
    return $this->hasMany('App\Price');
  }
  // Each machine model has many rentals
  public function rentals()
  {
    return $this->hasMany('App\Rental');
  }
  // Each machine model has many quotes
  public function quotesAlq()
  {
    return $this->hasMany('App\QuoteAlqDetail');
  }
  // Each machine model has many quotes
  public function quotesVta()
  {
    return $this->hasMany('App\QuoteVtaDetail');
  }
  // Each machine model may have more than one Renter
  public function renters()
  {
      return $this->belongsToMany('App\Renter');
  }
}
