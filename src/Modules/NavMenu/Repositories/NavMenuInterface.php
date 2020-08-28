<?php namespace Eyeweb\MissionControl\Modules\NavMenu\Repositories;

use Eyeweb\MissionControl\EloquentInterface;

/**
 * Interface NavMenuInterface
 * @package Eyeweb\MissionControl\Modules\NavMenu\Repositories
 */
interface NavMenuInterface extends EloquentInterface
{
    /**
     * @param $title
     * @return mixed
     */
    public function getByTitle($title);
}
