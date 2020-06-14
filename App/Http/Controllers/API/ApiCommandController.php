<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Command;

class ApiCommandController extends Controller
{
    public function index ()
    {   
        $userId = \Auth::id();

        $record = Command::with('articles')
            ->where('user_id', $userId)
            ->get();
        return $record;
    }

    public function changeStatus ($number, $status)
    {
        Command::where('number', $number)->update([
            'status' => $status
        ]);
    }
}
