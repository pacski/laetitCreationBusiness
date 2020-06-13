<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['user_id', 'name', 'quantity', 'quantity_type', 'quantity_buyed',
     'image', 'type', 'price', 'total_expense'];

    public function products()
    {
        return $this->belongsToMany('App\Entity\Product');
    }
}
