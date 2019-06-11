<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'api', 'prefix' => 'v1'], function () {
    //people
    Route::get('/people', 'PersonController@index')->name('api.allPeople');
    Route::post('/people/store', 'PersonController@store')->name('api.storePerson');



    //animals
    Route::get('/animals', 'AnimalController@index')->name('api.allAnimals');
});
