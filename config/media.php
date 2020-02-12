<?php

return [

    /*
     * The disk where files should be uploaded.
     */
    'disk' => 'public',

    /*
     * The queue used to perform image conversions.
     * Leave empty to use the default queue driver.
     */
    'queue' => null,

    /*
     * The fully qualified class name of the media model.
     */
    'model' => \App\Model\Media::class,
    /**
     * register sies for conversion
     */
    'images'=>[
        'thumb'=>[150,150],
        'thumb_250'=>[250,250],
    ],

];
