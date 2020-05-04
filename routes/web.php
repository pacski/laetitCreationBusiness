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
    Route::post('update', 'CommandController@updateStatus')
        ->name('pages.command.updateStatus');
    Route::post('addComment', 'CommandController@addComment')
        ->name('pages.command.addComment');
    Route::post('delete', 'CommandController@delete')
        ->name('pages.command.delete');
});

// test vue js
Route::prefix('/user')->group(function (){
    Route::post('/create', 'UserController@create')
        ->name('users.create');
    Route::get('/index', 'UserController@index')
        ->name('users.index');
});


Route::namespace('API')->prefix('/stats')->group(function(){
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
});

Route::namespace('API')->prefix('/api')->group(function(){
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
});

// list product



// list month



Route::namespace('API')->prefix('/api-tool')->group(function(){
    Route::get('/listingProduct', 'StatsController@listProduct' )
    ->name('list.product');
    Route::get('/months', 'StatsController@getMonth')
    ->name('get.month');
});

