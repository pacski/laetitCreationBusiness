<?php

namespace App\Service;
use App\Toolbox\ResponseManagement;

class StoreImage extends ResponseManagement
{
    public function store($request, $folder)
    {
        $extension = $request->getClientOriginalExtension();
        $imageName = implode('',explode(' ',request('name')));
        $file = $request;
        $fileName = $imageName .'.'. $extension;
        $destinationPath = public_path("/images/$folder");
        $file->move($destinationPath, $fileName);
    
        return $fileName;
    }
}
