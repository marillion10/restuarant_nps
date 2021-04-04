<?php

namespace Database\Seeders;

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
        $this->call([
			AdminSeeder::class,
			CountySeeder::class,
			CitySeeder::class,
			RestaurantSeeder::class,
			TagSeeder::class,
		]);

		// \App\Models\User::factory(10)->create();
    }
}
