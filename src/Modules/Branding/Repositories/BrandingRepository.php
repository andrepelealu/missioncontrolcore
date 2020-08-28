<?php namespace Eyeweb\MissionControl\Modules\Branding\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\Branding\Models\Branding;

/**
 * Class BrandingRepository
 * @package Eyeweb\MissionControl\Modules\Branding\Repositories
 */
class BrandingRepository extends EloquentRepository implements BrandingInterface
{
    /**
     * @var Branding
     */
    private $model;

    /**
     * BrandingRepository constructor.
     * @param Branding $model
     */
    function __construct(Branding $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
