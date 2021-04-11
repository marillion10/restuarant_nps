<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Link;


class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Link::where('desc', 'Facebook')->doesntExist()) {

            Link::create( [
        // Create initial user
                'url' => 'https://facebook.com',
                'desc' => 'Facebook',
                'linktype_id' => '2',
                'restaurant_id' => '1',

        ]);
        }

        if (Link::where('desc', 'website')->doesntExist()) {

            Link::create( [
        // Create initial user
                'url' => 'http://Boulebar.se',
                'desc' => 'website',
                'linktype_id' => '1',
                'restaurant_id' => '2',

        ]);
        }

    }
}
