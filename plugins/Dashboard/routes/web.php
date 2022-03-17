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
Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/', 'DashboardController@index')->middleware('auth')->name('agent.dashboard');
    Route::get('/transfer', 'DashboardController@transfer')->name('agent.transfer');
    Route::post('/make-transfer', 'DashboardController@makeTransfer')->name('agent.make-transfer');

});
