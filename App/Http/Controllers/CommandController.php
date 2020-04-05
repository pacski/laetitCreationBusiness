<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Commands\CommandRepository;
use App\Repository\Products\productRepository;
use App\Repository\Fabrics\FabricRepository;
use App\Repository\Articles\ArticleRepository;
use App\Repository\Stocks\StockRepository;
use App\Entity\Product;
use App\Entity\Stock;
use App\Entity\Fabric;
use \stdClass;


class CommandController extends Controller
{
    public function index(ProductRepository $productRepository, 
    FabricRepository $fabricRepository, CommandRepository $commandRepository)
    {
        $products = $productRepository->list();
        $fabrics = $fabricRepository->list();
        $commands = $commandRepository->list();


        $test = new stdClass();

       for ($i=1; $i < 10; $i++) { 
            $product = "product-".$i;
            $secondObject =  new stdClass();
            $test->$product = $secondObject;

            $productName = "product-".$i;
            $productQuantity = "quantity-".$i;
            $productTissu = "tissu-".$i;

            $secondObject->name = $productName;
            $secondObject->quantity = $productQuantity;
            $secondObject->tissu = $productTissu;


       }
     //   \Debugbar::info($test);
     //   $product = Product::where('name', 'produit 4')->first();

     //   foreach ($product->stocks as $key => $stock) {
     //      // \Debugbar::info($stock->name);
     //      // \Debugbar::info($stock->pivot->quantity);
     //      $materielName = $stock->name;
     //      $materielQuantity = $stock->quantity;
     //      $materiel = Stock::where('name', $materielName)->first();
     //      $stockTotal = $materiel->quantity - $stock->pivot->quantity * 4;
     //      \Debugbar::info( 'materielName :' .$materielName);
     //      \Debugbar::info( 'materielQuantity :'.$materielQuantity);
     //      \Debugbar::info( 'materiel :'.$materiel);
     //      \Debugbar::info( 'stockTotal :'.$stockTotal);
     // }
     // foreach ($test as $key => $item) {

          // $product = Product::where('name', 'pouroduit 3')->first();

          // $fabric = Fabric::where('name', 'tissus3')->first();
          // $total = $fabric->quantity - $product->cost * 1;

          // \Debugbar::info($product);
          // \Debugbar::info($fabric);
          // \Debugbar::info($total);
          // Fabric::where('name', $item->tissu)->update([
          //     'quantity' => $total
          // ]);

      //}


        return view('pages.command.index', [
            "products" => $products,
            "fabrics" => $fabrics,
            "commands" => $commands
            ]);
    }

    public function create(Request $request, CommandRepository $commandRepository,
    ArticleRepository $articleRepository, StockRepository $stockRepository,
    FabricRepository $fabricRepository )
    {
     $params = [
          'lname' => $request->lname,
          'fname' => $request->fname,
          'adresse' => $request->adresse,
          'postalCode' => $request->postalCode,
          'city' => $request->city,
          'origin' => $request->origin,
     ];
     $productArray = [];
     $products = new stdClass();

     for ($i=1; $i < 10; $i++) { 
          $product = "product-".$i;
          $secondObject =  new stdClass();
          $products->$product = $secondObject;

          $productName = "product-".$i;
          $productQuantity = "quantity-".$i;
          $productTissu = "tissu-".$i;

          $secondObject->name = $request->input($productName);
          $secondObject->quantity = $request->input($productQuantity);  
          $secondObject->tissu = $request->input($productTissu);  

     }

     $commandRepository->create($params);

     $command = $commandRepository->showLast();

     $articleRepository->create( $command,  $products);

     $stockRepository->stockAfterCommand($products);
     $fabricRepository->stockAfterCommand($products);



     return back();
    }
    
}