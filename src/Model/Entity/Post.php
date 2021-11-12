<?php

namespace App\Model\Entity;

class Post
{
    public $id;
    public $title;
    public $content;
    public $creation_date;

    public function getPostDateFr()
    {
        $date=new \DateTime($this->creation_date);
        return $date->format('d/m/Y à H:i');
    }
}
