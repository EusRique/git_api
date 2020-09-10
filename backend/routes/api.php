<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

$router->get('/', function () use ($router) {
    return 'Api is running';
});

Route::namespace ('Api')->middleware(['api'])->group(function ($router) {
    Route::post('login', 'AuthController@login');

    Route::post('logout', 'AuthController@logout');

    Route::post('refresh', 'AuthController@refresh');

    Route::get('me', 'AuthController@me');
});

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::namespace ('Api')->group(function () {
        Route::prefix('repositories')->group(function () {
            Route::post('searchRepositories', 'RepositoryController@searchRepositories')->name('searchRepositories');
        });

        Route::prefix('tag')->group(function () {
            Route::post('createTag', 'TagController@createTag')->name('createTag');
            Route::get('listTag', 'TagController@listTag')->name('listTag');
            Route::delete('deleteTag/{id}', 'TagController@deleteTag')->name('deleteTag');
        });

        Route::prefix('user')->group(function () {
            Route::post('createUser', 'UserController@createUser')->name('createUser');
            Route::get('listUser', 'UserController@listUser')->name('listUser');
            Route::put('updateUser/{id}', 'UserController@updateUser')->name('updateUser');
        });
    });
});
