<?php


namespace App\Http\View\Composer\Media;


use App\Repositories\Media\MediaRepository;
use Illuminate\View\View;

class MediaListComposer
{
    /**
     * The user repository implementation.
     *
     * @var MediaRepository
     */
    protected $media;

    /**
     * Create a new profile composer.
     *
     * @param  MediaRepository $mediaRepository
     * @return void
     */
    public function __construct(MediaRepository $mediaRepository)
    {
        // Dependencies automatically resolved by service container...
        $this->media = $mediaRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('medias', $this->media->getAllLatest());
    }
}
