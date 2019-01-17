<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'created_at', 'updated_at',
	];

	/**
	 * Get the the user that owns the ticket.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the the session of the ticket.
	 */
	public function session()
	{
		return $this->belongsTo('App\Session');
	}

	/**
	 * Get the the seat of the ticket.
	 */
	public function seat()
	{
		return $this->belongsTo('App\Seat');
	}
}
