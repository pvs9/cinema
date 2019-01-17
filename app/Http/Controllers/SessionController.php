<?php

namespace App\Http\Controllers;

use App\Session;
use Carbon\Carbon;

class SessionController extends Controller
{
	public function get()
	{
		$sessions =  Session::where('date', '>=', Carbon::now())
			->with('film', 'hall.cinema', 'tickets')
			->get();

		$available = $sessions->filter(function ($model) {
			print($model->tickets()->count());
			return $model->tickets()->count() < $model->hall->seats()->count();
		});

		return $available;
	}
}
