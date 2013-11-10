<?php

class Create_Grossery {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grossery', function($table)
		{
		    $table->increments('id');
		    $table->integer('userid')->unsigned();

		    $table->string('product', 255);
		    $table->float('amount');
		    $table->string('unit');
		    $table->string('brand');

		    $table->integer('priority')->unsigned();
		    
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
		Schema::drop('grossery');
	}
}