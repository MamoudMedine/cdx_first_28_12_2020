<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcheancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('echeances', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string(''code_dossier'', 11)->nullable();
			$table->string(''date_echeance'', 8)->nullable();
			$table->string(''capital_restant_du'', 14)->nullable();
			$table->string(''montant_amortissement'', 14)->nullable();
			$table->string(''montant_interet'', 14)->nullable();
			$table->string(''montant_total_echeance'', 14)->nullable();
			$table->string(''numero_echeance'', 3)->nullable();
			$table->string(''date_reglement'', 8)->nullable();
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
		Schema::drop('echeances');
	}

}
