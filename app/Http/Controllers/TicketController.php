<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;

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
	}
}
