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


Route::prefix('/command')->group(function(){
    Route::get('', 'ApiCommandController@index')
        ->name('api.commands.index');
    Route::post('/{number}/{status}', 'ApiCommandController@changeStatus')
        ->name('api.commands.change-status');
});
Route::prefix('/stock')->group(function(){
    Route::get('', 'ApiStockController@index')
        ->name('api.stocks.index'); 
    Route::post('/addStock', 'ApiStockController@addStock')
        ->name('api.stocks.addStock'); 
    Route::post('/delete/{id}', 'ApiStockController@delete')
        ->name('api.stocks.delete'); 
    Route::get('/getAllType', 'ApiStockController@getAllType')
        ->name('api.stocks.getAllType');
});
Route::prefix('/fabric')->group(function(){
    Route::get('', 'ApiFabricController@index')
        ->name('api.fabrics.index'); 
    Route::post('/delete/{id}', 'ApiFabricController@delete')
        ->name('api.fabrics.delete'); 

});
Route::prefix('/product')->group(function(){
    Route::get('', 'ApiProductController@index')
        ->name('api.products.index'); 
    Route::get('/countProduct/{name}', 'ApiProductController@nbProduced')
        ->name('api.products.nbProduced'); 
});
