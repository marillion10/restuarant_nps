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
        if (Restaurant::where('name', 'SkåneRestaurang')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'SkåneRestaurang',
                'description' => 'Skånes bästa restaurang',
                'address' => 'Skånevägen 1',
                'admin_id' => '2',
                'city_id' => '1',
                
        ]);
        }

        if (Restaurant::where('name', 'Västra GötalandRestaurang')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'Västra GötalandRestaurang',
                'description' => 'Göteborgs bästa restaurang',
                'address' => 'Göteborgvägen 2',
                'admin_id' => '2',
                'city_id' => '2',
        ]);
        }

        if (Restaurant::where('name', 'StockholmRestaurang')->doesntExist()) {

            Restaurant::create( [
        // Create initial user
                'name' => 'StockholmRestauran',
                'description' => 'Stockholms bästa restaurang',
                'address' => 'Stockholmsvägen 3',
                'admin_id' => '2',
                'city_id' => '3',
        ]);
        }
    }
}
