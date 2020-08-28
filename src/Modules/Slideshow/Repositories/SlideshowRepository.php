<?php namespace Eyeweb\MissionControl\Modules\Slideshow\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\Slideshow\Models\Slideshow;

/**
 * Class SlideshowRepository
 * @package Eyeweb\MissionControl\Modules\Slideshow\Repositories
 */
class SlideshowRepository extends EloquentRepository implements SlideshowInterface
{
    /**
     * @var Slideshow
     */
    private $model;

    /**
     * SlideshowRepository constructor.
     * @param Slideshow $model
     */
    function __construct(Slideshow $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
