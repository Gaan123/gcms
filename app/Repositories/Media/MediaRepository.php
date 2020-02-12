<?php


namespace App\Repositories\Media;


use App\Repositories\BaseRepository;
use App\Model\Media;

class MediaRepository extends BaseRepository implements MediaRepositoryInterface
{
    public function getModel()
    {
        return Media::class;
    }
}
