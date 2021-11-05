<?php

namespace App\Model\Repository;

use App\Model\Entity\Post;

class PostRepository extends Repository
{
    public function getAll()
    {
        $db = $this->dbConnect();
        $query = $db->query('SELECT id, title, content, creation_date
        FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        $posts = $query->fetchAll(\PDO::FETCH_CLASS, Post::class);
        return $posts;
    }

    public function insert($title, $content)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW() )');
        $query->execute([$title, $content]);
        $postId = $db->lastInsertId();
        return $postId;
    }

    public function get($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT id, title, content, creation_date
        FROM posts WHERE id = ?');
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
