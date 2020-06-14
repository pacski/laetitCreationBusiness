<?php

namespace App\Repository\Products;

use App\Entity\Product;
use App\Entity\Stock;
use App\Entity\Product_Stock;
use Illuminate\Support\Facades\Validator;
use App\Toolbox\ResponseManagement;



class ProductRepository extends ResponseManagement
{
    public function store(array $params = [], object $materiels, bool $getRecord = false)
    {
        $rules = [
            'name' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'production_time' => 'required',
            // 'image' => 'required',
            'materiel_1' => 'required',
            'quantity_1' => 'required'
        ];
        Validator::make($params,$rules)->validate();

        $record = Product::create([
            'user_id' => $params['user_id'],
           'name' => $params['name'],
           'image' => $params['image'],
           'cost' => $params['cost'],
           'price' => $params['price'],
           'production_time' => $params['production_time'],
        ]);

        foreach ($materiels as $key => $materiel) 
        {

            if ( isset($materiel->id) && isset($materiel->quantity) )
            {
                $materielId = $materiel->id;
                $product = Product::where('user_id', $params['user_id'])->where('name', $params['name'])->first();
                $product->stocks()->attach($materielId, ['quantity' => $materiel->quantity ]);
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

    public function list($userId, bool $getRecord = false)
    {
        $records = Product::where('user_id', $userId)->get();

        if (!$getRecord)
        {
            return $this->response($records, 200);
        }
        else
        {
            return $records;
        }
    }
}
