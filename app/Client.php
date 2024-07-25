<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

  protected $fillable = [
    'legal_name',
    'commercial_name',
    'cuit_type',
    'cuit_num',
    'vat_status',
    'sales_tax_rate',
    'payment_terms',
    'rubro'
    // Agrega los demás campos aquí si es necesario
];
    // Table name
    protected $table = 'clients';
    // Primary Key
    public $primaryKey = 'id';

    public function scopeSearch($query, $q)
    {
        if ($q == null) {
            return $query; // If there is no search query
        }
        
        return $query
            ->where('legal_name', 'LIKE', "%{$q}%")
            ->orWhere('id', 'LIKE', "%{$q}%")
            ->orWhere('commercial_name', 'LIKE', "%{$q}%");
    }
    
    // Relationships
    // Each client may have many contacts
    public function contacts()
    {
      return $this->hasMany('App\Contact');
    }
    // Each client may have many addresses
    public function addresses()
    {
      return $this->hasMany('App\Address');
    }
    // Each client may have many comments
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
    // Each client may have many rentals
    public function rentals()
    {
      return $this->hasMany('App\Rental');
    }
     // Each client may have many cotis
    public function cotis()
    {
      return $this->hasMany('App\Coti');
    }
     // Each client may have many reservations
    public function reservations()
    {
      return $this->hasMany('App\Reservation');
    }
    // Each client has only one country
    public function country()
    {
      return $this->belongsTo('App\Country');
    }
    
    // Each client has many invoices
    public function invoices()
    {
      return $this->hasMany('App\Invoice');
    }
    // Each client has many credit notes
    public function creditNotes()
    {
      return $this->hasMany('App\CreditNote');
    }
    // Each client has many Docs
    public function docs()
    {
      return $this->hasMany('App\Doc');
    }
}
