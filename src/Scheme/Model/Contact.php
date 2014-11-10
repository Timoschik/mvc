<?php

namespace Scheme\Model;

class Contact extends AbstractModel
{
    /** @var  string */
    protected $title;
    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}