<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id', 'name', 'image', 'cost', 'price', 'production_time'];

    public function article ()
    {
        return $this->belongsTo('App\Entity\Article');
    }

    public function stocks()
    {
        return $this->belongsToMany('App\Entity\Stock')->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsToMany('App\Entity\Stock');
    }
    
}
