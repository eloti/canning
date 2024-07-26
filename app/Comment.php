<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
  // Table name

  protected $fillable = ['user_id', 'client_id'];

  protected $table = 'comments';
  // Primary Key
  public $primaryKey = 'id';

  // Relationships
  // Each comment has only one client
  public function client()
  {
    return $this->belongsTo('App\Client');
  }
  // Each commento belongs to one user
  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  //Time functions
  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }
  public function updated_at()
  {
    $date = new Carbon($this->updated_at);
    return $date->format('d-m-Y H:i');
  }
}
