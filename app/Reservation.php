<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
	// Table name
	protected $table = 'reservations';
	// Primary Key
	public $primaryKey = 'id';

	// Each reservation belongs to one user
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	// Each reservation belongs to one unit
	public function unit()
	{
		return $this->belongsTo('App\Unit');
	}
	// Each reservation belongs to one client
	public function client()
	{
		return $this->belongsTo('App\Client');
	}
	// Each reservation belongs to one branch
	public function branch()
	{
		return $this->belongsTo('App\Branch');
	}

	//Time functions
  	public function created_at()
  	{
    	$date = new Carbon($this->created_at);
    	return $date->format('d-m-Y');
  	}
  	public function start_date()
  	{
    	$date = new Carbon($this->start_date);
    	return $date->format('d-m-Y');
  	}
  	public function end_date()
  	{
    	$date = new Carbon($this->end_date);
    	return $date->format('d-m-Y');
  	}

}
