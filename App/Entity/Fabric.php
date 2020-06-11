<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fabric extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'name', 'image', 'quantity', 'price', 'quantity_buyed'];

    public function article ()
    {
        return $this->belongsTo('App\Entity\Article');
    }

    public function user ()
    {
        return $this->belongsTo('App\Entity\User');
    }

}
