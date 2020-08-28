<?php namespace Eyeweb\MissionControl\Modules\UrlRedirects\Repositories;

use Eyeweb\MissionControl\EloquentRepository;
use Eyeweb\MissionControl\Modules\UrlRedirects\Models\UrlRedirect;

/**
 * Class UrlRedirectRepository
 * @package Eyeweb\MissionControl\Modules\UrlRedirects\Repositories
 */
class UrlRedirectRepository extends EloquentRepository implements UrlRedirectInterface
{
    /**
     * @var UrlRedirect
     */
    private $model;

    /**
     * UrlRedirectRepository constructor.
     * @param UrlRedirect $model
     */
    function __construct(UrlRedirect $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }
}
