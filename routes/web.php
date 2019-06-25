<?php

Route::get('/', 'HomeController@renderPage')->name('home');
Route::get('/home', 'HomeController@renderPage');
Route::get('/about-us', 'AboutUsController@renderPage')->name('about-us');
Route::post('/event/participant', 'EventController@addParticipant')->name('event.add-participant');
Route::get('/event/participants', 'EventController@getParticipants')->name('event.get-participants');
Route::delete('/event/participant', 'EventController@removeParticipant')->name('event.remove-participant');
Route::get('/event/{event}', 'EventController@eventDetailPage')->name('event');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/sign-in', 'AuthController@loginPage')->name('sign-in');
    Route::post('/sign-in', 'AuthController@login')->name('sign-in');

    Route::get('/sign-up', 'AuthController@registerPage')->name('sign-up');
    Route::post('/sign-up', 'AuthController@register')->name('sign-up');

    Route::get('/backend/login', 'Backend\LoginController@viewLogin')->name('backend.login');
    Route::post('/backend/login', 'Backend\LoginController@actionLogin')->name('backend.login');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::get('/profile', 'ProfileController@renderPage')->name('profile');
    Route::post('/profile', 'ProfileController@saveProfile')->name('profile');
});

Route::group(['middleware' => 'auth.admin', 'prefix' => 'backend'], function() {
    Route::get('/', 'Backend\HomeController@index')->name('backend.home');

    Route::get('/event', 'Backend\EventController@index')->name('backend.event.index');
    Route::post('/event', 'Backend\EventController@store')->name('backend.event.store');
    Route::get('/event/create', 'Backend\EventController@create')->name('backend.event.create');
    Route::get('/event/{event}', 'Backend\EventController@show')->name('backend.event.show');
    Route::get('/event/{event}/edit', 'Backend\EventController@edit')->name('backend.event.edit');
    Route::put('/event/{event}', 'Backend\EventController@update')->name('backend.event.update');
    Route::delete('/event/{event}', 'Backend\EventController@delete')->name('backend.event.delete');
});