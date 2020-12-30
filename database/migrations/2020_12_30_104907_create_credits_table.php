<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credits', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string(''code_dossier'', 11)->nullable();
			$table->string(''code_client'', 8)->nullable();
			$table->string(''pro'', 3)->nullable();
			$table->string(''num_compte_client'', 15)->nullable();
			$table->string(''capital'', 14)->nullable();
			$table->string(''encours_credit'', 14)->nullable();
			$table->string(''capital_total_amorti'', 14)->nullable();
			$table->string(''capital_restant_amorti'', 14)->nullable();
			$table->string(''duree_pret'', 3)->nullable();
			$table->string(''dty'', 1)->nullable();
			$table->string(''ddu'', 3)->nullable();
			$table->string(''mrg'', 2)->nullable();
			$table->string(''tag'', 1)->nullable();
			$table->string(''nom_client'', 32)->nullable();
			$table->string(''obj'', 3)->nullable();
			$table->string(''code_agence'', 5)->nullable();
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
		Schema::drop('credits');
	}

}
