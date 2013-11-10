<?php

class Create_Group_Associations {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groupassociations', function($table)
		{
		    $table->increments('id');
		    
		    $table->integer('groupid')->unsigned();

		    $table->integer('userid')->unsigned();

		    $table->integer('level')->unsigned();

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
		Schema::drop('groupassociations');
	}

}