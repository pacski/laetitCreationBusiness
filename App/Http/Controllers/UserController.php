<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Users\UserRepository;

class UserController extends Controller
{
    public function index(UserRepository $userRepository)
    {
        $record = $userRepository->index();
        return   $record;
        // return view('pages.home.index', 
        // [
        //     'users' => $record,
        // ]); 
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
