<?php namespace Modules\#plural_name\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Modules\#plural_name\Models\#name;

/**
 * Class #nameRepository
 * @package Modules\#plural_name\Repositories
 */
class #nameRepository extends EloquentRepository implements #nameInterface
{
    /**
     * @var #name
     */
    private $model;

    /**
     * #nameRepository constructor.
     * @param #name $model
     */
    function __construct(#name $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
