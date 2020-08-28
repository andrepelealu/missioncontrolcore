<?php namespace Eyeweb\MissionControl\Modules\SlideshowImage\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\SlideshowImage\Models\SlideshowImage;

/**
 * Class SlideshowImageRepository
 * @package Eyeweb\MissionControl\Modules\SlideshowImage\Repositories
 */
class SlideshowImageRepository extends EloquentRepository implements SlideshowImageInterface
{
    /**
     * @var SlideshowImage
     */
    private $model;

    /**
     * SlideshowImageRepository constructor.
     * @param SlideshowImage $model
     */
    function __construct(SlideshowImage $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
