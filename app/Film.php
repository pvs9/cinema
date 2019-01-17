<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'length', 'age_limit', 'rating',
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
	 * Get sessions for the film.
	 */
	public function sessions()
	{
		return $this->hasMany('App\Session');
	}
}
