<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

  protected $fillable = [
    'name',
    'position',
    'email',
    'cell_phone',
    'phone',
    'extension',
  
];

    // Table name
    protected $table = 'contacts';
    // Primary Key
    public $primaryKey = 'id';

    // Relationships
    // Each contact has only one client
    public function client()
    {
      return $this->belongsTo('App\Client');
    }
    // Each contact may have many rentals
    public function rentals()
    {
      return $this->hasMany('App\Rental');
    }
    // Each contact may have many quotes
    public function cotis()
    {
      return $this->hasMany('App\Coti');
    }
    // Each contact may have many remitos
    public function remitos()
    {
        return $this->hasMany('App\Remito');
    }
    // Each contact may have many remitodevs
    public function remitodevs()
    {
        return $this->hasMany('App\Remitodev');
    }
}
