<?php namespace Eyeweb\MissionControl\Modules\MarketingSettings\Models;

use Eloquent;

/**
 * Class MarketingSetting
 * @package Eyeweb\MissionControl\Modules\MarketingSettings\Models
 */
class MarketingSetting extends Eloquent
{
    /**
     * @var string
     */
    protected $table = "marketingsettings";

    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * @param $value
     */
    public function setSettingAttribute($value)
    {
        $this->attributes['setting'] = str_replace(' ', '_', strtolower($value));
    }
}
