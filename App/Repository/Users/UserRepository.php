<?php

namespace App\Repository\Users;


use App\Toolbox\ResponseManagement;
use App\Entity\User;

use \stdClass;


class UserRepository extends ResponseManagement
{
    public function index()
    {
        $record = User::all();
        return $record;
    }

    public function create(array $params = [], $request)
    {
        $request->validate([
            'name' => "required",
            'email' => "required",
            'password' => "required",
        ]);

        return 
        User::create([
         'name' => $params['name'],
         'email' => $params['email'],
         'password' => $params['password'],
         ]);


    }




}
