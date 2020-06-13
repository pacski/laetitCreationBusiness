<?php

namespace App\Repository\Stocks;

use App\Entity\Stock;
use App\Entity\Product;
use App\Toolbox\ResponseManagement;
use \stdClass;


class StockRepository extends ResponseManagement
{
    public function store(array $params = [])
    {
        Stock::create([
            'user_id' => $params['user_id'],
            'name' => $params['name'],
            'quantity' => $params['quantity'],
            'quantity_type' => $params['quantity_type'],
            'quantity_buyed' => $params['quantity'],
            'image' => $params['image'],
            'type' => $params['type'],
            'price' => $params['price'],
            'total_expense' => $params['price'],
         ]);
 

    }

    public function listByType($userId = null)
    {
        $type = Stock::where('user_id', $userId)->select('type')->distinct()->get();
        $typeNb = Stock::where('user_id', $userId)->select('type')->distinct()->get()->count();

        $object = new stdClass();

        for ($i=0; $i < $typeNb; $i++) 
        { 
            $field = $type[$i]->type;
            $object->$field = Stock::where('user_id', $userId)->where('type', $field)->get();
        }
        $type = $object;

        return $type;
    }

    public function list($userId = null)
    {
        $stocks = Stock::where('user_id', $userId)->orderBy('type')->get();
        return $stocks;
    }

    public function quantityTypeCount($userId = null)
    {
        $quantityType = Stock::where('user_id', $userId)->select('quantity_type')->distinct()->get();
        return $quantityType;
    }

    public function stockAfterCommand(object $products, int $userId)
    {

        foreach ($products as $key => $item) {

            $product = Product::where('user_id', $userId)->where('name', $item->name)->first();

            if (isset($product->stocks))
            {
                foreach ($product->stocks as $stock)
                {
                    $materielName = $stock->name;
                    $materielQuantity = $stock->quantity;
                    $materiel = Stock::where('user_id', $userId)->where('name', $materielName)->first();
                    $stockTotal = $materiel->quantity - $stock->pivot->quantity * $item->quantity;
    
                    // Stock::where('user_id', $userId)->where('name', $materielName)->update([
                    //     'quantity' => $stockTotal 
                    // ]);
                    Stock::where('user_id', $userId)->where('name', $materielName)->update([
                        'quantity' => $stockTotal 
                    ]);
                }
            }
        }
    
   }    

    public function updateStatus(array $params = [])
    {
    }

    public function cancelRequest($id)
    {
    }


}
