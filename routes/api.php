<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DepartmentController;

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

Route::group(['namespace' => 'App\Http\Controllers\Api', 'prefix' => 'v1'], function () {

//    Route::post('redirectGoogleOAuth2', 'Auth\GoogleOAuth2Controller@handleGoogleOAuth2Callback');
    Route::post('login', 'Auth\AuthController@login')
        ->middleware("App\Http\Middleware\ThrottleLogin");
//    Route::post('reset-password', 'ResetPasswordController@sendMail');
//    Route::put('reset-password', 'ResetPasswordController@reset');
    Route::group(['as' => 'api.v1.', 'middleware' => ['auth:api', 'App\Http\Middleware\CheckRole:Admin|User|Manager']], function () {
        Route::get('users/list-admin', 'UserController@listAdmin');
        Route::get('users/list-author', 'UserController@listAuthors');
//        Route::put('users/changePassword', 'UserController@changePassword');
        Route::get('users/getInfoUser', 'UserController@getInfoUser');
        Route::group(['prefix' => 'users', 'middleware' => 'App\Http\Middleware\CheckRole:Admin'], function () {
            Route::get('/', 'UserController@index');
            Route::get('search', 'UserController@search');
            Route::post('/', 'UserController@store');
            Route::get('/{id}', 'UserController@show');
            Route::put('/{id}', 'UserController@update');
            Route::delete('/{id}', 'UserController@destroy');
        });

        Route::group(['prefix' => 'comments'], function () {
            Route::get('/{id}', 'CommentController@index');
            Route::post('/{id}', 'CommentController@store');
        });
        Route::group(['prefix' => 'roles'], function () {
            Route::get('/', 'RoleController@index');
        });

        Route::get('departments/list-department', 'DepartmentController@listDepartment');
//        Route::group(['prefix' => 'deparments', 'middleware' => 'checkrole:Admin'], function () {
        Route::group(['prefix' => 'departments', 'middleware' => 'App\Http\Middleware\CheckRole:Admin'], function () {
            Route::get('/', 'DepartmentController@index');
            Route::post('/', 'DepartmentController@store');
            Route::get('/{id}', 'DepartmentController@show');
            Route::put('/{id}', 'DepartmentController@update');
        });
        Route::group(['prefix' => 'request_change'], function () {
            Route::get('/', 'RequestChangeHistoryController@index');
        });
        Route::get('logout', 'Auth\AuthController@logout');
    });
});
