<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepositoryInterface;
use Illuminate\Http\Request;
use Optix\Media\MediaUploader;

class MediaController extends Controller
{
    public $media;
    public function __construct(MediaRepositoryInterface $mediaRepository)
    {
        $this->media=$mediaRepository;
    }

    public function uploads(Request $request)
    {
        $file = $request->file('file');

        // Default usage
        $media = MediaUploader::fromFile($file)->upload();
        return response('File Uploaded Successfully', 200);
    }

    public function allMedias()
    {
        return $this->media->getAll();
    }
    public function delete($id){

    }
}
