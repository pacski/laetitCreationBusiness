<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Command extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'number', 'origin', 'fname', 'lname', 'adress', 'postal_code',
         'city', 'status', 'comment'];

    public function articles ()
    {
        return $this->hasMany('App\Entity\Article');
    }
    public function user ()
    {
        return $this->belongsTo('App\Entity\User');
    }
}
