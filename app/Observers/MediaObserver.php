<?php

namespace App\Observers;

use App\Model\Media;

class MediaObserver
{
    /**
     * Handle the media "created" event.
     *
     * @param Media $media
     * @return void
     */
    public function created(Media $media)
    {
        //
    }

    /**
     * Handle the media "updated" event.
     *
     * @param Media $media
     * @return void
     */
    public function updated(Media $media)
    {
        //
    }

    /**
     * Handle the media "deleting" event.
     *
     * @param Media $media
     * @return void
     */
    public function deleting(Media $media)
    {
        if (file_exists($media->find($media->id)->getFullPath())){
            unlink($media->find($media->id)->getFullPath());
        }
        foreach (config('media.images') as $key=>$value){
            if (file_exists($media->find($media->id)->getFullPath($key))){
                unlink($media->find($media->id)->getFullPath($key));
            }
        }
    }
    /**
     * Handle the media "deleted" event.
     *
     * @param Media $media
     * @return void
     */
    public function deleted(Media $media)
    {
        //
    }

    /**
     * Handle the media "restored" event.
     *
     * @param Media $media
     * @return void
     */
    public function restored(Media $media)
    {
        //
    }

    /**
     * Handle the media "force deleted" event.
     *
     * @param Media $media
     * @return void
     */
    public function forceDeleted(Media $media)
    {
        //
    }
}
