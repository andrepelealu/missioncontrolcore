<?php namespace Modules\#plural_name\Presenters;

use Karl456\Presenter\Presenter;

/**
 * Class #namePresenter
 * @package Modules\#plural_name\Presenters
 */
class #namePresenter extends Presenter
{
    /**
     * @return mixed|string
     */
    public function getSlug()
    {
        return '/#strtolower_plural_name/' . $this->slug;
    }

    /**
    * @return mixed|string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed|string
     */
    public function getPublished()
	{
		if($this->published == true) {
			return 'Published';
		}
		return 'Hidden';
	}

    /**
     * @return string
     */
    public function getPublishedLabel()
    {
        if($this->published == true) {
            return '<span class="label success">Published</span>';
        }
        return '<span class="label alert">Hidden</span>';
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at->format('d/m/Y - g:i A');
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at->format('d/m/Y - g:i A');
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deleted_at->format('d/m/Y - g:i A');
    }
}
