<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoice extends Model
{
  // Table name
  protected $table = 'invoices';
  // Primary Key
  public $primaryKey = 'id';

  // Each invoice belongs to only one rental
  public function rental()
  {
    return $this->belongsTo('App\Rental');
  }
  // Each invoice belongs to only one client
  public function client()
  {
    return $this->belongsTo('App\Client');
  }

  //Time functions
  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }
}
