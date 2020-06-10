<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Users\UserRepository;

class UserController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index(UserRepository $userRepository)
    {
        $record = $userRepository->index();
        return view('pages.user.index',[
            'users' => $record,
        ]); 
    }

    public function create (Request $request, UserRepository $userRepository)
    {
        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        $record = $userRepository->create($params, $request);

        return $record;
    }

   
}
