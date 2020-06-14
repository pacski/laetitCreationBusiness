<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Products\ProductRepository;
use App\Repository\Stocks\StockRepository;
use App\Repository\Users\UserRepository;

class GeneralController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index(UserRepository $userRepository)
    {
        $record = $userRepository->index();
        
        return view('pages.home.index', [
            'users' => $record,
        ]);
    }
}
