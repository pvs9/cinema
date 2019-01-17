<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		factory(App\User::class, 2)->create();

		DB::table('cinemas')->insert([
			'name' => str_random(10),
			'email' => str_random(10).'@gmail.com',
			'address' => str_random(10),
			'phone' => str_random(10),
		]);

		DB::table('halls')->insert([
			'name' => 'Hall 1',
			'cinema_id' => 1,
		]);

		DB::table('films')->insert([
			'name' => str_random(10),
			'length' => '1 час',
			'age_limit' => 15,
			'rating' => 4.2
		]);

		DB::table('rows')->insert([
			'number' => 1,
			'hall_id' => 1,
		]);

		DB::table('seats')->insert([
			'number' => 1,
			'price' => rand(10,100),
			'row_id' => 1,
		]);

		DB::table('sessions')->insert([
			'coefficient' => 2,
			'date' => now(),
			'hall_id' => 1,
			'film_id' => 1,
		]);
    }
}
