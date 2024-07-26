<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    // Table name
    protected $table = 'comments';

    // Fillable attributes
    protected $fillable = ['user_id', 'client_id', 'comment'];

    // Primary Key
    public $primaryKey = 'id';

    // Relationships
    // Each comment belongs to one client
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    // Each comment belongs to one user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Time functions
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i');
    }
}
