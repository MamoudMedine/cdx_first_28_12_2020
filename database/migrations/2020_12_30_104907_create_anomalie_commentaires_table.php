<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnomalieCommentairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anomalie_commentaires', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->integer('anomalie_id')->index('IDX_17C76131BAF977BB');
			$table->integer('user_id')->index('IDX_17C76131F675F31B');
			$table->text('contenu')->nullable();
			$table->dateTime('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('anomalie_commentaires');
	}

}
