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
Route::get('/', 'AuthController@showloginform');
//Routes that don´t need auth
Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@showloginform']);
Route::get('/register', 'AuthController@showregisterform');
Route::get('/resetpassword', 'AuthController@resetpasswordshow');
Route::post('/registeradmin', 'AuthController@storeadmin');
Route::post('/register', 'AuthController@store');
Route::post('/login', 'SessionsController@create');
Route::post('/resetpassword', 'AuthController@resetpassword');
//Footer Routes
Route::get('/imprint', 'ImprintController@showimprint');
Route::get('/dataprotection', 'ImprintController@showdataprotection');

//Routes which need authenticated user
Route::middleware(['auth'])->group(function ()
{
    //logout
    Route::post('/logout', 'SessionsController@destroy');
    //Game Routes
    Route::get('/games', 'GameController@showgames');
    Route::post('/games', 'GameController@store');
    Route::delete('/games', 'GameController@delete');
    //Bnetaccount & Api Routes
    Route::post('/refresh', 'BattlenetController@refresh');
    Route::post('/bnetaccount', 'BattlenetController@store');
    
});

Route::middleware(['auth', 'authAdmin'])->group(function ()
{
    //Backoffice
    Route::get('/backoffice', 'AdminController@show');
    Route::get('/backoffice/heroes', 'AdminController@showheroes');
    Route::get('/backoffice/maps', 'AdminController@showmaps');
    Route::post('backoffice/changeuserrole', 'Admincontroller@edituserrole');
    Route::delete('backoffice/heroes', 'AdminController@destroyhero');
    Route::delete('backoffice/maps', 'AdminController@destroymap');
    Route::delete('backoffice/users', 'AdminController@destroyuser');
    Route::post('/backoffice/users/resetpw', 'AdminController@resetuserpassword');
    //Debug api Object
    Route::get('/debug', 'BattlenetController@debug');
    //Hero Routes
    Route::get('/heroes', 'HeroController@index');
    Route::get('/heroes/create', 'HeroController@create');
    Route::post('/heroes', 'HeroController@store');
    Route::get('/heroes/{hero}', 'HeroController@show');
    //Map Routes
    Route::get('/maps/create', 'MapController@create');
    Route::get('/maps', 'MapController@index');
    Route::get('/maps/{map}', 'MapController@show');
    Route::post('/maps', 'MapController@store');
});

//Routes which net 404 when triggered with get
Route::get('/bnetaccount', function(){
    abort(404);
});
Route::get('/logout', function(){
    abort(404);
});

Route::group(['middleware' => ['web']], function () {
        


});
