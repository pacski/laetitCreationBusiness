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
    public function store(array $params = [],bool $getRecord = false)
    {
        $nbCommand = Command::count() + 1;
        $number = date('dmo') . $nbCommand ;

        $rules = [
            'lname' => 'required',
            'fname' => 'required',
            'adresse' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'origin' => 'required',
            'product-1' => 'required',
            'quantity-1' => 'required',
            'tissu-1' => 'required',
            'stocks'=> [new stockAvailable(new ProductRepository,$params)],
        ];
        \Validator::make($params,$rules)->validate();
 
        $record = Command::create([
            'user_id' => $params['user_id'],
            'number' => $number,
            'origin' =>$params['origin'],
            'fname' =>$params['fname'],
            'lname' =>$params['lname'],
            'adress' =>$params['adresse'],
            'postal_code' =>$params['postal_code'],
            'city' =>$params['city'],
            'status' => 1,
        ]);

        if (!$getRecord)
        {
            return $this->response($record, 200);
        }
        else
        {
            return $record;
        }
    }

    public function list($userId, bool $getRecord = false)
    {
        $records = Command::where('user_id', $userId)->paginate(10);

        if (!$getRecord)
        {
            return $this->response($records, 200);
        }
        else
        {
            return $records;
        }    
    }

    public function showLast($userId, bool $getRecord = false){

        $record = Command::where('user_id', $userId)->orderBy('created_at', 'desc')->first();

        if (!$getRecord)
        {
            return $this->response($record, 200);
        }
        else
        {
            return $record;
        } 
    }

    public function updateStatus (Array $params = [], bool $getRecord = false)
    {
        $record = Command::where('id', $params['commandId'])->update([
            'status' => $params['status']
        ]);

        if (!$getRecord)
        {
            return $this->response($record, 200);
        }
        else
        {
            return $record;
        }   
    } 

    public function addComment (Array $params = [], bool $getRecord = false)
    {
        $record = Command::where('id', $params['commandId'])->update([
            'comment' => $params['comment']
        ]);

        if (!$getRecord)
        {
            return $this->response($record, 200);
        }
        else
        {
            return $record;
        }   
    } 
    public function delete (Array $params = [], bool $getRecord = false)
    {
        $record = Command::where('id', $params['command_id'])->delete();
        
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
