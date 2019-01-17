<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeatsTest extends TestCase
{
	/**
	 * A seats ammount test.
	 *
	 * @return void
	 */
	public function testSeatsTest()
	{
		$this->seed();
		$this->be(User::find(1));
		$response = $this->get('/sessions/1/seats');
		$this->assertEquals(200, $response->status());
		$response->assertJsonStructure(['seats']);
	}
}
