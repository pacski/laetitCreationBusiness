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

          $products = $productRepository->list($userId, true);
          $fabrics = $fabricRepository->list($userId, true);
          $commands = $commandRepository->list($userId, true);

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
     $productArray = [];
     $userId =  \Auth::id();
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

     $params = $request->all();
     $params['user_id'] = \Auth::id();
     $params['nbProduct'] = count($productArray);

     $commandRepository->store($params, true);
     $command = $commandRepository->showLast($userId, true);
     $articleRepository->store($command,  $products, $userId, true);
     $stockRepository->stockAfterCommand($products, $userId, true);
     $fabricRepository->stockAfterCommand($products, $userId, true);
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
          $response = $commandRepository->delete($request->id);
          return response($response['body'], $response['code']);
     }
}