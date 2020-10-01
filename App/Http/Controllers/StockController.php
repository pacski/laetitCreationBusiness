<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Stocks\StockRepository;
use App\Service\StoreImage;

class StockController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index(StockRepository $stockRepository)
    {
        $userId = \Auth::id();
        $stocks = $stockRepository->listByType($userId, true);
        $quantityType = $stockRepository->quantityTypeCount($userId, true);


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
            $image = $storeImage->store($request->file('image'), 'Stock');
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
        
        $params = $request->all();
        $params['image'] = $image;
        $params['user_id'] = \Auth::id();
        $params['type'] = $type;
        $response = $stockRepository->store($params, true);

        return back();
    }
}
