<?php

class Create_Group {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group', function($table)
		{
		    $table->increments('id');
		    $table->string('name', 255);
		    
		    $table->text('address');

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
		Schema::drop('group');
	}

}