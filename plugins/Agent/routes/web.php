<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| Now create something great!
|
*/

Route::prefix('agent')->middleware('auth')->group(function (){
    Route::get('/', 'AgentController@index')->name('agent');
    Route::get('/create', 'AgentController@create')->name('agent.create');
    Route::post('/add', 'AgentController@add')->name('agent.add');


});
