<?php

Route::get('/', 'IniController@inicio')->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mudarsenha', 'HomeController@showChangePasswordForm')->name('trocaSenha');
Route::get('/perfil', 'UserController@showPerfilUsuario')->name('user.Perfil')->middleware('auth');
Route::post('/perfil', 'UserController@update')->name('user.showPerfilUsuario.update');
Route::get('/perguntas-frequentes/faq', 'IniController@faq')->name('faq');
Route::post('/mudarsenha','HomeController@changePassword')->name('changePassword');
/*Route::post('/perfil','UserController@update')->name('update');*/
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
