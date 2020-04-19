<?php

namespace App\Repository\Commands;

use App\Entity\Command;
use App\Toolbox\ResponseManagement;



class CommandRepository extends ResponseManagement
{
    public function create(array $params = [])
    {
        $nbCommand = Command::count() + 1;
        $number = date('dmo') . $nbCommand ;

        Command::create([
            'number' => $number,
            'origin' =>$params['origin'],
            'fname' =>$params['fname'],
            'lname' =>$params['lname'],
            'adress' =>$params['adresse'],
            'postalCode' =>$params['postalCode'],
            'city' =>$params['city'],
            'status' => 1,
        ]);
    }

    public function list()
    {
        // $commands = Command::all();
        // return $commands;


        // $query = Command::when(isset($params['orderBy']) && isset($params['sort']),
        // function ($query) use ($params) {
        //     $query->orderBy($params['orderBy'], $params['sort']);
        // });

        $records = Command::paginate(10);

        return $records;

    
        // $records = $query->paginate(15);

    }

    public function showLast(){

        $command = Command::orderBy('created_at', 'desc')->first();
        return $command;
    }

    public function updateStatus (Array $params = [])
    {
        $record = Command::where('id', $params['commandId'])->update([
            'status' => $params['status']
        ]);

        return $this->Response($record, 200);
    } 

    public function addComment (Array $params = [])
    {
        $record = Command::where('id', $params['commandId'])->update([
            'comment' => $params['comment']
        ]);

        return $this->Response($record, 200);
    } 
    public function delete (Array $params = [])
    {
        $record = Command::where('id', $params['commandId'])->delete();
        
        return $this->Response($record, 200);

    }
        
}
