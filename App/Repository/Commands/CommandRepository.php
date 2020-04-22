<?php

namespace App\Repository\Commands;

use App\Entity\Command;
use App\Entity\Fabric;
use App\Entity\Stock;
use App\Entity\Product;
use App\Toolbox\ResponseManagement;
use Illuminate\Validation\Rule;

use App\Repository\Products\ProductRepository;

use App\Rules\stockAvailable;




class CommandRepository extends ResponseManagement
{
    public function create(array $params = [], $request)
    {
        $nbCommand = Command::count() + 1;
        $number = date('dmo') . $nbCommand ;

        $stockTissus = Fabric::where('name', $request->input('tissu-1'))->first();
        $product = Product::where('name', $request->input('product-1'))->first();

        $validation = $request->validate([
                    'lname' => ['required'],
                    'fname' => ['required'],
                    'adresse' => ['required'],
                    'postalCode' => ['required'],
                    'city' => ['required'],
                    'origin' => ['required'],
                    'product-1' => ['required'],
                    'quantity-1' => ['required'],
                    'tissu-1' => ['required'],
                ]);

        if (!is_null($validation['product-1']) && !is_null($validation['quantity-1']) && !is_null($validation['tissu-1']) )
        {
            $validation = $request->validate([
                    'stocks'=> [new stockAvailable(new ProductRepository,$request)],
            ]);
        }
 
        Command::create([
            'number' => $number,
            'origin' =>$params['origin'],
            'fname' =>$params['fname'],
            'lname' =>$params['lname'],
            'adress' =>$params['adresse'],
            'postalCode' =>$params['postalCode'],
            'city' =>$params['city'],
            'status' => 1,
        ]);
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
