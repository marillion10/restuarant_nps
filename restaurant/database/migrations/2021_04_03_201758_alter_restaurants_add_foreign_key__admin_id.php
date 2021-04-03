<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRestaurantsAddForeignKeyAdminId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('restaurants', function (Blueprint $table) {
			$table->foreign('admin_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('restaurants', function (Blueprint $table) {
			$table->dropForeign(['admin_id']);
		});
    }
}
