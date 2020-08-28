<?php namespace Eyeweb\MissionControl\Modules\PageFormFieldTypes\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\PageFormFieldTypes\Models\PageFormFieldType;

/**
 * Class PageFormFieldTypeRepository
 * @package Eyeweb\MissionControl\Modules\PageFormFieldTypes\Repositories
 */
class PageFormFieldTypeRepository extends EloquentRepository implements PageFormFieldTypeInterface {

    /**
     * @var PageFormFieldType
     */
    private $model;

    /**
     * @param PageFormFieldType $model
     */
    function __construct(PageFormFieldType $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

}
