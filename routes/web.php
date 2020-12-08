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
    return view('welcome');
})->name('welcome');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::resource('/todo', 'ToDoController');
Route::patch('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');
Route::patch('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
Route::patch('/todos/{todo}/inProgress', 'TodoController@inProgress')->name('todo.inProgress');
Route::get('/telescope')->name('telescope');
