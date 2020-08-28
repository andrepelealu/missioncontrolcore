<?php namespace Modules\#plural_name\Models;

use Eloquent;
use Karl456\Presenter\Traits\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class #name
 * @package Modules\#plural_name\Models
 */
class #name extends Eloquent
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
    protected $presenter = 'Modules\#plural_name\Presenters\#namePresenter';

    /**
     * @var string
     */
    protected $table = "#strtolower_plural_name";

    /**
     * @var array
     */
    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

}
