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
    Route::get('/people', 'PersonController@index')->name('api.getPeople');
    Route::get('/people/{person}', 'PersonController@show')->name('api.getPerson');
    Route::post('/people/store', 'PersonController@store')->name('api.storePerson');
    Route::put('/people/{person}', 'PersonController@update')->name('api.updatePerson');
    Route::delete('/people/{person}', 'PersonController@destroy')->name('api.destroyPerson');

    //animals
    Route::get('/animals', 'AnimalController@index')->name('api.allAnimals');
    Route::get('/animals/{animal}', 'AnimalController@show')->name('api.getAnimal');
    Route::post('/animals/store', 'AnimalController@store')->name('api.storeAnimal');
    Route::put('/animals/{animal}', 'AnimalController@update')->name('api.updateAnimal');
    Route::delete('/animals/{animal}', 'AnimalController@destroy')->name('api.destroyAnimal');

    //armors
    Route::get('/armors', 'ArmorController@index')->name('api.allArmors');
    Route::get('/armors/{armor}', 'ArmorController@show')->name('api.getArmor');
    Route::post('/armors/store', 'ArmorController@store')->name('api.storeArmor');
    Route::put('/armors/{armor}', 'ArmorController@update')->name('api.updateArmor');
    Route::delete('/armors/{armor}', 'ArmorController@destroy')->name('api.destroyArmor');

    //city
    Route::get('/cities', 'CityController@index')->name('api.allCities');
    Route::get('/cities/{city}', 'CityController@show')->name('api.getCity');
    Route::post('/cities/store', 'CityController@store')->name('api.storeCity');
    Route::put('/cities/{city}', 'CityController@update')->name('api.updateCity');
    Route::delete('/cities/{city}', 'CityController@destroy')->name('api.destroyCity');

    //creature
    Route::get('/creatures', 'CreatureController@index')->name('api.allCreatures');
    Route::get('/creatures/{creature}', 'CreatureController@show')->name('api.getCreature');
    Route::post('/creatures/store', 'CreatureController@store')->name('api.storeCreature');
    Route::put('/creatures/{creature}', 'CreatureController@update')->name('api.updateCreature');
    Route::delete('/creatures/{creature}', 'CreatureController@destroy')->name('api.destroyCreature');

});
