<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Products\ProductRepository;
use App\Repository\Stocks\StockRepository;

class GeneralController extends Controller
{
    public function index(ProductRepository $productRepository, 
    StockRepository $stockRepository)
    {
        // $products = $productRepository->list();
        // $stocks = $stockRepository->list();



        return view('pages.home.index', [
            // 'products' => $products,
            // 'stocks' => $stocks
            ]);
    }
}
