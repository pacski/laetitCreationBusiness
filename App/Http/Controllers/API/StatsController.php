<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Command;
use App\Entity\Article;
use App\Entity\Product;

class StatsController extends Controller
{
    public function listProduct ()
    {
        return Product::all();
    }

    public function getMonth()
    {
        $months = [ 'Janvier', 'Février', 'Mars', 'Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];
        $data = [];

        for ($i=0; $i < count($months); $i++) 
        { 
            $obj = new \stdClass;
            $name = $months[$i];
            $obj->name = $months[$i];
            $obj->key = $i +1;
            array_push($data, $obj);
        }
    
        return $data;
    }
    
    public function statsYear()
    {
        $data = [];
        for ($i=1; $i <= 12; $i++) 
        { 
           $record =  Command::whereMonth('created_at', $i)->count();
           array_push($data, $record);
        }
        return $data;

    }

    public function statsProduct($product = null)
    {   
        $data = [];

        for ($i=1; $i <= 12; $i++) 
        { 
            $record = Article::whereMonth('created_at', $i)
                        ->where('name', $product)
                        ->sum('quantity');

            array_push($data, intval($record) );
        }
        return $data;
    }

    public function statsOrigin ($month)
    {   
        $data = [
            'vinted' => Command::whereMonth('created_at',$month)->where('origin', 'vinted')->count(),
            'instagram' => Command::whereMonth('created_at',$month)->where('origin', 'instagram')->count(),
            'etsy' => Command::whereMonth('created_at',$month)->where('origin', 'etsy')->count(),
        ];
        return $data;
    }

    public function statsBestProduct ()
    {
        $data = [
            'productName' => [],
            'total_sales' => [],
            'color' => []
        ];

        $products = Product::all();

        foreach ($products as $key => $item) 
        {
            $record = Article::where('name', $item->name)
                ->sum('quantity');

            $color = 'rgb('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).')';

            array_push($data['productName'], $item->name);
            array_push($data['total_sales'], intval($record));
            array_push($data['color'], $color);
            
        }
        return $data;
    }

    public function keysFigures()
    {
        $data = [
            'commande_en_attente' => [],
            'commande_envoyé' => [],
            'commande_realisé' => [],
            'chiffre_daffaire' => [],
            'production_time' => [],
            'avg_checkout' => [],
            'sum_article' => [],
        ];

        // CA  & production_time /////////////////////
        $Ca = 0;
        $production_time = 0;

        $articles = Article::all();
        foreach ($articles as $key => $article) {
            $Ca = $Ca + $article->quantity * $article->price;

            $production_time = $production_time + $article->product->production_time;

        }
        $dataCa = ['Chiffre d\'affaire', $Ca, '€'];
        $dataProduction_time = ['Temps de travail ', $production_time/60, 'h'];
        
   
        // commande_en_attente /////////////////////

        $commande_en_attente = Command::where('status', 1)->count();
        $dataCommande_en_attente = ['Commandes en attentes', $commande_en_attente, null];

        // commande_envoyé ///////
        $commande_envoyé = Command::where('status', 3)->count();
        $dataCommande_envoyé = ['Commandes envoyés', $commande_envoyé, null];

        // commande_realisé ///////
        $commande_realisé = Command::where('status', 2)->count();
        $dataCommande_realisé = ['Commandes realisé', $commande_realisé, null];

        // panier moyen /////

        $commands = Command::all();
        $checkouts = [];

        foreach ($commands as $key => $command) {
           $checkout = $command->articles->sum('price');
           array_push($checkouts, $checkout);
        }

        $avg_checkout = array_sum($checkouts)/count($checkouts);

        $dataAvg_checkout = ['Panier moyen', round($avg_checkout,2), '€'];

        // somme d'article 

        $sumArticle = Article::sum('quantity');
        $dataSumArticle = ['Articles produits', $sumArticle, null];


        //// push name + data en array

        array_push($data['commande_en_attente'], $dataCommande_en_attente);
        array_push($data['commande_envoyé'], $dataCommande_envoyé);
        array_push($data['commande_realisé'], $dataCommande_realisé);
        array_push($data['avg_checkout'], $dataAvg_checkout);
        array_push($data['chiffre_daffaire'], $dataCa);
        array_push($data['production_time'], $dataProduction_time);
        array_push($data['sum_article'], $dataSumArticle);
    
        return $data;
    }
}
