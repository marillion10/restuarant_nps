<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Suggestion::where('name', 'Restaurang Peder Hans')->doesntExist()) {

            Suggestion::create( [
        // Create initial user
                'name' => 'Restaurang Peder Hans',
                'address' => 'Pellesgatan 2 ',
                'tel' => '040-99 55 77',
                'description' => 'Kattarpstorgets bästa restaurang. ',
        ]);
        }

    }
    
}
