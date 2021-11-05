<?php

namespace App\Controller;

use App\Model\Repository\CommentRepository;
use App\Model\Repository\PostRepository;

class PostController
{

    public function actionList()

    {
        $postManager = new PostRepository();
        $posts = $postManager->getAll();

        require('src/View/post.list.php');
    }

    public function actionModify($postId)
    {
        $postManager = new PostRepository();
        $post = $postManager->get($postId);
        require('src/View/post.modify.php');
    }

    public function actionUpdate($postId, $title, $content)
    {
        $postManager = new PostRepository();
        $post = $postManager->update($postId, $title, $content);
        header('location: ?action=post.show&id=' . $postId);
    }

    public function actionShow($postId)
    {
        $postManager = new PostRepository();
        $commentManager = new CommentRepository();

        $post = $postManager->get($postId);
        $comments = $commentManager->getAllByPostId($postId);
        require('src/View/post.show.php');
    }

    public function actionDelete($postId)
    {
        $postManager = new PostRepository();
        $post = $postManager->delete($postId);
        header('location: ?action=post.list');
        
    }

    public function actionCreate()
    {
        $postManager = new PostRepository();
        require('src/View/post.create.php');
    }

    public function actionInsert($title, $content)
    {
        $postManager = new PostRepository();

        $postId = $postManager->insert($title, $content);
        header('location: ?action=post.show&id=' . $postId);
    }
}
