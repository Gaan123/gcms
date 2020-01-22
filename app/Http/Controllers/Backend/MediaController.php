<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Optix\Media\MediaUploader;

class MediaController extends Controller
{
    public function uploads(Request $request)
    {
        $file = $request->file('file');

// Default usage
        $media = MediaUploader::fromFile($file)->upload();
    }
}
