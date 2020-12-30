<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToActionCommentairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('action_commentaires', function(Blueprint $table)
		{
			$table->foreign('action_id', 'FK_8DDFD4809D32F035')->references('id')->on('actions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_8DDFD480F675F31B')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('action_commentaires', function(Blueprint $table)
		{
			$table->dropForeign('FK_8DDFD4809D32F035');
			$table->dropForeign('FK_8DDFD480F675F31B');
		});
	}

}
