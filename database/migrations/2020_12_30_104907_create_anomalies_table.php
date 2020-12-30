<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnomaliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anomalies', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string('code_client');
			$table->string('code_dossier');
			$table->dateTime('created_at');
			$table->string('statut');
			$table->string('type');
			$table->string('dernier_utilisateur');
			$table->string('code_agence')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('anomalies');
	}

}
