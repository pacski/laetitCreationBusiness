<?php

namespace App\Repository\Stocks;

use App\Entity\Stock;
use App\Entity\Product;
use App\Toolbox\ResponseManagement;
use \stdClass;


class StockRepository extends ResponseManagement
{
    public function store(array $params = [], bool $getRecord = false)
    {
        $record = Stock::create([
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

        if (!$getRecord)
        {
            return $this->response($record, 200);
        }
        else
        {
            return $record;
        }
    }

    public function listByType($userId = null, bool $getRecord = false)
    {
        $type = Stock::where('user_id', $userId)->select('type')->distinct()->get();
        $typeNb = Stock::where('user_id', $userId)->select('type')->distinct()->get()->count();

        $object = new stdClass();

        for ($i=0; $i < $typeNb; $i++) 
        { 
            $field = $type[$i]->type;
            $object->$field = Stock::where('user_id', $userId)->where('type', $field)->get();
        }
        $record = $object;

        if (!$getRecord)
        {
            return $this->response($record, 200);
        }
        else
        {
            return $record;
        }
    }

    public function list($userId = null, bool $getRecord = false)
    {
        $records = Stock::where('user_id', $userId)->orderBy('type')->get();

        if (!$getRecord)
        {
            return $this->response($records, 200);
        }
        else
        {
            return $records;
        }
    }

    public function quantityTypeCount($userId = null, bool $getRecord = false)
    {
        $record = Stock::where('user_id', $userId)->select('quantity_type')->distinct()->get();

        if (!$getRecord)
        {
            return $this->response($record, 200);
        }
        else
        {
            return $record;
        }
    }

    public function stockAfterCommand(object $products, int $userId, bool $getRecord = false)
    {
        foreach ($products as $key => $item) 
        {
            $product = Product::where('user_id', $userId)->where('name', $item->name)->first();

            if (isset($product->stocks))
            {
                foreach ($product->stocks as $stock)
                {
                    $materielName = $stock->name;
                    $materielQuantity = $stock->quantity;
                    $materiel = Stock::where('user_id', $userId)->where('name', $materielName)->first();
                    $stockTotal = $materiel->quantity - $stock->pivot->quantity * $item->quantity;
    
                    $record = Stock::where('user_id', $userId)->where('name', $materielName)->update([
                        'quantity' => $stockTotal 
                    ]);
                }
            }
        }
        if (!$getRecord)
        {
            return $this->response($record, 200);
        }
        else
        {
            return $record;
        }
   }    
}
