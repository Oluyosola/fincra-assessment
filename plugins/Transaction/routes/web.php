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

Route::prefix('transaction')->group(function () {
    Route::get('/', 'TransactionController@index')->middleware('auth')->name('transaction');
});
