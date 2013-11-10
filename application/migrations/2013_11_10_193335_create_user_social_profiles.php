<?php

class Create_User_Social_Profiles {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usersocialprofiles', function($table)
		{
		    $table->increments('id');
		    $table->integer('userid')->unsigned();
		    $table->string('uid', 255);
		    $table->string('socialnetwork', 255);
		    $table->string('name', 255);
		    $table->string('username', 255);
		    $table->string('photo', 255);
		    $table->string('email', 255);
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
		Schema::drop('usersocialprofiles');
	}

}