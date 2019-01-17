<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'created_at', 'updated_at',
	];

	/**
	 * Get rows for the hall.
	 */
	public function rows()
	{
		return $this->hasMany('App\Row');
	}

	/**
	 * Get seats for the hall
	 */
	public function seats()
	{
		return $this->hasManyThrough('App\Seat', 'App\Row');
	}

	/**
	 * Get sessions for the hall.
	 */
	public function sessions()
	{
		return $this->hasMany('App\Session');
	}
}
