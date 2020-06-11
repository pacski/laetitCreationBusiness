<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Commands\CommandRepository;
use App\Repository\Products\ProductRepository;
use App\Repository\Fabrics\FabricRepository;
use App\Repository\Articles\ArticleRepository;
use App\Repository\Stocks\StockRepository;
use App\Entity\Product;
use App\Entity\Stock;
use App\Entity\Fabric;


class CommandController extends Controller
{
     public function __construct()
     {
          $this->middleware('auth');
     }
     
    public function index(ProductRepository $productRepository, 
    FabricRepository $fabricRepository, CommandRepository $commandRepository)
    {
          $userId = \Auth::id();

          $products = $productRepository->list($userId);
          $fabrics = $fabricRepository->list($userId);
          $commands = $commandRepository->list($userId);
     

     //    $test = new \stdClass();

     //   for ($i=1; $i < 10; $i++) { 
     //        $product = "product-".$i;
     //        $secondObject =  new \stdClass();
     //        $test->$product = $secondObject;

     //        $productName = "product-".$i;
     //        $productQuantity = "quantity-".$i;
     //        $productTissu = "tissu-".$i;

     //        $secondObject->name = $productName;
     //        $secondObject->quantity = $productQuantity;
     //        $secondObject->tissu = $productTissu;


     //   }
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
    FabricRepository $fabricRepository, ProductRepository $productRepository )
    {
     $userId = \Auth::id();
     $productArray = [];
     $products = new \stdClass();

     $nbProducts = count($productRepository->list($userId));

     for ($i=1; $i <= $nbProducts; $i++) {

          $product = "product-".$i;
          $secondObject =  new \stdClass();
          $products->$product = $secondObject;

          $productName = "product-".$i;
          $productQuantity = "quantity-".$i;
          $productTissu = "tissu-".$i;

          $secondObject->name = $request->input($productName);
          $secondObject->quantity = $request->input($productQuantity);  
          $secondObject->tissu = $request->input($productTissu);  

          array_push($productArray, $request->input($productName));

          if ($request->input($productName) == null)
          {
               unset($productArray[$i - 1]);
          }
     }

     $params = [
          'user_id' => $userId,
          'lname' => $request->lname,
          'fname' => $request->fname,
          'adresse' => $request->adresse,
          'postalCode' => $request->postalCode,
          'city' => $request->city,
          'origin' => $request->origin,
          'nbProduct' => count($productArray),
     ];

     $commandRepository->create($params, $request);
     $command = $commandRepository->showLast($userId);
     $articleRepository->create($command,  $products, $userId);
     $stockRepository->stockAfterCommand($products, $userId);
     $fabricRepository->stockAfterCommand($products, $userId);



     return back();
    }

    public function updateStatus(Request $request, CommandRepository $commandRepository)
    {     
         $params = [
          'commandId' => $request->id,
          'status' => $request->status
         ];
          $response = $commandRepository->updateStatus($params);
          return response($response['body'], $response['code']);
     }

     public function addComment (Request $request, CommandRepository $commandRepository)
     {
          $params = [
               'commandId' => $request->id,
               'comment' => $request->comment,
          ];
          $response = $commandRepository->addComment($params);
          return response($response['body'], $response['code']);
     }

     public function delete (Request $request, CommandRepository $commandRepository)
     {
          $params = [
               'commandId' => $request->id,
          ];
          $response = $commandRepository->delete($params);
          return response($response['body'], $response['code']);
     }
}