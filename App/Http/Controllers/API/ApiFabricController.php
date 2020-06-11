<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Fabric;

class ApiFabricController extends Controller
{
    public function index ()
    {
        $userId = \Auth::id();
        $record = Fabric::where('user_id', $userId)->get();
        return $record;
    }

    public function delete($id)
    {
        Fabric::where('id', $id)->delete();
    }
}
