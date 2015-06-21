<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePunchPunchTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('punch_punch_tag', function(Blueprint $table)
		{
			$table->primary(['punch_id','punch_tag_id']);
            $table->integer('punch_id')->unsigned()->index();
            $table->foreign('punch_id')->references('id')->on('punches')->onDelete('cascade');
            $table->integer('punch_tag_id')->unsigned()->index();
            $table->foreign('punch_tag_id')->references('id')->on('punch_tags')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('punch_punch_tag');
	}

}
