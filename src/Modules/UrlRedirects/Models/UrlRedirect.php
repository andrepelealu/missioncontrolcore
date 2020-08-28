<?php namespace Eyeweb\MissionControl\Modules\UrlRedirects\Models;

use Eloquent, SoftDeletingTrait;
use Karl456\Presenter\Traits\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UrlRedirect
 * @package Eyeweb\MissionControl\Modules\UrlRedirects\Models
 */
class UrlRedirect extends Eloquent
{
    use PresentableTrait;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $table = "urlredirects";
    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * @var string
     */
    protected $presenter = 'Eyeweb\MissionControl\Modules\UrlRedirects\Presenters\UrlRedirectPresenter';
}
