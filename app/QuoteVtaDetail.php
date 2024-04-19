<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteVtaDetail extends Model
{
    // Table name
    protected $table = 'quotes_vta_details';
    // Primary Key
    public $primaryKey = 'id';

    // Relationships
    // Each QuoteVtaDetail belongs to one QuoteAlq
    public function quoteVta()
    {
        return $this->belongsTo('App\QuoteVta');
    } 

    // Each quoteDetail belongs to only one branch
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
    // Each quoteDetail belongs to only one family
    public function family()
    {
        return $this->belongsTo('App\Family');
    }
    // Each quoteDetail belongs to only one subfamily
    public function subfamily()
    {
        return $this->belongsTo('App\Subfamily');
    }
    // Each quoteDetail belongs to only one machine_model
    public function machine_model()
    {
        return $this->belongsTo('App\MachineModel');
    }
    
}
