<?php namespace Eyeweb\MissionControl\Modules\Slideshow\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Karl456\Presenter\Traits\PresentableTrait;
use Eyeweb\MissionControl\Modules\Pages\Models\Page;
use Eyeweb\MissionControl\Modules\SlideshowImage\Models\SlideshowImage;

/**
 * Class Slideshow
 * @package Eyeweb\MissionControl\Modules\Slideshow\Models
 */
class Slideshow extends Eloquent
{
    use SoftDeletes;
    use PresentableTrait;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $table = "slideshows";

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
    protected $presenter = 'Eyeweb\MissionControl\Modules\Slideshow\Presenters\SlideshowPresenter';

    /**
     * @return mixed
     */
    public function slides()
    {
        return $this->hasMany(SlideshowImage::class, 'slideshow_id')->orderBy('sort_order', 'asc');
    }

    /**
     * @return mixed
     */
    public function pages()
    {
        return $this->hasMany(Page::class, 'slideshow_id');
    }
}
