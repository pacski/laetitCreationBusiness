<?php

namespace App\Repository\Fabrics;

use App\Entity\Fabric;
use App\Entity\Product;
use App\Toolbox\ResponseManagement;



class FabricRepository extends ResponseManagement
{
    public function store(array $params = [], $request)
    {
        $request->validate([
            'name' => ['required'],
            // 'image' => ['image'],
            'quantity' => ['required'],
            'price' => ['required'],
        ]);

        Fabric::create([
            'user_id' => $params['user_id'],
            'name' => $params['name'],
            'image' => $params['image'],
            'quantity' => $params['quantity'],
            'quantity_buyed' => $params['quantity'],
            'price' => $params['price'],
        ]);
       
    }

    public function list($userId)
    {
        $record = Fabric::where('user_id', $userId)->get();

        return $record;
    }

    public function stockAfterCommand(object $products, int $userId)
    {

        foreach ($products as $key => $item) {

            $product = Product::where('user_id', $userId)->where('name', $item->name)->first();

            $fabric = Fabric::where('user_id', $userId)->where('name', $item->tissu)->first();
            if (isset($product) && isset($fabric) )
            {
                $stockTotal = $fabric->quantity - $product->cost * $item->quantity;

                Fabric::where('user_id', $userId)->where('name', $item->tissu)->update([
                    'quantity' => $stockTotal
                ]);       
            }
            
        }
    }
}
