<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Stock;


class ApiStockController extends Controller
{
    public function index()
    {
        $userId = \Auth::id();
        $stocks = Stock::where('user_id', $userId)->orderBy('type')->get();
        return $stocks;
    }

    public function addStock(Request $request)
    {
        $userId = \Auth::id();
        $stock = Stock::where('user_id', $userId)->where('name', $request->name)->first();

        Stock::where('user_id', $userId)->where('name', $request->name)->update([
            'quantity' => $stock->quantity + $request->quantityAdd,
            'quantity_buyed' => $stock->quantity + $request->quantityAdd,
            'total_expense' => $stock->total_expense + $request->price,
        ]);
    }

    public function getAllType ()
    {
        $userId = \Auth::id();
        $record = Stock::where('user_id', $userId)->selectRaw('type as text, type as value')->distinct()
                    ->get();

        return $record;
    }
    
    public function delete($id)
    {
        Stock::where('id', $id)->delete();
    }
}
