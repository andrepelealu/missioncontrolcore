<?php namespace Eyeweb\MissionControl\Modules\ImageResizer;

use Eyeweb\MissionControl\Modules\ImageResizer\Models\ImageResizer;
use Illuminate\Support\ServiceProvider;

/**
 * Class ImageResizerServiceProvider
 * @package Eyeweb\MissionControl\Modules\ImageResizer
 */
class ImageResizerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->bind('imageresizer', function() {
            return new ImageResizer();
        });
    }
}
