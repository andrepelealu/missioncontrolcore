<?php namespace Eyeweb\MissionControl\Modules\PageFormEnquiries\Models;

use Eloquent;
use Eyeweb\MissionControl\Modules\PageFormEnquiryFields\Models\PageFormEnquiryField;
use Eyeweb\MissionControl\Modules\PageForms\Models\PageForm;
use Illuminate\Notifications\Notifiable;
use Karl456\Presenter\Traits\PresentableTrait;

/**
 * Class PageFormEnquiry
 * @package Eyeweb\MissionControl\Modules\PageFormEnquiries\Models
 */
class PageFormEnquiry extends Eloquent
{
    use PresentableTrait;
    use Notifiable;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $presenter = '\Eyeweb\MissionControl\Modules\PageFormEnquiries\Presenters\PageFormEnquiryPresenter';

    /**
     * @var string
     */
    protected $table = "page_form_enquiries";

    /**
     * @var array
     */
    protected $guarded = ['id', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return mixed
     */
    public function pageform()
    {
        return $this->belongsTo(PageForm::class, 'page_form_id', 'id');
    }

    /**
     * @param $value
     * @return false|string
     */
    public function setFieldsAttribute($value)
    {
        $this->attributes['fields'] = json_encode($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getFieldsAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getNewsletterFieldsAttribute($value)
    {
        $newsletterfields = [];
        foreach($this->pageform->newsletterfields as $newsletterfield) {
            $newsletterfields[$newsletterfield->name_snakecase] = $this->fields->{$newsletterfield->name_snakecase};
        }

        return $newsletterfields;
    }

}
