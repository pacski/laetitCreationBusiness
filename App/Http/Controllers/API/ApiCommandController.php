<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Command;

class ApiCommandController extends Controller
{
    public function index ()
    {
        $record = Command::
            with('articles')
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
