<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Command;

class StatsController extends Controller
{
    public function statsYear()
    {
        $data = [];
        for ($i=1; $i <= 12; $i++) { 
           $record =  Command::whereMonth('created_at', $i)->count();
           array_push($data, $record);
        }
        return $data;

    }
}
