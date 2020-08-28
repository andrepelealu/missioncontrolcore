<?php namespace Eyeweb\MissionControl\Modules\PageFormEnquiries\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\PageFormEnquiries\Models\PageFormEnquiry;

/**
 * Class PageFormEnquiryRepository
 * @package Eyeweb\MissionControl\Modules\PageFormEnquiries\Repositories
 */
class PageFormEnquiryRepository extends EloquentRepository implements PageFormEnquiryInterface {

    /**
     * @var PageFormEnquiry
     */
    private $model;

    /**
     * @param PageFormEnquiry $model
     */
    function __construct(PageFormEnquiry $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

}
