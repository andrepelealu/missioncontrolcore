<?php namespace Eyeweb\MissionControl\Modules\Admins\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\Admins\Models\Admin;
use Auth;

/**
 * Class AdminRepository
 * @package Eyeweb\MissionControl\Modules\Admins\Repositories
 */
class AdminRepository extends EloquentRepository implements AdminInterface
{
    /**
     * @var Admin
     */
    private $model;

    /**
     * AdminRepository constructor.
     * @param Admin $model
     */
    function __construct(Admin $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * @param $filter
     * @param $paginate
     * @return mixed
     */
    public function getAllFilteredByAdmingroup($filter, $paginate)
    {
        $admin = auth()->guard('admins')->user();

        $model = $this->model->orderBy('created_at', 'desc')->where('admingroup_id', '>=', $admin->admingroup_id);

        if($filter == 'deleted') {
            $model->onlyTrashed();
        }

        return $model->paginate($paginate);
    }
}
