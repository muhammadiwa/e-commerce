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

    public function updateImage(Request $request, $inputName, $path, $oldImage=null)
    {
        if ($request->hasFile($inputName)) {
            $filePath = public_path($oldImage);

            // Verify the file exists before attempting to delete
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $file = $request->file($inputName);
            $ext = $file->getClientOriginalExtension();
            $fileName = 'media_' . uniqid() . '.' . $ext;
            $file->move(storage_path($path), $fileName);

            // return $path . '/' . $fileName;
            $fullPath = $path . '/' . $fileName;

            return compact('fullPath', 'fileName');
        }
    }

    public function deleteImage(string $path)
    {
        $filePath = public_path($path);
        
        // Verify the file exists before attempting to delete
        if (file_exists($filePath)) {
            // Delete the file
            unlink($filePath);
        }
    }
}