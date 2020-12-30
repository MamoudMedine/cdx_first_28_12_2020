<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actions', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string('type');
			$table->dateTime('created_at');
			$table->string(''commentaire'', 1000)->nullable();
			$table->string(''contact'', 1000)->nullable();
			$table->string('code_dossier');
			$table->string('code_client');
			$table->string('code_agence')->nullable();
			$table->text('action_commentaire')->nullable();
			$table->boolean('specialite')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actions');
	}

}
