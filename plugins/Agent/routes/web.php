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
    Route::get('/user/{user}/fund-wallet', 'AgentController@fundWallet')->name('agent.fund-wallet');
    Route::post('/user/{user}', 'AgentController@addFund')->name('agent.fund');


});
