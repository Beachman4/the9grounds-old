<?php


Route::group(['middleware'  =>  ['web', 'App\Http\Middleware\BannedMiddleware']], function() {
    Route::get('/', 'BaseController@index')->name('index');
    Route::get('/login', 'UserController@getLogin')->name('login');
    Route::get('/register', 'UserController@getRegister')->name('register');

    Route::post('/register', 'UserController@postRegister');
    Route::post('/login', 'UserController@postLogin');
    Route::group(['middleware'  =>  'App\Http\Middleware\UserMiddleware'], function() {
        Route::group(['prefix'  =>  'search'], function() {
            Route::get('/{search}', 'BaseController@search')->name('search');

            Route::post('/', 'BaseController@postSearch');
        });
        Route::group(['prefix'  =>  'tournaments'], function() {
            Route::get('/', 'TournamentController@index')->name('tournaments_index');
        });
        Route::group(['prefix'  =>  'clans'], function() {
            Route::get('/', 'ClanController@index')->name('clan_index');
        });
    });
});