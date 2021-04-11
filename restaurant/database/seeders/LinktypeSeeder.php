<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Linktype;

class LinktypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Linktype::where('type', 'website')->doesntExist()) {

            Linktype::create( [
        // Create initial user
                'type' => 'website',
        ]);
        }

        if (Linktype::where('type', 'social')->doesntExist()) {

            Linktype::create( [
        // Create initial user
                'type' => 'social',
        ]);
        }

        if (Linktype::where('type', 'email')->doesntExist()) {

            Linktype::create( [
        // Create initial user
                'type' => 'email',
        ]);
        }
    }
}
