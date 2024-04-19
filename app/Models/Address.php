<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'address_line_1',
        'address_line_2',
        'city_id',
        'city_name',
        'county_id',
        'county_name',
        'province_id',
        'postal_code',
        'billing_address',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
