<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', 'App\Http\Controllers\TodoController@index');

Route::get('todo/create', 'App\Http\Controllers\TodoController@create');

Route::post('todo/store', 'App\Http\Controllers\TodoController@store')->name('todo.store');

Route::get('todo/view/{id}', 'App\Http\Controllers\TodoController@show');

Route::get('todo/edit/{id}', 'App\Http\Controllers\TodoController@edit');

Route::put('todo/update/{id}', 'App\Http\Controllers\TodoController@update');

Route::get('todo/delete/{id}', 'App\Http\Controllers\TodoController@destroy');