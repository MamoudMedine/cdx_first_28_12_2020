<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->integer('agence_id')->nullable()->index('IDX_8FB094A1CDEADB2A');
			$table->string('nom_utilisateur')->unique('UNIQ_8FB094A1F85E0677');
			$table->string('password')->nullable();
			$table->text('roles');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
