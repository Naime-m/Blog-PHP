<?php

namespace App\Model\Repository;

use App\Model\Entity\Comment;

class CommentRepository extends Repository
{
    public function getAllByPostId($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT comments.id AS comment_id, comments.post_id, comments.comment,
        comments.comment_date, comments.user_id, comments.comment_status_id, users.id AS users_id, 
        users.lastname, users.firstname, comment_status.id AS tcomment_status_id, comment_status.label
        FROM comments 
        JOIN users ON comments.user_id = users.id
        JOIN comment_status ON comments.comment_status_id = comment_status.id
        WHERE post_id = ? ORDER BY comment_date DESC');
        $query->execute([$postId]);
        $comments = $query->fetchAll(\PDO::FETCH_CLASS, Comment::class);

        return $comments;
    }

    public function getAllByStatus($status)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT comments.id AS comment_id, comments.post_id, comments.comment,
        comments.comment_date, comments.user_id, comments.comment_status_id, users.id AS users_id, 
        users.lastname, users.firstname, comment_status.id AS tcomment_status_id
        FROM comments 
        JOIN users ON comments.user_id = users.id
        JOIN comment_status ON comments.comment_status_id = comment_status.id
        WHERE comment_status_id = :status ORDER BY comment_date DESC');
        $query->bindParam(':status', $status);
        $query->execute();
        $comments = $query->fetchAll(\PDO::FETCH_CLASS, Comment::class);
        return $comments;
    }

    public function insert($postId, $comment, $user_id)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO comments(post_id, comment, user_id, comment_status_id, comment_date)
        VALUES(?, ?, ?, 1, NOW())');
        $comments = $query->execute([$postId, $comment, $user_id]);

        return $comments;
    }

    public function get($commentId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT id, comment, comment_date 
        FROM comments WHERE id = ?');
        $query->execute([$commentId]);
        $comment = $query->fetchAll(\PDO::FETCH_CLASS, Comment::class);
        if (!isset($comment[0])) {
            throw new \Exception('Le commentaire n\'existe pas');
        }

        return $comment[0];
    }

    public function update($commentId, $comment)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE comments SET comment=?, comment_date = NOW()
        WHERE id = ?');
        $query->execute([$comment, $commentId]);
    }

    public function delete($commentId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM comments WHERE id = ?');
        $query->execute([$commentId]);
    }
    public function updateStatus($commentId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE comments SET comment_status_id = 2
        WHERE id = ?');
        $query->execute([$commentId]);
    }

}
