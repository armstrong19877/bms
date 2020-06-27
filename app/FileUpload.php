<?php

namespace App;

use File;
use Illuminate\Support\Facades\Storage;

class FileUpload
{
    public static function photo($request, $fileName, $default = "")
    {
       $imageName = time().'.'.request()->image->getClientOriginalExtension();
       request()->image->move(public_path('movements'), $imageName);
       return $imageName;



       /* $name = "";
        $image = $request->image;

        if($request)
        {
            $extension = substr(strrchr($image,'.'),1);
            $name = rand(11111, 99999) . "." . date('Y-m-d') . "." . time() . "." . $extension;
            Storage::disk('public')->put($name, $image);

        } else {
            $name = $default;
        }

        return $name;
        */
    }
}
