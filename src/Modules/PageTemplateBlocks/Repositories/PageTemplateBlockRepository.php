<?php namespace Eyeweb\MissionControl\Modules\PageTemplateBlocks\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\PageTemplateBlocks\Models\PageTemplateBlock;

/**
 * Class PageTemplateBlockRepository
 * @package Eyeweb\MissionControl\Modules\PageTemplateBlocks\Repositories
 */
class PageTemplateBlockRepository extends EloquentRepository implements PageTemplateBlockInterface
{
    /**
     * @var PageTemplateBlock
     */
    private $model;

    /**
     * PageTemplateBlockRepository constructor.
     * @param PageTemplateBlock $model
     */
    function __construct(PageTemplateBlock $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
