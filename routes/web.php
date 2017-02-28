<?php
Auth::routes();

Route::get('/',[
	'as'=>'frontend.listing',
	'uses'=>'FrontendController@listing',
]);



Route::group(['middleware'=>['auth'] , 'prefix'=>'admin'] , function(){
	Route::get('/home', 'HomeController@index');
	Route::resource('news','Backend\NewsController');
});
	
