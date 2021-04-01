<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (City::where('name', 'Malmö')->doesntExist()) {

            City::create( [
        // Create initial user
                'name' => 'Malmö',
                'admin_id' => '1',
                'county_id' => '1',

        ]);
        }

        if (City::where('name', 'Göteborg')->doesntExist()) {

            City::create( [
        // Create initial user
                'name' => 'Göteborg',
                'admin_id' => '1',
                'county_id' => '2',


        ]);
        }

        if (City::where('name', 'Stockholm')->doesntExist()) {

            City::create( [
        // Create initial user
                'name' => 'Stockholm',
                'admin_id' => '1',
                'county_id' => '3',

        ]);
        }
    }
}
