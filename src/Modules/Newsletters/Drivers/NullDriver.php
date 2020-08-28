<?php namespace Eyeweb\MissionControl\Modules\Newsletters\Drivers;

use Eyeweb\MissionControl\Modules\Newsletters\Interfaces\NewsletterInterface;

/**
 * Class NullDriver
 * @package Eyeweb\MissionControl\Modules\Newsletters\Drivers
 */
class NullDriver implements NewsletterInterface
{
    /**
     * @param $list_id
     * @param array $fields
     * @return mixed
     */
    public function subscribe($list_id, $fields = [])
    {
        return true;
    }

}