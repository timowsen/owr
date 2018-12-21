<?php

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
//Auth / Greet Routes
use Illuminate\Support\Facades\Route;


Route::get('/', 'AuthController@showloginform');
//Routes that don´t need auth
Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@showloginform']);
Route::get('/register', 'AuthController@showregisterform');
Route::post('/registeradmin', 'AuthController@storeadmin');
Route::post('/register', 'AuthController@store');
Route::post('/login', 'SessionsController@create');
Route::post('/resetpassword', 'AuthController@resetpassword');
//Footer Routes
Route::get('/imprint', 'ImprintController@showimprint');
Route::get('/dataprotection', 'ImprintController@showdataprotection');

//Routes which need authenticated user
Route::middleware(['auth'])->group(function () {
    //logout
    Route::post('/logout', 'SessionsController@destroy');
    //Game Routes
    Route::get('/games', 'GameController@showgames');
    Route::get('/games/season/{id}', 'GameController@showgames');
    Route::post('/games', 'GameController@store');
    Route::delete('/games', 'GameController@delete');
    //Bnetaccount & Api Routes
    Route::post('/refresh', 'BattlenetController@refresh');
    Route::post('/bnetaccount', 'BattlenetController@store');
});

Route::middleware(['auth', 'authAdmin'])->group(function () {
    //Backoffice
    Route::get('/backoffice', 'AdminController@show');
    Route::get('/backoffice/heroes', 'AdminController@showheroes');
    Route::get('/backoffice/maps', 'AdminController@showmaps');
    Route::get('/backoffice/seasons', 'AdminController@showseasons');
    Route::post('backoffice/changeuserrole/{id}', 'Admincontroller@edituserrole');
    Route::delete('backoffice/heroes', 'AdminController@destroyhero');
    Route::delete('backoffice/maps', 'AdminController@destroymap');
    Route::delete('backoffice/users', 'AdminController@destroyuser');
    Route::post('/backoffice/users/resetpw', 'AdminController@resetuserpassword');
    //create hero route
    Route::post('/backoffice/heroes/create', 'HeroController@store');
    //create map route
    Route::post('/backoffice/maps/create', 'MapController@store');
    //Debug api Object
    Route::get('/debug', 'BattlenetController@debug');
    //Map Routes
});

//Routes which net 404 when triggered with get
Route::get('/bnetaccount', function () {
    abort(404);
});
Route::get('/logout', function () {
    abort(404);
});

Route::group(['middleware' => ['web']], function () {



});
