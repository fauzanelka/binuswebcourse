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

    return File::get($fileName);
});

Route::get('/robots.txt', function () {
    $fileName = public_path() . '/robots.txt';
    if (!file_exists($fileName)) {
        abort(404);
    }

    return File::get($fileName);
});

Route::get('/assets/{path}', function ($path) {
    $fileName = public_path() . $path;
    if (!file_exists($fileName)) {
        abort(404);
    }

    return File::get($fileName);
});

Route::get('/hello', function () {
    return 'You are viewing Laravel app deployed in Vercel!';
});
