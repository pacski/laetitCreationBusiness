<?php

namespace App\Repository\Fabrics;

use App\Entity\Fabric;
use App\Entity\Product;
use App\Toolbox\ResponseManagement;



class FabricRepository extends ResponseManagement
{
    public function store(array $params = [])
    {
        Fabric::create([
            'name' => $params['name'],
            'image' => $params['image'],
            'quantity' => $params['quantity'],
            'quantity_buyed' => $params['quantity'],
            'price' => $params['price'],
        ]);
       
    }

    public function list()
    {
        $record = Fabric::all();

        return $record;
    }

    public function stockAfterCommand(object $products)
    {

        foreach ($products as $key => $item) {

            $product = Product::where('name', $item->name)->first();

            $fabric = Fabric::where('name', $item->tissu)->first();
            if (isset($product) && isset($fabric) )
            {
                $stockTotal = $fabric->quantity - $product->cost * $item->quantity;

                Fabric::where('name', $item->tissu)->update([
                    'quantity' => $stockTotal
                ]);       
            }
            
        }
    }
}
