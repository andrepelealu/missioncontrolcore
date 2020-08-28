<?php namespace Eyeweb\MissionControl\Modules\Users\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\Users\Models\User;
use Auth;

/**
 * Class UserRepository
 * @package Eyeweb\MissionControl\Modules\Users\Repositories
 */
class UserRepository extends EloquentRepository implements UserInterface
{
    /**
     * @var User
     */
    private $model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    function __construct(User $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
