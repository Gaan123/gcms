<?php

namespace App\Http\Controllers\Backend;

use App\Extended\MediaUploader;
use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public $media;

    /**
     * MediaController constructor.
     * @param MediaRepositoryInterface $mediaRepository
     */
    public function __construct(MediaRepositoryInterface $mediaRepository)
    {
        $this->media=$mediaRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function uploads(Request $request)
    {
        $file = $request->file('file');

        // Default usage
        $media = MediaUploader::fromFile($file)->upload();
        $media->attachMedia($media->id,'gallery');
        return response(json_encode(['media'=>$media]), 200);
    }


    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id){
        $deleted=$this->media->delete($id)?true:false;
        return response()->json([
            'success' => 'Record deleted successfully!',
            'deleted' => $deleted
        ]);
    }
}
