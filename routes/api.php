<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::resource('matches', 'Api\MatchesController', ['except' => ['create', 'edit']]);
Route::resource('heroes', 'Api\HeroesController', ['except' => ['create', 'edit']]);
Route::resource('schema', 'Api\SchemaController', ['except' => ['create', 'edit']]);
Route::resource('distributions', 'Api\DistributionsController', ['except' => ['create', 'edit']]);
Route::resource('article', 'Api\ArticleController', ['except' => ['create', 'edit']]);
Route::post('login', 'Api\ManagerLoginController@login');
Route::post('logout', 'Api\ManagerLoginController@logout');
