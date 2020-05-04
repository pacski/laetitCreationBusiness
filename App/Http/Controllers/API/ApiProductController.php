<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Product;
use App\Entity\Article;

class ApiProductController extends Controller
{
    public function index()
    {
        $record = Product::all();
        return $record;
    }

    public function nbProduced ($name)
    {
        $record = Article::where('name', $name)->sum('quantity');
        return $record;
    }
}
