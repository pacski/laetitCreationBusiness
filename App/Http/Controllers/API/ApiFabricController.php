<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Fabric;

class ApiFabricController extends Controller
{
    public function index ()
    {
        $record = Fabric::all();
        return $record;
    }

    public function delete($id)
    {
        Fabric::where('id', $id)->delete();
    }
}
