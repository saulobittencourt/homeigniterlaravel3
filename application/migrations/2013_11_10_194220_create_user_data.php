<?php

class Create_User_Data {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userdata', function($table)
		{
		    $table->increments('id');
		    $table->integer('userid')->unsigned();
		    $table->string('name', 255);
		    $table->string('photo', 255);
		    $table->string('phone', 255);
		    $table->timestamps();
		});

		$id = DB::table('users')->where('email', '=', 'user@gmail.com')->only('id');
		DB::table('userdata')->insert(
			array(
				'userid'=> $id,
				'name'=>'User',
				'photo'=>'http://graph.facebook.com/1/picture?width=150&height=150'
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
		Schema::drop('usersdata');
	}

}