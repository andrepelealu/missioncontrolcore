<?php namespace Eyeweb\MissionControl\Modules\Languages\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\Languages\Models\Language;

/**
 * Class LanguageRepository
 * @package Eyeweb\MissionControl\Modules\Languages\Repositories
 */
class LanguageRepository extends EloquentRepository implements LanguageInterface
{
    /**
     * @var Language
     */
    private $model;

    /**
     * LanguageRepository constructor.
     * @param Language $model
     */
    function __construct(Language $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
