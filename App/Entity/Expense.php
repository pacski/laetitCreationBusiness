<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['name', 'quantity', 'quantity_type', 'type', 'amount'];
}
