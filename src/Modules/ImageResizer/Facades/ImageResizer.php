<?php namespace Eyeweb\MissionControl\Modules\ImageResizer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ImageResizer
 * @package Eyeweb\MissionControl\Modules\ImageResizer\Facades
 */
class ImageResizer extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'imageresizer';
    }
}
