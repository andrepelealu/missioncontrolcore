<?php namespace Eyeweb\MissionControl\Modules\Languages\Models;

use Eloquent, SoftDeletingTrait;
use Karl456\Presenter\Traits\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 * @package Eyeweb\MissionControl\Modules\Languages\Models
 */
class Language extends Eloquent
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
    protected $presenter = 'Eyeweb\MissionControl\Modules\Languages\Presenters\LanguagePresenter';

    /**
     * @var string
     */
    protected $table = "languages";
    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
