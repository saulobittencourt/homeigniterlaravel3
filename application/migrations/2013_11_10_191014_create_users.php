<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->string('email', 255);
		    $table->string('password', 255);
		    $table->timestamps();
		});

		DB::table('users')->insert(
			array(
				'email'=>'user@gmail.com', 
				'password'=>Hash::make('user')
				)
		);
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}