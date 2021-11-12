<?php

namespace App\Model\Entity;

class Comment
{
    public $id;
    public $post_id;
    public $author;
    public $comment;
    public $comment_date;

    public function getCommentDateFr()
    {
        $date=new \DateTime($this->comment_date);
        return $date->format('d/m/Y à H:i');
    }
}
