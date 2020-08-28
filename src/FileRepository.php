<?php namespace Eyeweb\MissionControl;

/**
 * Class FileRepository
 * @package Eyeweb\MissionControl
 */
abstract class FileRepository implements FileInterface {

    /**
     * @var
     */
    private $model;

    /**
     * @var
     */
    private $errors;

    /**
     * FileRepository constructor.
     * @param $model
     */
    function __construct($model)
    {
        $this->model = $model;;
    }

    /**
     * Returns all objects (excludes deleted objects)
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

}
