<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string(''code_client'', 8)->nullable();
			$table->string(''nom_client'', 16)->nullable();
			$table->string(''code_agence'', 5)->nullable();
			$table->string(''pays_residence'', 3)->nullable();
			$table->string(''pays_nationalite'', 3)->nullable();
			$table->string(''dtnais'', 8)->nullable();
			$table->string(''sexe'', 1)->nullable();
			$table->string(''adr1'', 32)->nullable();
			$table->string(''adresse'', 32)->nullable();
			$table->string(''numero_piece'', 32)->nullable();
			$table->string(''adr5'', 32)->nullable();
			$table->string(''situation'', 32)->nullable();
			$table->string(''date_naissance'', 32)->nullable();
			$table->string(''nom_mere'', 32)->nullable();
			$table->string(''contact'', 16)->nullable();
			$table->dateTime('created_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}
