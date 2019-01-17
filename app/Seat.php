<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'number', 'price',
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
	 * Get the the row that owns the seat.
	 */
	public function row()
	{
		return $this->belongsTo('App\Row');
	}

	/**
	 * Get the the tickets for the seat.
	 */
	public function tickets()
	{
		return $this->hasMany('App\Ticket');
	}
}
