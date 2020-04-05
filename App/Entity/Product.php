<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'image', 'cost', 'price', 'productionTime'];

    public function article ()
    {
        return $this->belongsTo('App\Entity\Article');
    }

    public function stocks()
    {
        return $this->belongsToMany('App\Entity\Stock')->withPivot('quantity');
    }
    
}
