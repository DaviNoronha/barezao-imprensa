<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('user', 'UserController');
	    Route::get('datatable/user', 'UserController@datatable')->name('datatable.user');
    });
	Route::resource('time', 'TimeController', ['except' => 'show']);
	Route::get('datatable/time', 'TimeController@datatable')->name('datatable.time');
	Route::get('time/{time}/jogadores', 'TimeController@jogadores')->name('time.jogadores');
	Route::get('datatable/time/jogadores', 'TimeController@datatableJogadores')->name('datatable.time.jogadores');
	Route::resource('jogador', 'JogadorController');
	Route::get('datatable/jogador', 'JogadorController@datatable')->name('datatable.jogador');
});

