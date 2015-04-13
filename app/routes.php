<?php

Route::get('/', array('as'=>'home', 'uses'=>'QuestionsController@get_index'));
Route::get('register', array('as'=>'register', 'uses'=>'UsersController@get_new'));
Route::get('login', array('as'=>'login', 'uses'=>'UsersController@get_login'));
Route::get('logout', array('as'=>'logout', 'uses'=>'UsersController@get_logout'));
Route::get('question/{num}/view', array('as'=>'question', 'uses'=>'QuestionsController@get_view'));

Route::post('register', array('before'=>'csrf', 'uses'=>'UsersController@post_create'));
Route::post('login', array('before'=>'csrf', 'uses'=>'UsersController@post_login'));
Route::post('ask', array('before'=>'csrf', 'uses'=>'QuestionsController@post_create'));

Route::get('home', array('as'=>'home', 'uses'=>'QuestionsController@get_index'));