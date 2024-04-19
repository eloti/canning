<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Doc extends Model
{
  // Table name
  protected $table = 'docs';
  // Primary Key
  public $primaryKey = 'id';

  protected $fillable = ['date', 'type_doc', 'num_doc', 'client_id', 'total', 'doc_x_rate', 'due_date', 'application', 'saldo', 'obs', 'oc', 'user_id', 'PtoVta', 'Concepto', 'DocTipo', 'DocNro', 'CbteDesde', 'CbteHasta', 'MonId', 'MonCotiz', 'CbteTipo', 'ImpNeto', 'Iva27', 'Iva21', 'Iva10', 'Iva5', 'Iva2', 'Iva0', 'ImpTrib', 'Iva20', 'Iva10u', 'ImpTotal', 'Opcionales'];

  // saqué de fillable: rental_id, unit_id

  // Relationships
  // Each Doc has many DocDetails
  public function docDetails()
  {
  	return $this->hasMany('App\DocDetail');
  }
  // Each Doc belongs to one Client
  public function client()
  {
    return $this->belongsTo('App\Client');
  }
  // A Doc may have many rentals
  public function rentals()
  {
    return $this->belongsToMany('App\Rental');
  }
  // A Doc has only one rental
  public function op()
  {
    return $this->belongsTo('App\Op');
  }

  //Time functions
  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }
  public function date()
  {
    $date = new Carbon($this->date);
    return $date->format('d-m-Y');
  }
  public function afip_date()
  {
    $date = new Carbon($this->date);
    return $date->format('Ymd');
  }
  public function due_date()
  {
    $date = new Carbon($this->due_date);
    return $date->format('d-m-Y');
  }
  public function afip_due_date()
  {
    $date = new Carbon($this->due_date);
    return $date->format('Ymd');
  }
  public function cred_date()
  {
    $date = new Carbon($this->cred_date);
    return $date->format('d-m-Y');
  }
  public function CAEFchVto()
  {
    $date = new Carbon($this->CAEFchVto);
    return $date->format('d-m-Y');
  }
}
