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
        if (County::where('name', 'Skånelän')->doesntExist()) {

            County::create( [
        // Create initial user
                'name' => 'Skånelän',
                'admin_id' => '2'
        ]);
        }

        if (County::where('name', 'Västra Götalandslän')->doesntExist()) {

            County::create( [
        // Create initial user
                'name' => 'Västra Götalandslän',
                'admin_id' => '2'
        ]);
        }

        if (County::where('name', 'Stockholmslän')->doesntExist()) {

            County::create( [
        // Create initial user
                'name' => 'Stockholmslän',
                'admin_id' => '2'
        ]);
        }
    }
}
