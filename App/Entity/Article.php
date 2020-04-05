<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['command_id', 'quantity', 'name', 'price', 'image', 'fabricName'];

    public function command ()
    {
        return $this->belongsTo('App\Entity\Command');
    }

    public function product ()
    {
        return $this->hasOne('App\Entity\Product', 'name', 'name');
    }

    public function fabric ()
    {
        return $this->hasOne('App\Entity\Fabric', 'name', 'fabricName');
    }
    public function stock ()
    {
        return $this->hasOne('App\Entity\Stock', 'name', 'fabricName');
    }
}
