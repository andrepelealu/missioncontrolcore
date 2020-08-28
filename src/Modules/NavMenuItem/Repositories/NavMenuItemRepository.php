<?php namespace Eyeweb\MissionControl\Modules\NavMenuItem\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\NavMenuItem\Models\NavMenuItem;

/**
 * Class NavMenuItemRepository
 * @package Eyeweb\MissionControl\Modules\NavMenuItem\Repositories
 */
class NavMenuItemRepository extends EloquentRepository implements NavMenuItemInterface
{
    /**
     * @var NavMenuItem
     */
    private $model;

    /**
     * NavMenuItemRepository constructor.
     * @param NavMenuItem $model
     */
    function __construct(NavMenuItem $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
