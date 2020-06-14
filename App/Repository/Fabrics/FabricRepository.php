<?php

namespace App\Repository\Fabrics;

use App\Entity\Fabric;
use App\Entity\Product;
use App\Toolbox\ResponseManagement;



class FabricRepository extends ResponseManagement
{
    public function store(array $params = [], bool $getRecord = false)
    {
        $rules = [
            'name' => ['required'],
            // 'image' => ['image'],
            'quantity' => ['required'],
            'price' => ['required'],
        ];
        \Validator::make($params,$rules)->validate();

        $record = Fabric::create([
                'user_id' => $params['user_id'],
                'name' => $params['name'],
                'image' => $params['image'],
                'quantity' => $params['quantity'],
                'quantity_buyed' => $params['quantity'],
                'price' => $params['price'],
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

    public function list($userId, bool $getRecord = false)
    {
        $record = Fabric::where('user_id', $userId)->get();

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
            $fabric = Fabric::where('user_id', $userId)->where('name', $item->tissu)->first();

            if (isset($product) && isset($fabric) )
            {
                $stockTotal = $fabric->quantity - $product->cost * $item->quantity;

                $record = Fabric::where('user_id', $userId)->where('name', $item->tissu)->update([
                    'quantity' => $stockTotal
                ]);       
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
