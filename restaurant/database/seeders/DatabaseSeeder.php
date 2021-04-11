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
			CitySeeder::class,
			CountySeeder::class,
			RestaurantSeeder::class,
			TagSeeder::class,
            LinktypeSeeder::class,
            LinkSeeder::class,
            SuggestionSeeder::class,
		]);

		// \App\Models\User::factory(10)->create();
    }
}
