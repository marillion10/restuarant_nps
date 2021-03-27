<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Restaurant::where('name', 'Boulebar')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Boulebar',
                'description' => 'Mitt på Drottningtorget i Malmö, i det gamla ridhuset från 1800-talet.',
                'address' => 'Drottningtorget 8',
                'city' => 'Malmö',
                'admin_id' => '1',

        ]);
        }

        if (Restaurant::where('name', 'Stockholms vinkällare')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Stockholms vinkällare',
                'description' => 'Hos oss på Stockholms vinkällare hittar du en unik festvåning mitt i Stockholm. ',
                'address' => ' Döbelnsgatan 8',
                'city' => 'Stockholm',
                'admin_id' => '1',
        ]);
        }

    }
}
