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


Route::get('/', 'WelcomeController@index');

Route::group(['middleware'=> 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dash');
    Route::get('/leads/add', 'LeadController@create')->name('leads.add');
    Route::post('/leads/save', 'LeadController@store');
    Route::get('/leads/list', 'LeadController@index')->name('leads.list');
    Route::get('/leads/view/{lead}', 'LeadController@view')->name('leads.view');
    Route::post('/leads/update', 'LeadController@update')->name('leads.update');
    Route::get('/leads/view/{lead}/reminder/add', 'ReminderController@add')->name('reminder.add');
    Route::post('/leads/view/reminder/save', 'ReminderController@store')->name('reminder.save');
    Route::get('/leads/view/{lead}/reminder/{reminder}/view', 'ReminderController@view')->name('reminder.view');
    Route::post('/leads/view/reminder/update', 'ReminderController@updateAndCreate')->name('reminder.update');
    Route::get('/leads/view/{lead}/reminder/{reminder}/note', 'ReminderController@addNote')->name('reminder.note');
    Route::post('/leads/view/reminder/close', 'ReminderController@close')->name('reminder.close');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
