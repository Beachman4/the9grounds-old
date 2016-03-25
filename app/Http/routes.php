<?php


Route::get('/glide/{path}', function(League\Glide\Server $server, $path) {
    $server->outputImage($path, $_GET);
});


Route::group(['middleware'  =>  ['web', 'App\Http\Middleware\BannedMiddleware']], function() {
    Route::get('/', 'BaseController@index')->name('index');
    Route::get('/login', 'UserController@getLogin')->name('login');
    Route::get('/register', 'UserController@getRegister')->name('register');
    Route::get('/resend-confirmation', 'UserController@resendConfirmation');
    Route::get('/about', 'BaseController@getAbout')->name('about');
    Route::get('/confirm/{token}', 'UserController@confirmAccount');
    Route::get('/forgot', 'UserController@getForgot');
    Route::get('/forgot/{token}', 'UserController@tokenForgot');

    Route::post('/register', 'UserController@postRegister');
    Route::post('/login', 'UserController@postLogin');
    Route::post('/forgot', 'UserController@postForgot');
    Route::post('/forgot/{token}', 'UserController@postTokenForgot');

    Route::group(['prefix'  =>  'tournaments'], function() {
        Route::get('/create', 'TournamentController@create')->name('tournaments_create');
        Route::get('/', 'TournamentController@index')->name('tournaments_index');
        Route::get('/{id}', 'TournamentController@view')->name('tournaments_view');
    });
    Route::group(['middleware'  =>  'App\Http\Middleware\UserMiddleware'], function() {
        Route::get('/logout', 'UserController@logout');
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