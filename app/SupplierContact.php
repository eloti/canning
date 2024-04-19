<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{
    // Table name
    protected $table = 'supplier_contacts';
    // Primary Key
    public $primaryKey = 'id';

    // Each SupplierContact has only one Supplier
    public function supplier()
    {
      return $this->belongsTo('App\Supplier');
    }
}
