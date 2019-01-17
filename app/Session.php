<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'coefficient',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'date', 'created_at', 'updated_at',
	];

	/**
	 * Get the tickets for the session.
	 */
	public function tickets()
	{
		return $this->hasMany('App\Ticket');
	}

	/**
	 * Get the the hall that owns the session.
	 */
	public function hall()
	{
		return $this->belongsTo('App\Hall');
	}

	/**
	 * Get the the film that owns the session.
	 */
	public function film()
	{
		return $this->belongsTo('App\Film');
	}
}