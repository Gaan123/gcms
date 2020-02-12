<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Optix\Media\MediaUploader;
use Optix\Media\Models\Media;

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
        $media->attachMedia($media->id,'gallery');
        return response('File Uploaded Successfully', 200);
    }

    public function allMedias()
    {
        return $this->media->getAll();
    }
    public function delete($id){
//        dd(Storage::delete($this->media->find($id)->getFullPath()));
//        dd('storage/'.$this->media->find($id)->getPath());
//        if(unlink($this->media->find($id)->getFullPath())){
            $this->media->delete($id);

//        }
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
