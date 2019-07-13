<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSlidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('slides', function(Blueprint $table)
		{
			$table->foreign('presentation_id')->references('id')->on('presentations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('slides', function(Blueprint $table)
		{
			$table->dropForeign('slides_presentation_id_foreign');
		});
	}

}
