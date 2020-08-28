<?php namespace Eyeweb\MissionControl\Modules\PageFormFields\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\PageFormFields\Models\PageFormField;

/**
 * Class PageFormFieldRepository
 * @package Eyeweb\MissionControl\Modules\PageFormFields\Repositories
 */
class PageFormFieldRepository extends EloquentRepository implements PageFormFieldInterface {

    /**
     * @var PageFormField
     */
    private $model;

    /**
     * @param PageFormField $model
     */
    function __construct(PageFormField $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

}
