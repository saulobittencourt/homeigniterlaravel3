<?php

class Create_Schedules {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function($table)
		{
		    $table->increments('id');
		    $table->integer('userid')->unsigned();

		    $table->string('title', 255);
		    $table->text('description', 255);
		    $table->integer('priority')->unsigned();
		    
		    $table->date('datetime');
		    $table->string('frequency');

		    $table->boolean('active');

		    $table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schedules');
	}

}