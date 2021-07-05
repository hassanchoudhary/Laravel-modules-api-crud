<?php

use Illuminate\Http\Request;
use Modules\Resturants\Http\Controllers\ResturantsController;

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

Route::middleware(['auth:sanctum'])->group(function () {

Route::get('resturants', [ResturantsController::class, 'index']);
Route::get('resturant/{id}/show', [ResturantsController::class, 'show']);
Route::post('resturant/add', [ResturantsController::class, 'store']);

//Route::put('resturant/{id}/update', [ResturantsController::class, 'update']);
Route::post('resturant/{id}/update', [ResturantsController::class, 'update']);
Route::delete('resturant/{id}/delete', [ResturantsController::class, 'destroy']);

});


//Route::middleware('auth:api')->get('/resturants', function (Request $request) {
   // return $request->user();
//});