<?php

use App\Controller\CommentController;
use App\Controller\ContactController;
use App\Controller\HomeController;
use App\Controller\PostController;
use App\Controller\UserController;

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

function getUserFirstName()
{
    if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
        return $_POST['firstname'];
    } else {
        throw new Exception('La saisie du prénom est obligatoire');
    }
}
function getUserLastName()
{
    if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
        return $_POST['lastname'];
    } else {
        throw new Exception('La saisie du nom est obligatoire');
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

function getUserPassword()
{
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        return $_POST['password'];
    } else {
        throw new Exception('La saisie du mot de passe est obligatoire');
    }
}
function getUser_Id()
{
    if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
        return $_POST['user_id'];
    } else {
        throw new Exception('Le choix de l\'auteur est obligatoire');
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
    if ('post.list' == $action) {
        $controller = new PostController();
        $controller->actionList();
    } elseif ('post.show' == $action) {
        $controller = new PostController();
        $controller->actionShow(getPostId());
    } elseif ('post.modify' == $action) {
        $controller = new PostController();
        $controller->actionModify(getPostId());
    } elseif ('post.update' == $action) {
        $controller = new PostController();
        $controller->actionUpdate(getPostTitle(), getPostContent(), getUser_Id(), getPostId());
    } elseif ('comment.insert' == $action) {
        $controller = new CommentController();
        $controller->actionInsert(getPostId(), getCommentContent(), getUserId());
    } elseif ('home' == $action) {
        $controller = new HomeController();
        $controller->actionHome();
    } elseif ('post.delete' == $action) {
        $controller = new PostController();
        $controller->actionDelete(getPostId());
    } elseif ('post.create' == $action) {
        $controller = new PostController();
        $controller->actionCreate();
    } elseif ('post.insert' == $action) {
        $controller = new PostController();
        $controller->actionInsert(getPostTitle(), getPostContent(), getUserId());
    } elseif ('comment.modify' == $action) {
        $controller = new CommentController();
        $controller->actionModify(getCommentId());
    } elseif ('comment.update' == $action) {
        $controller = new CommentController();
        $controller->actionUpdate(getCommentId(), getCommentContent(), getUserId());
    } elseif ('comment.delete' == $action) {
        $controller = new CommentController();
        $controller->actionDelete(getCommentId());
    } elseif ('contact.submit' == $action) {
        $controller = new ContactController();
        $controller->actionSubmit();
    } elseif ('login.form' == $action) {
        $controller = new UserController();
        $controller->actionLoginForm();
    } elseif ('login.submit' == $action) {
        $controller = new UserController();
        $controller->actionLoginSubmit(getUserEmail(), getUserPassword());
    } elseif ('logout' == $action) {
        $controller = new UserController();
        $controller->actionLogout();
    } elseif ('user.form' == $action) {
        $controller = new UserController();
        $controller->actionCreate();
    } elseif ('user.insert' == $action) {
        $controller = new UserController();
        $controller->actionInsert(getUserFirstName(), getUserLastName(), getUserEmail(), getUserPassword());
    } elseif ('comment.admin' == $action) {
        $controller = new CommentController();
        $controller->actionShow();
    } elseif ('comment.valid' == $action) {
        $controller = new CommentController();
        $controller->actionValid(getCommentId());
    } else {
        throw new Exception('L\'action demandée n\'existe pas');
    }
//} catch (Exception $e) {
  // echo 'Erreur : ' . $e->getMessage();
// }
