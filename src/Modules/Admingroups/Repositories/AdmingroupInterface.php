<?php namespace Eyeweb\MissionControl\Modules\Admingroups\Repositories;

use Eyeweb\MissionControl\EloquentInterface;

/**
 * Interface AdmingroupInterface
 * @package Eyeweb\MissionControl\Modules\Admingroups\Repositories
 */
interface AdmingroupInterface extends EloquentInterface
{
    /**
     * @param bool $filter
     * @return mixed
     */
    public function getAllFilteredByAdmin($filter = false);

    /**
     * Get all available admin permissions
     * @return mixed
     */
    public function getAvailablePermissions();
}
