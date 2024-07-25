<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coti extends Model
{
    use HasFactory;
    // Table name
    protected $table = 'cotis';
    // Primary Key
    public $primaryKey = 'id';

    protected $fillable = ['user_id', 'client_id', 'contact_id', 'address_id', 'date', 'validez', 'plazo', 'delivery_date', 'quote_curr', 'payment_terms', 'terms_desc', 'obs', 'op1', 'op2', 'op3', 'op4', 'op5', 'op6', 'op7', 'op8', 'op9', 'op10', 'status', 'rejection', 'status_change', 'comments', 'op11', 'op12', 'op13', 'op14', 'company' ];

    //Time functions
    public function date()
    {
        $date = new Carbon($this->date);
        return $date->format('d-m-Y');
    }
    public function status_change()
    {
        $date = new Carbon($this->status_change);
        return $date->format('d-m-Y');
    }

    public function delivery_date()
    {
        $date = new Carbon($this->delivery_date);
        return $date->format('d-m-Y');
    }

    // Each coti belongs to only one user (el vendedor)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // Each coti belongs to only one client
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    // Each coti belongs to only one contact
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    // Each coti belongs to only one address
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
    // Each coti has many QuoteAlqDetails
    public function cotiDetails()
    {
        return $this->hasMany('App\CotiDet');
    }
}
