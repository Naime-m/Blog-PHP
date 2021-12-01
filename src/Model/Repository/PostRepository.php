<?php

namespace App\Model\Repository;

use App\Model\Entity\Post;

class PostRepository extends Repository
{
    public function getAll()
    {
        $db = $this->dbConnect();
        $query = $db->query('SELECT posts.id, posts.title, posts.content, posts.creation_date, posts.user_id,
        users.lastname, users.firstname
        FROM posts JOIN users ON posts.user_id = users.id
        ORDER BY creation_date DESC LIMIT 0, 5');

        $posts = $query->fetchAll(\PDO::FETCH_CLASS, Post::class);

        return $posts;
    }

    public function insert($title, $content, $user_id)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO posts(title, content, creation_date, user_id) VALUES(?, ?, NOW(), ? )');
        $query->execute([$title, $content, $user_id]);
        $postId = $db->lastInsertId();

        return $postId;
    }

    public function get($postId)
    {
        $db =

        $this->dbConnect();
        $query = $db->prepare('SELECT
         posts.id, posts.title, posts.content, posts.creation_date, posts.user_id,
        users.lastname, users.firstname
        FROM posts JOIN users ON posts.user_id = users.id
        WHERE posts.id = ?');

        $query->execute([$postId]);
        $posts = $query->fetchAll(\PDO::FETCH_CLASS, Post::class);

        if (!isset($posts[0])) {
            throw new \Exception('Le post n\'existe pas');
        }

        return $posts[0];
    }

    public function update($title, $content, $postId, $userId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE posts, users
        SET title=?, content=?, posts.user_id = users.id, creation_date = NOW()
        WHERE posts.id = ?
        ');
        $query->execute([$title, $content, $postId, $userId]);
    }

    public function delete($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM posts WHERE id = ?');
        $query->execute([$postId]);
    }
}
