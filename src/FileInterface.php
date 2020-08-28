<?php namespace Eyeweb\MissionControl;


/**
 * Interface FileInterface
 * @package Eyeweb\MissionControl
 */
interface FileInterface {

    /**
     * Returns all objects (excludes deleted objects)
     *
     * @return mixed
     */
    public function getAll();

}
