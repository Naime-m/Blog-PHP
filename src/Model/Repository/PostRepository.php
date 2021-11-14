<?php

namespace App\Model\Repository;

use App\Model\Entity\Post;

class PostRepository extends Repository
{
    public function getAll()
    {
        $db = $this->dbConnect();
        $query = $db->query('SELECT id, title, content, creation_date, user_id
        FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        $posts = $query->fetchAll(\PDO::FETCH_CLASS, Post::class);
        return $posts;
    }

    public function insert($title, $content, $user_id)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO posts(title, content, creation_date, user_id) VALUES(?, ?, NOW(), ? )');
        $query->execute([$title, $content,$user_id]);
        $postId = $db->lastInsertId();
        return $postId;
    }

    public function get($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT posts.id, posts.title, posts.content, posts.creation_date, posts.user_id,
        users.lastname
        FROM posts JOIN users ON posts.user_id = users.id
        WHERE posts.id = ?');

        $query->execute(array($postId));
        $posts = $query->fetchAll(\PDO::FETCH_CLASS, Post::class);

        if (!isset($posts[0])) {
             throw new \Exception('Le post n\'existe pas');
        }
        return $posts[0];
    }

    public function update($postId, $title, $content)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE posts
        SET title=?, content=?, creation_date = NOW()
        WHERE id = ?');
        $query->execute([$title, $content, $postId]);
        $post = $query->fetch(\PDO::FETCH_ASSOC);

        return $post;
    }

    public function delete($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM posts WHERE id = ?');
        $query->execute([$postId]);
        $post = $query->fetch(\PDO::FETCH_ASSOC);
        return $post;
    }
}
