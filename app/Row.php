<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'number',
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
	 * Get the hall that owns the row.
	 */
	public function hall()
	{
		return $this->belongsTo('App\Hall');
	}

	/**
	 * Get seats for the row.
	 */
	public function seats()
	{
		return $this->hasMany('App\Seats');
	}
}
