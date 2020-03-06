<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Optix\Media\HasMedia;

class Post extends Model
{
    use Sluggable,HasMedia;
    public $guarded=[];
    /**
     * Return the slugable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function registerMediaGroups()
    {
        $this->addMediaGroup('featured');
    }
    public function setContentAttribute($value){
        $this->attributes['content']=$value?$value:" ";
    }
}
