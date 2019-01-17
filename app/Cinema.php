<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'address', 'phone', 'email',
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
	 * Get halls for the cinema.
	 */
	public function halls()
	{
		return $this->hasMany('App\Hall');
	}

	/**
	 * Get sessions for the cinema.
	 */
	public function sessions()
	{
		return $this->hasManyThrough('App\Session', 'App\Hall');
	}
}
