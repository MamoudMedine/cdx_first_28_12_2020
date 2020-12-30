<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bills', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string(''code_bill'', 15)->nullable();
			$table->string(''devise'', 3)->nullable();
			$table->string(''date_ouverture'', 8)->nullable();
			$table->string(''date_echeance'', 8)->nullable();
			$table->string(''cumdda'', 16)->nullable();
			$table->string(''cumcda'', 16)->nullable();
			$table->string(''cumdpc'', 16)->nullable();
			$table->string(''cumcpc'', 16)->nullable();
			$table->string(''code_agence'', 5)->nullable();
			$table->string(''code_client'', 8)->nullable();
			$table->string(''atf'', 1)->nullable();
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
		Schema::drop('bills');
	}

}
