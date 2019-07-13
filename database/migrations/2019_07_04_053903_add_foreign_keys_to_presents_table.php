<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPresentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('presentations', function(Blueprint $table)
		{
			$table->foreign('project_id')->references('id')->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('presentations', function(Blueprint $table)
		{
			$table->dropForeign('presentations_project_id_foreign');
			$table->dropForeign('presentations_user_id_foreign');
		});
	}

}
