<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Category::where('name', 'Pizza')->doesntExist()) {

            Category::create( [
        // Create initial user
                'name' => 'Pizza',
                'admin_id' => '1',

        ]);
        }

        if (Category::where('name', 'Kött')->doesntExist()) {

            Category::create( [
        // Create initial user
                'name' => 'Kött',
                'admin_id' => '1',

        ]);
        }

        if (Category::where('name', 'Fisk')->doesntExist()) {

            Category::create( [
        // Create initial user
                'name' => 'Fisk',
                'admin_id' => '1',
        ]);
        }
    }
}
