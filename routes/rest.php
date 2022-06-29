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

Route::group([
    'prefix' => 'module',
    'middleware' => ['auth:web'],
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
                Route::get('/', 'TeamAssignmentController@users')->middleware('permission:user.list');
                Route::post('/', 'TeamAssignmentController@addUser')->middleware('permission:user.create');
                Route::patch('/{id}', 'TeamAssignmentController@patchUser')->middleware('permission:user.update');
                Route::delete('/{id}', 'TeamAssignmentController@deleteUser')->middleware('permission:user.delete');

            });

            Route::group([
                'prefix' => 'products'
            ], function () {
                Route::get('/', 'TeamAssignmentController@products')->middleware('permission:product.list');
                Route::post('/', 'TeamAssignmentController@addProduct')->middleware('permission:product.create');
                Route::patch('/{id}', 'TeamAssignmentController@patchProduct')->middleware('permission:product.update');
                Route::delete('/{id}', 'TeamAssignmentController@deleteProduct')->middleware('permission:product.delete');
            });
        });
    });
});
