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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    return 'Test';
});

Route::group([
    'prefix' => 'module',
    'namespace' => 'App\\Http\\Controllers\\API',
    'middlewares' => ['auth:web'],
], function () {

    Route::group([
        'prefix' => 'team',
    ], function () {

        Route::group([
            'prefix' => '1',
        ], function () {

            Route::group([
                'prefix' => 'users'
            ], function () {
                Route::get('/', 'TeamAssignmentController@users');
                Route::post('/', 'TeamAssignmentController@addUser');
                Route::patch('/{id}', 'TeamAssignmentController@patchUser');
                Route::delete('/{id}', 'TeamAssignmentController@deleteUser');

            });

            Route::group([
                'prefix' => 'products'
            ], function () {
                Route::get('/', 'TeamAssignmentController@products');
                Route::post('/', 'TeamAssignmentController@addProduct');
                Route::patch('/{id}', 'TeamAssignmentController@patchProduct');
                Route::delete('/{id}', 'TeamAssignmentController@deleteProduct');
            });
        });
    });
});
