<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotiDet extends Model
{
    use HasFactory;
    // Table name
    protected $table = 'coti_dets';
    // Primary Key
    public $primaryKey = 'id';
}
