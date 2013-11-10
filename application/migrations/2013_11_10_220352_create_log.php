<?php

class Create_Log {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log', function( $table )
		{
		    $table->increments('id');
		    $table->integer('who')->unsigned();

		    $table->text('what');
		    $table->string('where', 255);

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
		Schema::drop('log');
	}

}