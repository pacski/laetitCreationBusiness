<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Fabrics\FabricRepository;
use App\Service\StoreImage;

class FabricController extends Controller
{
    
    public function index(FabricRepository $fabricRepository)
    {
        $fabrics = $fabricRepository->list();

        return view('pages.fabric.index', [
            'fabrics' => $fabrics
            ]);
    }

    public function create(StoreImage $storeImage, Request $request,
    FabricRepository $fabricRepository)
    {
        if ($request->file('image') != null )
        {
            $image = $storeImage->store($request->file('image'), "Fabric");
        }
        else
        {
            $image = null ;
        }

        
        $params = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'image' => $image,
            'price' => $request->price,
        ];
        $response = $fabricRepository->store($params);

        return back();
    }
}
