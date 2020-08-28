<?php namespace Eyeweb\MissionControl\Modules\PageFormFieldTypes\Models;

use Eloquent;
use Karl456\Presenter\Traits\PresentableTrait;

/**
 * Class PageFormFieldType
 * @package Eyeweb\MissionControl\Modules\PageFormFieldTypes\Models
 */
class PageFormFieldType extends Eloquent
{
    use PresentableTrait;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $presenter = '\Eyeweb\MissionControl\Modules\PageFormFieldTypes\Presenters\PageFormFieldTypePresenter';

    /**
     * @var string
     */
    protected $table = "page_form_field_types";

    /**
     * @var array
     */
    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];



}
