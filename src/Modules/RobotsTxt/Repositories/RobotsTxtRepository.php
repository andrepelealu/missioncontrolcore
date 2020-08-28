<?php namespace Eyeweb\MissionControl\Modules\RobotsTxt\Repositories;

use Eyeweb\MissionControl\FileRepository;
use Eyeweb\MissionControl\Modules\RobotsTxt\Models\RobotsTxt;
use File;

/**
 * Class RobotsTxtRepository
 * @package Eyeweb\MissionControl\Modules\RobotsTxt\Repositories
 */
class RobotsTxtRepository extends FileRepository implements RobotsTxtInterface
{
    /**
     * @var RobotsTxt
     */
    private $model;

    /**
     * @param RobotsTxt $model
     */
    function __construct(RobotsTxt $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    /**
     * Get config
     * @return RobotsTxt
     */
    public function getConfig()
    {
        $robots = File::get('robots.txt');
        $this->model->robots = $robots;
        return $this->model;
    }

    /**
     * Update config
     * @param $robots_contents
     * @return bool
     */
    public function updateConfig($robots_contents)
    {
        $write_to_file = File::put('robots.txt', $robots_contents['robots']);
        if($write_to_file === false) {
            return false;
        }
        return true;
    }
}
