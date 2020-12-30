<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnomalieCommentairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('anomalie_commentaires', function(Blueprint $table)
		{
			$table->foreign('anomalie_id', 'FK_17C76131BAF977BB')->references('id')->on('anomalies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_17C76131F675F31B')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('anomalie_commentaires', function(Blueprint $table)
		{
			$table->dropForeign('FK_17C76131BAF977BB');
			$table->dropForeign('FK_17C76131F675F31B');
		});
	}

}
