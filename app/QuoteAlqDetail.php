<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteAlqDetail extends Model
{
    // Table name
    protected $table = 'quotes_alq_details';
    // Primary Key
    public $primaryKey = 'id';

    // Relationships
    // Each QuoteAlqDetail belongs to one QuoteAlq
    public function quoteAlq()
    {
        return $this->belongsTo('App\QuoteAlq');
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
