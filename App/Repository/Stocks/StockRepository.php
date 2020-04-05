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
            'name' => $params['name'],
            'quantity' => $params['quantity'],
            'quantity_type' => $params['quantity_type'],
            'image' => $params['image'],
            'type' => $params['type'],
            'price' => $params['price'],
         ]);
 

    }

    public function listByType()
    {
        $type = Stock::select('type')->distinct()->get();
        $typeNb = Stock::select('type')->distinct()->get()->count();

        $object = new stdClass();

        for ($i=0; $i < $typeNb; $i++) 
        { 
            $field = $type[$i]->type;
            $object->$field = Stock::where('type', $field)->get();
        }
        $type = $object;

        return $type;
    }

    public function list()
    {
        $stocks = Stock::all();
        return $stocks;
    }

    public function quantityTypeCount()
    {
        $quantityType = Stock::select('quantity_type')->distinct()->get();
        return $quantityType;
    }

    public function stockAfterCommand(object $products)
    {

        foreach ($products as $key => $item) {

            $product = Product::where('name', $item->name)->first();

            if (isset($product->stocks))
            {
                foreach ($product->stocks as $stock)
                {
                    $materielName = $stock->name;
                    $materielQuantity = $stock->quantity;
                    $materiel = Stock::where('name', $materielName)->first();
                    $stockTotal = $materiel->quantity - $stock->pivot->quantity * $item->quantity;
    
                    Stock::where('name', $materielName)->update([
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
