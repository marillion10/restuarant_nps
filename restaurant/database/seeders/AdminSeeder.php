<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	protected static $users = [
		[
			'name' => 'Peter Persson',
			'email' => 'peter.persson66@medieinstitutet.se',
			'password' => 'password1',
		],
		[
			'name' => 'Nikola Tomasovic',
			'email' => 'nikola.tomasovic@medieinstitutet.se',
			'password' => 'password3',
		],
        [
			'name' => 'Shakir Salman',
			'email' => 'shakir.salman@medieinstitutet.se',
			'password' => 'password3',
		],
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

}
