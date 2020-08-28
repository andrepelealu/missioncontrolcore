<?php namespace Eyeweb\MissionControl\Modules\Images\Traits;

use Eyeweb\MissionControl\Modules\Images\Models\Image;

trait Imageable {

    /**
     * @return mixed
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable', 'reference_model', 'reference_id');
    }

}