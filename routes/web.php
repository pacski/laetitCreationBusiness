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

Route::get('/','GeneralController@index')
    ->name('pages.home.index');

Route::prefix('/product')->group(function (){
    Route::get('', 'ProductController@index')
    ->name('pages.product.index');

    Route::post('/addProduct', 'ProductController@create')
    ->name('pages.product.create');
});

Route::prefix('/stock')->group(function (){
    Route::get('', 'StockController@index')
    ->name('pages.stock.index');

    Route::post('addStock', 'StockController@create')
    ->name('pages.stock.create');
});
Route::prefix('/fabric')->group(function (){
    Route::get('', 'FabricController@index')
    ->name('pages.fabric.index');

    Route::post('addFabric', 'fabricController@create')
    ->name('pages.fabric.create');
});

Route::prefix('/command')->group(function (){
    Route::get('', 'CommandController@index')
    ->name('pages.command.index');

    Route::post('addCommand', 'CommandController@create')
    ->name('pages.command.create');
});