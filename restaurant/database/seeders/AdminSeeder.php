<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('email', 'peter.persson@medieinstitutet.se')->doesntExist()) {

            User::create( [
        // Create initial user
                'name' => 'Peter Persson',
                'email' => 'peter.persson@medieinstitutet.se',
                'password' => Hash::make('password1'),
        ]);
        }

    }
}
