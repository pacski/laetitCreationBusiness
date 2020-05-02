<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Stock;


class ApiStockController extends Controller
{
    public function addStock(Request $request)
    {
        $stock = Stock::where('name', $request->name)->first();

        Stock::where('name', $request->name)->update([
            'quantity' => $stock->quantity + $request->quantityAdd,
            'quantity_buyed' => $stock->quantity + $request->quantityAdd,
            'total_expense' => $stock->total_expense + $request->price,
        ]);
    }

    public function getAllType ()
    {
        $record = Stock::selectRaw('type as text, type as value')->distinct()
            ->get();

        return $record;
    }
}
