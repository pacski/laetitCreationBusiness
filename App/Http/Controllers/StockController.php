<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Stocks\StockRepository;
use App\Service\StoreImage;

class StockController extends Controller
{
    public function index(StockRepository $stockRepository)
    {
        $stocks = $stockRepository->listByType();
        $quantityType = $stockRepository->quantityTypeCount();


        return view('pages.stock.index', [
            'stocks' => $stocks,
            'quantityType' => $quantityType,
            ]);
    }

    public function create(StockRepository $stockRepository,
    StoreImage $storeImage, Request $request)
    {
        if ($request->file('image') != null )
        {
            $image = $storeImage->store($request->file('image'), "Stock");
        }
        else
        {
            $image = null ;
        }

        if ( isset($request->newType) )
        {
            $type = $request->newType;
        }
        else
        {
            $type = $request->type;
        }
        
        $params = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'quantity_type' => $request->quantity_type,
            'image' => $image,
            'type' => $type,
            'price' => $request->price,
        ];
        $response = $stockRepository->store($params);

        return back();
    }
}
