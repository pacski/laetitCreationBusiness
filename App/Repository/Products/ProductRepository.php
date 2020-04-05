<?php

namespace App\Repository\Products;

use App\Entity\Product;
use App\Entity\Stock;
use App\Entity\Product_Stock;
use App\Toolbox\ResponseManagement;



class ProductRepository extends ResponseManagement
{
    public function store(array $params = [], $materiels)
    {
        Product::create([
           'name' => $params['name'],
           'image' => $params['image'],
           'cost' => $params['cost'],
           'price' => $params['price'],
           'productionTime' => $params['productionTime'],
        ]);

        foreach ($materiels as $key => $materiel) {

            if ( isset($materiel->id) && isset($materiel->quantity) ){

                $materielId = $materiel->id;

                $product = Product::where('name', $params['name'])->first();
                $product->stocks()->attach($materielId, ['quantity' => $materiel->quantity ]);
            }
        }
    }

    public function list()
    {
        $products = Product::all();
        return $products;
    }

    public function listByUser($userId)
    {
        
    }

    public function updateStatus(array $params = [])
    {
    }

    public function cancelRequest($id)
    {
    }


}
