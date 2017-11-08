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

Route::get('/', function () {
    return view('welcome');
});

Route::post('grocer', 'GroceryController@store')->name('grocery');
Route::delete('/grocer/{id}', 'GroceryController@deleteGroceryItem')->name('grocery');

Route::post('grocerlist', 'GroceryListController@setActive')->name('grocerylist');
Route::post('grocernewlist', 'GroceryListController@newList')->name('grocerylist');
Route::post('grocerlist/{id}', 'GroceryListController@removeActive')->name('grocerylist');
Route::post('grocerisClicked/{id}', 'GroceryListController@setClicked')->name('grocerylist');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/grocery', 'GroceryController@index')->name('grocery');
Route::get('/grocerylist', 'GroceryListController@index')->name('grocerylist');