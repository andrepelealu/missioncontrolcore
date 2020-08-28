<?php namespace Eyeweb\MissionControl\Modules\Usergroups\Repositories;

use Eyeweb\MissionControl\EloquentInterface;

/**
 * Interface UsergroupInterface
 * @package Eyeweb\MissionControl\Modules\Usergroups\Repositories
 */
interface UsergroupInterface extends EloquentInterface
{
    /**
     * Get all available user permissions
     * @return mixed
     */
    public function getAvailablePermissions();
}
