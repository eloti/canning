<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // Table name
    protected $table = 'addresses2';
    // Primary Key
    public $primaryKey = 'id';

    // Relationships
    // Each address has only one client
    public function client()
    {
      return $this->belongsTo('App\Client');
    }
    // Each address may have many rentals
    public function rentals()
    {
      return $this->hasMany('App\Rental');
    }
    // Each address has one country
    public function country()
    {
      return $this->belongsTo('App\Country');
    }
    // Each address has one province
    public function province()
    {
      return $this->belongsTo('App\Province');
    }        
    // Each address has one county
    public function county()
    {
      return $this->belongsTo('App\County');
    }    
    // Each address has one city
    public function city()
    {
      return $this->belongsTo('App\City');
    }    
}
