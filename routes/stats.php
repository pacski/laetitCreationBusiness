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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/year', 'StatsController@statsYear')
    ->name('stats.year');

Route::get('/product/{product}', 'StatsController@statsProduct')
    ->name('stats.product');

Route::get('/bestProduct', 'StatsController@statsBestProduct')
    ->name('stats.bestProduct');

Route::get('/origin/{month}', 'StatsController@statsOrigin')
    ->name('stats.origin');

Route::get('/keysFigures', 'StatsController@keysFigures')
    ->name('stats.keysFigures');    


// SERVICES

Route::prefix('/service')->group(function(){
    Route::get('/listingProduct', 'StatsController@listProduct' )
        ->name('list.product');
    Route::get('/months', 'StatsController@getMonth')
        ->name('get.month');
});
