<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DocDetail extends Model
{
  // Table name
  protected $table = 'doc_details';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each DocDetail belongs to one Doc
  public function doc()
  {
  	return $this->belongsTo('App\Doc');
  }
  public function rental()
  {
    return $this->belongsTo('App\Rental');
  }
  

  //Time functions
  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }
  
}
