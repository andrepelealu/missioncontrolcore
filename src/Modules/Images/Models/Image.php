<?php namespace Eyeweb\MissionControl\Modules\Images\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Karl456\Presenter\Traits\PresentableTrait;

/**
 * Class Image
 * @package Eyeweb\MissionControl\Modules\Images\Models
 */
class Image extends Eloquent
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
    protected $presenter = '\Eyeweb\MissionControl\Modules\Images\Presenters\ImagePresenter';

    /**
     * @var string
     */
    protected $table = "images";

    /**
     * @var array
     */
    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

}
