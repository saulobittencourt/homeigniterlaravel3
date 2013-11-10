<?php

class Create_Todos {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('todos', function($table)
		{
		    $table->increments('id');
		    
		    $table->integer('userid')->unsigned();
		    $table->integer('parentid')->unsigned();

		    $table->string('title', 255);
		    $table->text('description', 255);
		    $table->integer('priority')->unsigned();

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
		Schema::drop('todos');
	}

}