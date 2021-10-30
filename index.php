<?php

use App\Controller\CommentController;
use App\Controller\PostController;

require('vendor/autoload.php');
function getPostId()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        return $_GET['id'];
    } else {
        throw new Exception('Aucun identifiant de billet envoyé');
    }
}
function getPostTitle()
{
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        return $_POST['title'];
    } else {
        throw new Exception('La saisie du titre est obligatoire');
    }
}
function getPostContent()
{
    if (isset($_POST['content']) && !empty($_POST['content'])) {
        return $_POST['content'];
    } else {
        throw new Exception('La saisie du contenu est obligatoire');
    }
}
function getCommentAuthor()
{
    if (isset($_POST['author']) && !empty($_POST['author'])) {
        return $_POST['author'];
    } else {
        throw new Exception('La saisie de l\'auteur est obligatoire');
    }
}
function getCommentContent()
{
    if (isset($_POST['comment']) && !empty($_POST['comment'])) {
        return $_POST['comment'];
    } else {
        throw new Exception('La saisie du commentaire est obligatoire');
    }
}
$action = $_GET['action'] ?? 'post.list';
try {
    if ($action == 'post.list') {
        $controller = new PostController();
        $controller->actionList();
    } elseif ($action == 'post.show') {
        $controller = new PostController();
        $controller->actionShow(getPostId());
    } elseif ($action == 'post.modify') {
        $controller = new PostController();
        $controller->actionModify(getPostId());
    } elseif ($action == 'post.update') {
        $controller = new PostController();
        $controller->actionUpdate(getPostId(), getPostTitle(), getPostContent());
    } elseif ($action == 'comment.insert') {
        $controller = new CommentController();
        $controller->actionInsert(getPostId(), getCommentAuthor(), getCommentContent());
    } else {
        throw new Exception('L\'action demandée n\'existe pas');
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
