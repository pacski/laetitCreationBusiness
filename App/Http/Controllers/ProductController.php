<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Products\ProductRepository;
use App\Repository\Stocks\StockRepository;
use App\Service\StoreImage;
use \stdClass;



class ProductController extends Controller
{
    public function index(ProductRepository $productRepository, 
    StockRepository $stockRepository)
    {
        $products = $productRepository->list();
        $stocks = $stockRepository->list();

        $stocksTest = $stockRepository->listByType();


        return view('pages.product.index', [
            'products' => $products,
            'stocks' => $stocks,
            'stocksTest' => $stocksTest,
            ]);
    }

    public function create(ProductRepository $productRepository,
    StoreImage $storeImage, Request $request)
    {
        if ($request->file('image') != null )
        {
            $image = $storeImage->store($request->file('image'), "Product");
        }
        else
        {
            $image = null ;
        }
        
        $params = [
            'name' => $request->name,
            'cost' => $request->cost,
            'price' => $request->price,
            'productionTime' => $request->productionTime,
            'image' => $image,
        ];

        $materiels = new stdClass();

        for ($i=1; $i < 10; $i++) { 

            $materiel = "materiel_".$i;
            $secondObject =  new stdClass();
            $materiels->$materiel = $secondObject;

            $materielName = "materiel_".$i;
            $materielQuantity = "quantity_".$i;

            $secondObject->id = $request->input($materielName);
            $secondObject->quantity = $request->input($materielQuantity);   
        }

        $response = $productRepository->store($params, $materiels);

        return back();
    }
    
}
