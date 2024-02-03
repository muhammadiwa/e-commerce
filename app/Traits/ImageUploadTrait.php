<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploadTrait {
    
    public function uploadImage(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {

            $file = $request->file($inputName);
            $ext = $file->getClientOriginalExtension();
            $fileName = 'media_' . uniqid() . '.' . $ext;
            $file->move(storage_path($path), $fileName);

            // return $path . '/' . $fileName;
            $fullPath = $path . '/' . $fileName;

            return compact('fullPath', 'fileName');
        }
    }
}