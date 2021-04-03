<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected static $categories = ['kött','fisk', 'pasta'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (static::$categories as $category) {
            if (Category::where('name', $category)->doesntExist()) {
                Category::create(['name' => $category,
                            'admin_id' => 1
                ]);
            }
        }
    }
}