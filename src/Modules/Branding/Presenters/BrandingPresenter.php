<?php namespace Eyeweb\MissionControl\Modules\Branding\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class BrandingPresenter
 * @package Eyeweb\MissionControl\Modules\Branding\Presenters
 */
class BrandingPresenter extends Presenter
{
    /**
     * @return mixed|string
     */
    public function getLogo()
    {
        if($this->logo != '') {
            return frontendcdn($this->logo);
        }
        return asset('assets/admin/images/logo.png');
    }
}
