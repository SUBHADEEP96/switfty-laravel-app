<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestaurantController;
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

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('restaurants',[RestaurantController::class,'showRestaurants']);
Route::get('restaurants/{uuid}',[RestaurantController::class,'singleRestaurant']);
Route::get('create-restaurant',function(){
    return view('addRestaurant');
});
Route::post('add-restaurants',[RestaurantController::class,'addRestaurant']);

Route::get('update-restaurant/{id}',[RestaurantController::class,'updateRestaurant']);
Route::post('update-restaurant/{id}',[RestaurantController::class,'editRestaurant']);
Route::get('status-update/{id}',[RestaurantController::class,'editRestaurantStatus']);

Route::get('delete/{id}',[RestaurantController::class,'deleteRestaurant']);
