<?php

use App\Controller\CommentController;
use App\Controller\HomeController;
use App\Controller\PostController;
use App\Controller\ContactController;
use App\Controller\UserController;
use App\Model\Entity\Comment;
use App\Model\Repository\CommentRepository;

session_start();

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

function getCommentId()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        return $_GET['id'];
    } else {
        throw new Exception('Aucun identifiant de commentaire envoyé');
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
function getUserEmail()
{
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        return $_POST['email'];
    } else {
        throw new Exception('La saisie de l\'email est obligatoire');
    }
}
function getCommentStatusId()
{
    if (isset($_POST['comment_status_id']) && !empty($_POST['comment_status_id'])) {
        return $_POST['comment_status_id'];
    }
}
function getUserPassword()
{
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        return $_POST['password'];
    } else {
        throw new Exception('La saisie du mot de passe est obligatoire');
    }
}

function getUserId()
{
    if (isset($_SESSION['user']->id) && !empty($_SESSION['user']->id)) {
        return $_SESSION['user']->id;
    } else {
        throw new Exception('L\'utilisateur n\'a pas d\'id spécifié');
    }
}

$action = $_GET['action'] ?? 'home';
//try {
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
        $controller->actionInsert(getPostId(), getCommentContent(), getUserId(), getCommentStatusId());
    } elseif ($action == 'home') {
        $controller = new HomeController();
        $controller->actionHome();
    } elseif ($action == 'post.delete') {
        $controller = new PostController();
        $controller->actionDelete(getPostId());
    } elseif ($action == 'post.create') {
        $controller = new PostController();
        $controller->actionCreate();
    } elseif ($action == 'post.insert') {
        $controller = new PostController();
        $controller->actionInsert(getPostTitle(), getPostContent(), getUserId());
    } elseif ($action == 'comment.modify') {
        $controller = new CommentController();
        $controller->actionModify(getCommentId());
    } elseif ($action == 'comment.update') {
        $controller = new CommentController();
        $controller->actionUpdate(getCommentId(), getCommentContent(), getUserId());
    } elseif ($action == 'comment.delete') {
        $controller = new CommentController();
        $controller->actionDelete(getCommentId());
    } elseif ($action == 'contact.submit') {
        $controller = new ContactController();
        $controller->actionSubmit();
    } elseif ($action == 'login.form') {
        $controller = new UserController();
        $controller->actionLoginForm();
    } elseif ($action == 'login.submit') {
        $controller = new UserController();
        $controller->actionLoginSubmit(getUserEmail(), getUserPassword());
    } elseif ($action == 'logout') {
        $controller = new UserController();
        $controller->actionLogout();
    } else {
        throw new Exception('L\'action demandée n\'existe pas');
    }
//} catch (Exception $e) {
  // echo 'Erreur : ' . $e->getMessage();
// }
