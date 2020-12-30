<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionCommentairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('action_commentaires', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->integer('action_id')->index('IDX_8DDFD4809D32F035');
			$table->integer('user_id')->index('IDX_8DDFD480F675F31B');
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
		Schema::drop('action_commentaires');
	}

}
