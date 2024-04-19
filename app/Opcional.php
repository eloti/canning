<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Opcional extends Model
{
  // Table name
  protected $table = 'opcionales';
  // Primary Key
  public $primaryKey = 'Id';

  protected $fillable = ['Id', 'Desc'];

}
