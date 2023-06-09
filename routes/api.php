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

Route::group(['namespace' => 'Product'], function () {
    Route::get('/products', 'IndexController');
});

Route::group(['namespace' => 'Order'], function () {
//    Route::get('/orders', 'IndexController');
    Route::post('/orders', 'StoreController');
});

Route::group(['namespace' => 'Personal', 'prefix' => 'personal'], function () {
    Route::post('/', 'PersonalInformationController@store');
    Route::patch('/{id}', 'PersonalInformationController@update');

});

Route::group(['namespace' => 'Legal', 'prefix' => 'legal'], function () {
    Route::post('/', 'LegalInformationController@store');
    Route::patch('/{id}', 'LegalInformationController@update');
});

Route::prefix('auth')->group(function () {
    // Below mention routes are public, user can access those without any restriction.
    // Create New User
    Route::post('register', 'AuthController@register');
    // Login User
    Route::post('login', 'AuthController@login');

    // Refresh the JWT Token
    Route::get('refresh', 'AuthController@refresh');

    // Below mention routes are available only for the authenticated users.
    Route::middleware('auth:api')->group(function () {
        // Get user info
        Route::get('user', 'AuthController@user');
        // Logout user from application
        Route::post('logout', 'AuthController@logout');
    });
});

