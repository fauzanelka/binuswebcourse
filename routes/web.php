<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/favicon.ico', function () {
    $fileName = public_path() . '/favicon.ico';
    if (!file_exists($fileName)) {
        abort(404);
    }

    return response()->file($fileName);
});

Route::get('/robots.txt', function () {
    $fileName = public_path() . '/robots.txt';
    if (!file_exists($fileName)) {
        abort(404);
    }

    return response()->file($fileName);
});

Route::get('/assets/{path}', function ($path) {
    $fileName = public_path() . $path;
    if (!file_exists($fileName)) {
        abort(404);
    }

    return response()->file($fileName);
});

Route::get('/assets/images/{path}', function ($path) {
    $fileName = Storage::disk('tmp')->path($path);
    if (!file_exists($fileName)) {
        abort(404);
    }

    return response()->file($fileName);
});

Route::get('/hello', function () {
    return 'You are viewing Laravel app deployed in Vercel!';
});

Route::prefix('auth')->group(function () {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@authenticate');
    Route::post('/login-captcha', 'LoginController@authenticate_captcha')->name('login-captcha');
    Route::get('/forgot-password', 'LoginController@formForgotPassword')->name('forgot');
    Route::post('/forgot-password', 'LoginController@forgotPassword');
    Route::get('/reset-password', 'LoginController@formResetPassword')->name('reset');
    Route::post('/reset-password', 'LoginController@resetPassword');
    Route::get('/logout', 'LoginController@logout');
});

Route::group([
    'prefix' => 'module',
], function () {
    Route::group([
        'prefix' => 'personal',
    ], function () {
        Route::get('/{id}', 'PersonalAssignmentController@index');
        Route::post('/{id}', 'PersonalAssignmentController@submit');
    });

    Route::group([
        'prefix' => 'team',
        'middleware' => ['auth:web'],
    ], function () {
        Route::get('/{id}', 'TeamAssignmentController@index');
    });
});
