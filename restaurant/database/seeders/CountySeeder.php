<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\County;


class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (County::where('name', 'Skåne län')->doesntExist()) {

            County::create( [
        // Create initial user
                'name' => 'Skåne län',
                'admin_id' => '1',

        ]);
        }

        if (County::where('name', 'Västra Götalands län')->doesntExist()) {

            County::create( [
        // Create initial user
                'name' => 'Västra Götalands län',
                'admin_id' => '1',

        ]);
        }

        if (County::where('name', 'Stockholms län')->doesntExist()) {

            County::create( [
        // Create initial user
                'name' => 'Stockholms län',
                'admin_id' => '1',
        ]);
        }
    }
}
