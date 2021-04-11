<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    protected static $tags = ['Sushi','Fisk', 'Pasta', 'Pizza', 'A la carté', 'Falafel'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (static::$tags as $tag) {
            if (Tag::where('name', $tag)->doesntExist()) {
                Tag::create(['name' => $tag,
                            'admin_id' => 1]);
            }
        }
    }
}