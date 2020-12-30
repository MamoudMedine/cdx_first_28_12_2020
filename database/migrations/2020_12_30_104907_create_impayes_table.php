<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpayesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('impayes', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string(''code_dossier'', 11)->nullable();
			$table->string(''procod'', 3)->nullable();
			$table->string(''code_agence'', 5)->nullable();
			$table->string(''date_mise_impayee'', 8)->nullable();
			$table->string(''date_echeance_impayee'', 8)->nullable();
			$table->string(''numero_echeance_impayee'', 3)->nullable();
			$table->string(''phase'', 1)->nullable();
			$table->string(''montant_global_restant'', 14)->nullable();
			$table->string(''montant_interet_journalier_retard'', 14)->nullable();
			$table->string(''montant_total_interet_retard'', 14)->nullable();
			$table->string(''statut_echeance'', 1)->nullable();
			$table->string(''date_dernier_remboursement'', 8)->nullable();
			$table->dateTime('created_at')->nullable();
			$table->string(''montant_dernier_remboursement'', 14)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('impayes');
	}

}
