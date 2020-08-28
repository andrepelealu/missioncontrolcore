<?php namespace Eyeweb\MissionControl\Modules\Images\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\Images\Models\Image;

/**
 * Class ImageRepository
 *
 * @package Eyeweb\MissionControl\Modules\Images\Repositories
 */
class ImageRepository extends EloquentRepository implements ImageInterface
{
    /**
     * @var Image
     */
    private $model;

    /**
     * ImageRepository constructor.
     * @param Image $model
     */
    function __construct(Image $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
