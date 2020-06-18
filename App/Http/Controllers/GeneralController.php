<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Products\ProductRepository;
use App\Repository\Stocks\StockRepository;
use App\Repository\Users\UserRepository;

class GeneralController extends Controller
{    
    public function index(UserRepository $userRepository)
    {
        return view('pages.home.index');
    }
}
