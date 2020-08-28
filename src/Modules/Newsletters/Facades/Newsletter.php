<?php namespace Eyeweb\MissionControl\Modules\Newsletters\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Newsletter
 * @package Eyeweb\MissionControl\Modules\Newsletters\Facades
 */
class Newsletter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'newsletter';
    }
}
