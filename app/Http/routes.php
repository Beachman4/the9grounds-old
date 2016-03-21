<?php


Route::get('/glide/{path}', function(League\Glide\Server $server, $path) {
    $server->outputImage($path, $_GET);
});


Route::group(['middleware'  =>  ['web', 'App\Http\Middleware\BannedMiddleware']], function() {
    Route::get('/', 'BaseController@index')->name('index');
    Route::get('/login', 'UserController@getLogin')->name('login');
    Route::get('/register', 'UserController@getRegister')->name('register');
    Route::get('/emailtest', 'UserController@testRegisterEmail');
    Route::get('/about', 'BaseController@getAbout')->name('about');
    Route::get('/confirm/{token}', 'UserController@confirmAccount');

    Route::post('/register', 'UserController@postRegister');
    Route::post('/login', 'UserController@postLogin');

    Route::group(['prefix'  =>  'tournaments'], function() {
        Route::get('/create', 'TournamentController@create')->name('tournaments_create');
        Route::get('/', 'TournamentController@index')->name('tournaments_index');
        Route::get('/{id}', 'TournamentController@view')->name('tournaments_view');
    });
    Route::group(['middleware'  =>  'App\Http\Middleware\UserMiddleware'], function() {
        Route::group(['prefix'  =>  'search'], function() {
            Route::get('/{search}', 'BaseController@search')->name('search');

            Route::post('/', 'BaseController@postSearch');
        });
        Route::group(['prefix'  =>  'tournaments'], function() {

        });
        Route::group(['prefix'  =>  'clans'], function() {
            Route::get('/', 'ClanController@index')->name('clan_index');
        });
    });
});