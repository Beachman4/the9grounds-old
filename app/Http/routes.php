<?php


Route::get('/glide/{path}', function(League\Glide\Server $server, $path) {
    $server->outputImage($path, $_GET);
});

Route::get('/image/{name}', function($name) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/' . $name;
    if (file_exists($path)) {
        return \Illuminate\Support\Facades\Response::download($path);
    }
});

Route::get('/test', 'UserController@testing');
Route::post('/test', 'UserController@postTest');


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
    Route::post('/androidLogin', 'UserController@postAndroidLogin');
    Route::post('/forgot', 'UserController@postForgot');
    Route::post('/forgot/{token}', 'UserController@postTokenForgot');

    Route::group(['prefix'  =>  'tournaments'], function() {
        Route::get('/', 'TournamentController@index')->name('tournaments_index');
        Route::get('/{id}', 'TournamentController@view')->name('tournaments_view');
    });
    Route::group(['middleware'  =>  'App\Http\Middleware\UserMiddleware'], function() {
        Route::get('/logout', 'UserController@logout');
        Route::get('/myprofile', 'UserController@myprofile');
        Route::group(['prefix'  =>  'search'], function() {
            Route::get('/{search}', 'BaseController@search')->name('search');

            Route::post('/', 'BaseController@postSearch');
        });
        Route::group(['prefix'  =>  'tournaments'], function() {
            Route::get('/create', 'TournamentController@create')->name('tournaments_create');
            Route::get('/test', 'TournamentController@test');
        });
        Route::group(['prefix'  =>  'clans'], function() {
            Route::get('/', 'ClanController@index')->name('clan_index');
        });
    });
    Route::group(['middleware'  =>  'App\Http\Middleware\AdminMiddleware'], function() {
        Route::group(['prefix'  =>  'news'], function() {
            Route::get('/create', 'NewsController@create');


            Route::post('/create', 'NewsController@submit');
        });
    });
    Route::group(['prefix'  =>  'admin', 'middleware'   =>  'App\Http\Middleware\AdminMiddleware'], function() {
        Route::get('/', 'AdminController@index')->name('admin_index');

        Route::group(['prefix'  =>  'user'], function() {
            Route::get('/', 'UserController@adminIndex')->name('user-list');
            Route::get('/{id}', 'UserController@adminView')->name('user-view');
            Route::get('/add', 'UserController@adminAdd')->name('user-add');
            Route::get('/{id}/edit', 'UserController@adminEdit')->name('user-add');

            Route::post('/{id}/edit', 'UserController@adminPostEdit');
            Route::post('/add', 'UserController@adminPostAdd');
        });
        Route::group(['prefix'  =>  'clan'], function() {
            Route::get('/', 'ClanController@adminIndex')->name('clan-list');
        });
        Route::group(['prefix'  =>  'tournaments'], function() {
            Route::get('/', 'TournamentController@adminIndex')->name('tournament-index');
        });
    });
});