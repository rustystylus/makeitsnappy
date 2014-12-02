<?php

Route::get('/', array('as'=>'home', 'uses'=>'QuestionsController@get_index'));
Route::get('register', array('as'=>'register', 'uses'=>'UsersController@get_new'));

Route::post('register', array('before'=>'csrf', 'uses'=>'UsersController@post_create'));
Route::get('home',array('as'=>'home', 'uses'=>'QuestionsController@get_index'));