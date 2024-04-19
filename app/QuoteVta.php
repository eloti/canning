<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class QuoteVta extends Model
{
    // Table name
    protected $table = 'quotes_vta';
    // Primary Key
    public $primaryKey = 'id';

    protected $fillable = ['client_id', 'contact_id', 'address_id', 'user_id', 'date', 'validez', 'quote_curr', 'payment_terms', 'terms_desc'];

    //Time functions
    public function date()
    {
        $date = new Carbon($this->date);
        return $date->format('d-m-Y');
    }

    // Each rental belongs to only one user (el vendedor)
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // Each rental belongs to only one client
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    // Each rental belongs to only one contact
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    // Each rental belongs to only one address
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
    // Each quote has many QuoteVtaDetails
    public function quoteVtaDetails()
    {
        return $this->hasMany('App\QuoteVtaDetail');
    }
}
