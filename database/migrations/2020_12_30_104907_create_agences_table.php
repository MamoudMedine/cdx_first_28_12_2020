<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agences', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string('nom');
			$table->string('code_agence');
			$table->string('agence_principale');
			$table->string('type');
			$table->string('email')->nullable();
			$table->dateTime('derniere_importation')->nullable();
			$table->dateTime('updated_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('agences');
	}

}
