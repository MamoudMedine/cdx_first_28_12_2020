<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeblocagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deblocages', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string(''code_dossier'', 11)->nullable();
			$table->string(''montant_deblocage'', 14)->nullable();
			$table->string(''date_deblocage'', 8)->nullable();
			$table->string(''echeance_depart'', 3)->nullable();
			$table->string(''duree_echeance'', 3)->nullable();
			$table->string(''montant_net_echeance'', 14)->nullable();
			$table->dateTime('created_at')->nullable();
			$table->string(''mrg'', 2)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deblocages');
	}

}
