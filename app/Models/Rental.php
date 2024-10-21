<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rental extends Model
{
  // Table name
  protected $table = 'rentals';
  // Primary Key
  public $primaryKey = 'id';

  // Each rental belongs to only one user (el vendedor)
  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
  // Each rental belongs to only one client
  public function client()
  {
    return $this->belongsTo('App\Client');
  }
  // Each rental belongs to only one contact
  public function contact()
  {
    return $this->belongsTo('App\Models\Contact');
  }
  // Each rental belongs to only one address
  public function address()
  {
    return $this->belongsTo('App\Address');
  }
 // Each rental belongs to only one unitModel
  public function unitModel()
  {
    return $this->belongsTo('App\Models\UnitModel');
  }
  
  // Each rental has one credit note
  //public function creditNote()
  //{
    //return $this->hasOne('App\CreditNote');
  //}
  // Each rental has one Doc
  //public function doc()
  //{
    //return $this->hasOne('App\Doc');
  //}
  // Each rental has one remito
  //public function remito()
  //{
    //return $this->hasOne('App\Remito'); //antes tenía hasOne o belnogsTo?
  //}
  // Each rental has one remitodev
  //public function remitodev()
  //{
    //return $this->hasOne('App\Remitodev');
  //}

  //Time functions
  public function start_date()
  {
    $date = new Carbon($this->start_date);
    return $date->format('d-m-Y');
  }
  public function end_date()
  {
    $date = new Carbon($this->end_date);
    return $date->format('d-m-Y');
  }
  public function canc_at()
  {
    $date = new Carbon($this->canc_at);
    return $date->format('d-m-Y');
  }
  public function afip_start_date()
  {
    $date = new Carbon($this->start_date);
    return $date->format('Ymd');
  }
  public function afip_end_date()
  {
    $date = new Carbon($this->end_date);
    return $date->format('Ymd');
  }
}

