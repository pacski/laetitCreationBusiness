<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = ['number', 'origin', 'fname', 'lname', 'adress', 'postalCode',
         'city', 'status'];

    public function articles ()
    {
             return $this->hasMany('App\Entity\Article');
    }
}
