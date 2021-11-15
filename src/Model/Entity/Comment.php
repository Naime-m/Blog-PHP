<?php

namespace App\Model\Entity;

class Comment
{
    public $id;
    public $post_id;
    public $comment;
    public $comment_date;
    public $user_id;
    public $comment_status_id;
    
    public function getCommentDateFr()
    {
        $date=new \DateTime($this->comment_date);
        return $date->format('d/m/Y à H:i');
    }
}
