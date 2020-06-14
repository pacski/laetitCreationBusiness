<?php

namespace App\Repository\Users;


use App\Toolbox\ResponseManagement;
use App\Entity\User;

use \stdClass;


class UserRepository extends ResponseManagement
{
    public function index()
    {
        $records = User::all();
        return $records;
    }

    public function create(array $params = [], bool $getRecord = false)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
        \Validator::make($params,$rules)->validate();

        $record = User::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => $params['password'],
        ]);

        if (!$getRecord)
        {
            return $this->response($records, 200);
        }
        else
        {
            return $records;
        }
    }




}
