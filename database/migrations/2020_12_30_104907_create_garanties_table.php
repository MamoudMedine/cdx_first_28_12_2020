<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarantiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('garanties', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string(''numero_garantie'', 13)->nullable();
			$table->string(''code_dossier'', 11)->nullable();
			$table->string(''code_client'', 8)->nullable();
			$table->string(''libelle'', 32)->nullable();
			$table->string(''montant'', 14)->nullable();
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
		Schema::drop('garanties');
	}

}
