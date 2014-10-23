<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('event_label_id');
			$table->dateTime('started_at');
			$table->dateTime('ended_at')->nullable();
			$table->text('description')->nullable();
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')->on('users');

			$table->foreign('event_label_id')
				->references('id')->on('event_labels');

			$table->index('started_at');
			$table->index('ended_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
