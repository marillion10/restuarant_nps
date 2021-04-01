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
                'name' => 'Skåne Boulebar',
                'description' => 'Mitt på Drottningtorget i Malmö, i det gamla ridhuset från 1800-talet.',
                'address' => 'Drottningtorget 8',
                'admin_id' => '1',
                'city_id' => '1',

        ]);
        }

        if (Restaurant::where('name', 'Blackstone Steakhouse')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Blackstone Steakhouse',
                'description' => 'Blackstone Steakhouse är en av Göteborgs nyaste och mest spännande restauranger. ',
                'address' => ' Kungstorget 3',
                'admin_id' => '1',
                'city_id' => '2',
        ]);
        }

        if (Restaurant::where('name', 'Stockholms vinkällare')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Västra Götalands restuarant',
                'description' => 'Hos oss på Stockholms vinkällare hittar du en unik festvåning mitt i Stockholm. ',
                'address' => ' mjölgatan 2',
                'admin_id' => '3',
                'city_id' => '2',
        ]);
        }

         if (Restaurant::where('name', 'Stockholms vinkällare')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Stockholms vinkällare',
                'description' => 'Hos oss på Stockholms vinkällare hittar du en unik festvåning mitt i Stockholm. ',
                'address' => ' Döbelnsgatan 8',
                'admin_id' => '1',
                'city_id' => '3',
        ]);
        }

    }
}
