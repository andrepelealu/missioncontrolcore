<?php namespace Eyeweb\MissionControl\Modules\PageTemplates\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\PageTemplates\Models\PageTemplate;

/**
 * Class PageTemplateRepository
 * @package Eyeweb\MissionControl\Modules\PageTemplates\Repositories
 */
class PageTemplateRepository extends EloquentRepository implements PageTemplateInterface
{
    /**
     * @var PageTemplate
     */
    private $model;

    /**
     * @param PageTemplate $model
     */
    function __construct(PageTemplate $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
