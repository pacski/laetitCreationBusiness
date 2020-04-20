<?php

namespace App\Repository\Commands;

use App\Entity\Command;
use App\Entity\Fabric;
use App\Entity\Stock;
use App\Entity\Product;
use App\Toolbox\ResponseManagement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Rules\stockAvailable;




class CommandRepository extends ResponseManagement
{
    public function create(array $params = [], $request)
    {
        $nbCommand = Command::count() + 1;
        $number = date('dmo') . $nbCommand ;

        $stockTissus = Fabric::where('name', $request->input('tissu-1'))->first();
        $product = Product::where('name', $request->input('product-1'))->first();

        
        // $test = [];

        for ($i=1; $i <= $params['nbProduct'] ; $i++) { 

        //     $stockTissus = Fabric::where('name', $request->input('tissu-'.$i))->first();
        //     $product = Product::where('name', $request->input('product-'.$i))->first();
        //     $quantityProduct = $request->input('quantity-'.$i);

        //     $stockFabricAfter = $stockTissus->quantity - $product->cost * $quantityProduct ;

        //     $fabricValidation = false;

        //     if ($stockFabricAfter < 0)
        //     {
        //         $fabricValidation = true;
        //     }

        //     $po = [];

        //     foreach ($product->stocks as $key => $item) {

        //         $materiel = Stock::where('id', $item->pivot->stock_id)->first();
        //         $stockMateriel = $materiel->quantity;
        //         $quantityMateriel = $item->pivot->quantity * $quantityProduct;

        //         $stockMaterielAfter = $stockMateriel - $quantityMateriel ;

        //         $materielValidation = false;

        //         if ($stockMaterielAfter < 0)
        //         {
        //             $materielValidation = true;
        //         }

                // array_push($po, $materielValidation);
        //     }


            // $validator = Validator::make($request->all(), [
            //     'product-'.$i => [new stockAvailable]
            // ]);

           

        //     $test = [];

        //     array_push($test, $stockTissus->quantity);
        //     array_push($test, $product->cost);
        //     array_push($test, $request->input('quantity-'.$i));
        //     array_push($test, $stockFabricAfter);
        //     array_push($test, $product->stocks);

         }
        // dd($po);


        // Command::create([
        //     'number' => $number,
        //     'origin' =>$params['origin'],
        //     'fname' =>$params['fname'],
        //     'lname' =>$params['lname'],
        //     'adress' =>$params['adresse'],
        //     'postalCode' =>$params['postalCode'],
        //     'city' =>$params['city'],
        //     'status' => 1,
        // ]);
    }

    public function list()
    {
       
        $records = Command::paginate(10);

        return $records;
    }

    public function showLast(){

        $command = Command::orderBy('created_at', 'desc')->first();
        return $command;
    }

    public function updateStatus (Array $params = [])
    {
        $record = Command::where('id', $params['commandId'])->update([
            'status' => $params['status']
        ]);

        return $this->Response($record, 200);
    } 

    public function addComment (Array $params = [])
    {
        $record = Command::where('id', $params['commandId'])->update([
            'comment' => $params['comment']
        ]);

        return $this->Response($record, 200);
    } 
    public function delete (Array $params = [])
    {
        $record = Command::where('id', $params['commandId'])->delete();
        
        return $this->Response($record, 200);

    }
        
}
