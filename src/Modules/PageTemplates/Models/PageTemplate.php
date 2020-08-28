<?php namespace Eyeweb\MissionControl\Modules\PageTemplates\Models;

use Eloquent, Image;
use Illuminate\Database\Eloquent\SoftDeletes;
use Karl456\Presenter\Traits\PresentableTrait;
use Eyeweb\MissionControl\Modules\Pages\Models\Page;
use Eyeweb\MissionControl\Modules\PageTemplateBlocks\Models\PageTemplateBlock;

/**
 * Class PageTemplate
 * @package Eyeweb\MissionControl\Modules\PageTemplates\Models
 */
class PageTemplate extends Eloquent
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
    protected $table = "pagetemplates";

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
    protected $presenter = '\Eyeweb\MissionControl\Modules\PageTemplates\Presenters\PageTemplatesPresenter';

    /**
     * @return mixed
     */
    public function page()
    {
        return $this->hasMany(Page::class, 'pagetemplate_id');
    }

    /**
     * @return mixed
     */
    public function getViewFile()
    {
        return str_replace('.blade.php', '', $this->view_file);
    }

    /**
     * @return mixed
     */
    public function blocks()
    {
        return $this->hasMany(PageTemplateBlock::class, 'pagetemplate_id')->orderBy('sort_order', 'asc');
    }
}
