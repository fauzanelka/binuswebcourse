<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/hello', function () {
    return 'You are viewing Laravel app deployed in Vercel!';
});

Route::name('module.')->prefix('module')->group(function () {
    Route::name('personal')->prefix('personal')->group(function () {
        Route::get('/{id}', 'PersonalAssignmentController@index');
        Route::post('/{id}', 'PersonalAssignmentController@submit');
    });

    Route::name('team')->prefix('team')->group(function () {
        Route::post('/{id}', 'TeamAssignmentController@index');
        Route::get('/{id}', 'TeamAssignmentController@index');
    });
});
