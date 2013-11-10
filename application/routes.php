<?php

Route::get('/', array('before'=>'auth','as'=>'home',function()
{
	return View::make('templates.default');
}));

Route::get('login',array('before'=>'guest','as'=>'logout','uses'=>'user@login'));
Route::post('login',array('as'=>'login','uses'=>'user@login'));
Route::get('logout',array('as'=>'logout','uses'=>'user@logout'));

Route::get('fblogin',array('as'=>'fblogin','uses'=>'usernetwork@fblogin'));
Route::get('fbcallback', array("as" => "fbcallback","uses"=>"usernetwork@fbcallback"));

Route::get('todos', array("as"=>"todos","uses"=>"todo@listar"));
Route::post('addtodo', array("as"=>"addtodo","uses"=>"todo@add"));
Route::post('checktodo', array("as"=>"checktodo","uses"=>"todo@check"));

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});






Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});