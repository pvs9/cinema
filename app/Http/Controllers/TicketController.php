<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Seat;
use App\Session;
use App\Ticket;

class TicketController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function buy(StoreTicket $request)
	{
		$data = $request->validated();

		$session = Session::find($data['session']);
		$seat = Seat::find($data['seat']);

		if ($request->user()->age < $session->film->age_limit) {
			$request->session()->flash('status', 'Your age is too low to watch this film!');
			return redirect()->back();
		}
		else {
			foreach($session->tickets as $ticket) {
				if ($ticket->seat->is($seat)) {
					$request->session()->flash('status', 'Your seat has been occupied!');
					return redirect()->back();
				}
			}
			$ticket = new Ticket;
			$ticket->session()->associate($session);
			$ticket->seat()->associate($seat);
			$ticket->user()->associate($request->user());
			$ticket->save();

			$request->session()->flash('status', 'You have successfully bought a ticket!');
			return redirect()->back();
		}
	}
}
