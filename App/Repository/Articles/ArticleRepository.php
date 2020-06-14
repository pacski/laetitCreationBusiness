<?php

namespace App\Repository\Articles;

use App\Entity\Article;
use App\Entity\Product;
use App\Entity\Fabric;
use App\Toolbox\ResponseManagement;



class ArticleRepository extends ResponseManagement
{
    public function store( $command, object $products, int $userId, bool $getRecord = false)
    {
       foreach ($products as $key => $item) 
       {
                $product = Product::where('user_id', $userId)->where('name', $item->name)->first();
                $fabric = Fabric::where('user_id', $userId)->where('name', $item->tissu)->first();

                if (isset($product))
                {
                    $record = Article::create([
                            "command_id" => $command->id,
                            "quantity" => $item->quantity,
                            "name" => $item->name,
                            "fabric_name" => $item->tissu,
                            "price" => $product->price,
                            "image" => $product->image,
                            "fabric_image" => $fabric->image,
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
