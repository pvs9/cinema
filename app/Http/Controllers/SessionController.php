<?php

namespace App\Http\Controllers;

use App\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SessionController extends Controller
{
	public function get(Request $request, $id = null)
	{
		if (!$id) {
			$sessions =  Session::where('date', '>=', Carbon::now())
				->with('film', 'hall.cinema', 'tickets')
				->orderBy('date', 'asc')
				->get();

			$available = $sessions->filter(function ($model) {
				print($model->tickets()->count());
				return $model->tickets()->count() < $model->hall->seats()->count();
			});

			return view('session', ['sessions' => $available]);
		}
		else {
			$session = Session::with('film', 'hall.cinema', 'tickets')
				->where('id', $id)
				->first();

			if (!$session) {
				$request->session()->flash('status', 'No such session found!');
				return redirect()->back();
			}
			else {
				$available_seats = $session->hall->seats->filter(function ($model) use ($session) {
					foreach($session->tickets as $ticket) {
						if ($ticket->seat->is($model)) return false;
					}
					return true;
				});

				return view('session', ['session' => $session, 'seats' => $available_seats]);
			}
		}
	}
}
