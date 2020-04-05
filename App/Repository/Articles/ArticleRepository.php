<?php

namespace App\Repository\Articles;

use App\Entity\Article;
use App\Entity\Product;
use App\Toolbox\ResponseManagement;



class ArticleRepository extends ResponseManagement
{
    public function create( $command, object $products)
    {
        
       foreach ($products as $key => $item) {

                $product = Product::where('name', $item->name)->first();

                if (isset($product)){
                Article::create([
                    "command_id" => $command->id,
                    "quantity" => $item->quantity,
                    "name" => $item->name,
                    "fabricName" => $item->tissu,
                    "price" => $product->price,
                    "image" => $product->image,
                ]);

            }
        
       }
       
    }

    public function list()
    {
      
    }
}
