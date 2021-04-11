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
                'tel' => '010-162 92 00',
                'admin_id' => '1',
                'city_id' => '1',

        ]);
        }

        if (Restaurant::where('name', 'Blackstone Steakhouse')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Blackstone Steakhouse',
                'description' => 'Blackstone Steakhouse är en av Göteborgs nyaste och mest spännande restauranger. ',
                'address' => 'Kungstorget 3',
                'tel' => '031-12 02 20',
                'admin_id' => '1',
                'city_id' => '2',
        ]);
        }

        if (Restaurant::where('name', 'Stockholms vinkällare')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Stockholms vinkällare',
                'description' => 'Hos oss på Stockholms vinkällare hittar du en unik festvåning mitt i Stockholm. ',
                'address' => 'Döbelnsgatan 8',
                'tel' => '08-21 43 30',

                'admin_id' => '1',
                'city_id' => '3',
        ]);
        }

        if (Restaurant::where('name', 'Rådhuskällaren')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Rådhuskällaren',
                'description' => 'En av Malmös äldsta restauranger. ',
                'address' => 'Kompanigatan 5',
                'tel' => '040-22 43 55',

                'admin_id' => '1',
                'city_id' => '1',
        ]);
        }

        if (Restaurant::where('name', 'Lisebergs Pizza Hut')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Lisebergs Pizza Hut',
                'description' => 'Välkommen till pizzahut inne på vårt nöjesfält liseberg. ',
                'address' => 'lisebergsgatan 3',
                'tel' => '031-91 11 30',

                'admin_id' => '1',
                'city_id' => '2',
        ]);
        }

        if (Restaurant::where('name', 'Restaurang Dramaten')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Restaurang Dramaten',
                'description' => 'Magnifik utsikt över nybroviken. ',
                'address' => 'Nybroplan ',
                'tel' => '08-99 88 77',

                'admin_id' => '1',
                'city_id' => '3',
        ]);
        }

    }
}
