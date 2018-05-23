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

//overwrite to set default login method and corresponding view
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@showloginform']);

Route::get('/register', 'AuthController@showregisterform');

Route::post('/register', 'AuthController@store');

Route::post('/login', 'SessionsController@create');

Route::post('/logout', ['uses' => 'SessionsController@destroy', 'middleware' => 'auth']);


//Hero Routes

Route::get('/heroes', ['uses' => 'HeroController@index', 'middleware' => 'auth']);

Route::get('/heroes/create', ['uses' => 'HeroController@create', 'middleware' => 'auth']);

Route::post('/heroes', ['uses' => 'HeroController@store', 'middleware' => 'auth']);
    
Route::get('/heroes/{hero}', ['uses' => 'HeroController@show', 'middleware' => 'auth']);


//Map Routes

Route::get('/maps/create', ['uses' => 'MapController@create', 'middleware' => 'auth']);

Route::get('/maps', ['uses' => 'MapController@index', 'middleware' => 'auth']);

Route::get('/maps/{map}', ['uses' => 'MapController@show', 'middleware' => 'auth']);

Route::post('/maps', ['uses' => 'MapController@store', 'middleware' => 'auth']);


//Game Routes

Route::get('/games', ['uses' => 'GameController@showgames', 'middleware' => 'auth']);

Route::post('/games', ['uses' => 'GameController@store', 'middleware' => 'auth']);

Route::delete('/games', ['uses' => 'GameController@delete', 'middleware' => 'auth']);


//Bnetaccount & Api Routes
Route::post('/refresh', ['uses' => 'BattlenetController@refresh', 'middleware' => 'auth']);

Route::post('/bnetaccount', ['uses' => 'BattlenetController@store', 'middleware' => 'auth']);

Route::get('/bnetaccount', function(){
    abort(404);
});
Route::get('/logout', function(){
    abort(404);
});

Route::group(['middleware' => ['web']], function () {
    
});
