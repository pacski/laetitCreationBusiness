<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['name', 'quantity', 'quantity_type', 'quantity_buyed',
     'image', 'type', 'price'];

    public function products()
    {
        return $this->belongsToMany('App\Entity\Product');
    }
}
