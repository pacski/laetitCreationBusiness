<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $fillable = ['name', 'image', 'quantity', 'price', 'quantity_buyed'];

    public function article ()
    {
        return $this->belongsTo('App\Entity\Article');
    }

}
