<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Command extends Model
{
    use SoftDeletes;

    protected $fillable = ['number', 'origin', 'fname', 'lname', 'adress', 'postalCode',
         'city', 'status', 'comment'];

    public function articles ()
    {
             return $this->hasMany('App\Entity\Article');
    }
}
