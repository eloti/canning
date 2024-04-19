<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\PasswordResetServiceProvider;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname', 'alias', 'email', 'clearance', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Each user may have many rentals
    public function rentals()
    {
      return $this->hasMany('App\Rental');
    }
    // Each user may have many cotis
    public function Cotis()
    {
      return $this->hasMany('App\Coti');
    }
    // Each user may have many comments
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
    // Each user belongs to one country
    public function country() {
        return $this->belongsTo('App\Country');
    }
    // Each user belongs to one branch
    public function branch() {
        return $this->belongsTo('App\Branch');
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
        return $date->format('d-m-Y');
    }       

}
