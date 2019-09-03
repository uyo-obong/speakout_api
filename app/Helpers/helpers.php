<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

if (!function_exists("formatDate")) {

    function formatDate($date)
    {
        return  Carbon::parse($date)->format('Y-m-d\TH:i:s.vP');
    }
}

if (!function_exists("currentTime")) {
    
    function currentTime()
    {
        return  Carbon::now()->toDateTimeString();
    }
}

/**
 * @param $data
 * @return string
 */
function imageUploader($data)
{

    $image = $data->userImage;
    $filename = 'speakout_user_' . time().'.'.$image->getClientOriginalExtension();
    Storage::disk('public')->put($filename, File::get($image), 'public');

    $file = public_path('user_images/'.$filename);

    // Resize the image, width = null, height = 350
    if(file_exists( $file)){
        $image = Image::make($file);
        $image->resize(null,350,function ($constraint) {
            $constraint->aspectRatio();
        });

        $image->save();

    }

    return $filename;
}
