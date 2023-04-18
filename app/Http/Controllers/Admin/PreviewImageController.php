<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Previewimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PreviewImageController extends Controller
{
    
    public function delete($name,$fieldName)
    {
        // $data = [$name];
        
        // Delete the image from storage
        Storage::delete('public/images/gallery/'.$name);
        
        $image = Previewimage::where($fieldName,$name)->first();
        $image->$fieldName = null;
        $image->update();
                
        return response()->json(['status'=>'1','message' => 'Image deleted successfully.'],200);


    }
}
