<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Command;
use App\Entity\Article;
use App\Entity\Product;

class StatsController extends Controller
{
    public function statsYear()
    {
        $data = [];
        for ($i=1; $i <= 12; $i++) { 
           $record =  Command::whereMonth('created_at', $i)->count();
           array_push($data, $record);
        }
        return $data;

    }

    public function statsProduct($product = null)
    {   
        // $product = "produit1";
        $data = [];

        for ($i=1; $i <= 12; $i++) { 
    
            $record = Article::whereMonth('created_at', $i)
                ->where('name', $product)
                ->sum('quantity');

            array_push($data, intval($record) );
        }

        return $data;

    }

    public function listProduct ()
    {
        return Product::all();
    }

    public function statsOrigin ()
    {   
        $data = [
            'vinted' => Command::where('origin', 'vinted')->count(),
            'instagram' => Command::where('origin', 'instagram')->count(),
            'etsy' => Command::where('origin', 'etsy')->count(),
        ];
        return $data;
    }
}
