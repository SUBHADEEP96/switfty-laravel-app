<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'jwt.verify'], function () {
    /*Route::post('/change-password',     'API\AuthController@changePassword');
    Route::post('/update-profile',      'API\AuthController@update');*/
});

Route::get('restaurants',[RestaurantController::class,'showRestaurants']);
Route::get('restaurants/{uuid}',[RestaurantController::class,'singleRestaurant']);
Route::post('add-restaurants',[RestaurantController::class,'addRestaurant']);
Route::put('update-restaurant/{uuid}',[RestaurantController::class,'editRestaurant']);